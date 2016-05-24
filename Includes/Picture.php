<?php

class Picture {

    /**
     * 
     * 
     * @return mysqli
     */
    private function get_db() {
        global $db;
        return $db;
    }

    public function update_picture_information($id, $op, $describ, $check) {
        $qry = "update pictures set type='$op' , body='$describ' , private='$check' where id='$id' ";
        $result = $this->get_db()->query($qry);
        if ($result == false) {
            return false;
        } else {
            return TRUE;
        }
    }

    public function delete_picture($id, $picturename) {
        $qry2 = "delete from pictures where id=$id";
        $result2 = $this->get_db()->query($qry2);
        if ($result2 == FALSE) {
            echo $this->get_db()->error;
        }
        $c = "Images/$picturename";
        unlink($c);
    }

    public function upload_new_picture($userid, $picturefile, $describe, $category, $private) {
        $x = '';
        if ($private == 'on') {
            $x = '1';
        } else {
            $x = '0';
        }
        $arr = explode(".", $picturefile['name']);
        $exe = end($arr);
        $picturename = "";
        if (is_uploaded_file($picturefile['tmp_name']) && $picturefile['error'] == UPLOAD_ERR_OK) {
            $name = time();
            $picturename = $name . "." . $exe;
            move_uploaded_file($picturefile['tmp_name'], 'Images/' . $name . '.' . $exe);
            $qry = "insert into pictures set userid='$userid' , name='$picturename' , body='$describe' , type='$category' , private='$x'";
            $result = $this->get_db()->query($qry);
            if ($result == true)
                return TRUE;
            else {
                return FALSE;
            }
        }
    }

    public function find_pictures_by_userid($id) {
        $result = $this->get_db()->query("select * from pictures WHERE userid='$id'");
        if ($result == FALSE) {
            echo $this->get_db()->error;
        }
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function find_picture_by_id($id) {
        $qry = "select * from pictures where id='$id'";
        $result = $this->get_db()->query($qry);
        if ($result == FALSE) {
            echo $this->get_db()->error;
        }
        $data = $result->fetch_assoc();
        return $data;
    }

    public function get_pictures_for_gallery($category, $private) {
        $result = $this->get_db()->query("select * from pictures where type='$category' and private='$private'");
        if ($result == FALSE) {
            echo $this->get_db()->error;
        }
       $data= $result->fetch_all(MYSQLI_ASSOC);
       return $data;
    }

}
