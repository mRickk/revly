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

    public function checkUniqueUserAttribute($username, $email) {
        $qry = "SELECT username, email FROM users U WHERE U.username = '" . $this->db->real_escape_string($username) . "' OR U.email = '" . $this->db->real_escape_string($email) . "'";
        $res = $this->db->query($qry);
        return is_bool($res) || $res->num_rows == 0;
    }

    public function registerUser($username, $password, $name, $email, $surname = '') {
        $qry = "INSERT INTO USERS VALUES ('$email', '$username', '$name', '$surname', '$password', '', '', 0, 1, 1, 1, 1)";
        $res = $this->db->query($qry);
        return $res;
    }
}

?>