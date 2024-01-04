<?php 

class DatabaseHelper {
    private $db;

    public function __construct($server, $username, $pwd, $dbname, $port) {
        $this->db = new mysqli($server, $username, $pwd, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }
    public function checkLogin($username, $password) {
        $qry = "SELECT username, img as user_img FROM users U WHERE U.username = '" . $this->db->real_escape_string($username) . "' AND U.password = '" . $this->db->real_escape_string($password) . "'";
        $res = $this->db->query($qry);
        return is_bool($res) ? [] : $res->fetch_all(MYSQLI_ASSOC);
    }

    public function registerUser($username, $password, $name, $email, $surname = '') {
        $qry = "INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
        VALUES ('$email', '$username', '$name', '$surname', '$password', '', '', 0, 1, 1, 1, 1)";
        $res = $this->db->query($qry);
        return $res;
    }
}

?>