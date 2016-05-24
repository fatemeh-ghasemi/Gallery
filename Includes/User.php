<?php

class User {

    /**

     * 
     * @return mysqli
     */
    private function getDb() {
        global $db;
        return $db;
    }

    public function register($name, $pass, $email) {
        $db = $this->getDb();
        $qry = "insert into user set name='$name' , password='$pass' , email='$email'";
        $result = $db->query($qry);
        if ($result == FALSE && $db->errno == 1064) {
            return "Your request fail !";
        }
        if ($result == TRUE) {
            return"You are register.";
        }
        }
        public function select_user_by_id($id){
        $result2 = $this->getDb()->query("select name from user where id='$id' ");
        if ($result2 == FALSE) {
            echo $this->getDb()->error;
        }
        $username = $result2->fetch_assoc();
        return $username;
    }

}
