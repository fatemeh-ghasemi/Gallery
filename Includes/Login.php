<?php

class Login {

    /**
     * 
     * @return  mysqli
     */
    private function getDb() {
        global $db;
        return $db;
    }

    public function check($email, $password) {
        $query = "SELECT id FROM user WHERE email='$email' AND password='$password'";
        $result = $this->getDb()->query($query);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['userId'] = $user['id'];
            return true;
        } else {

            return false;
        }
    }
}
