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
        $qry = "SELECT username, img as user_img FROM users U WHERE U.username = " . mysqli_real_escape_string($this->db, $username) . " AND U.password = " . mysqli_real_escape_string($this->db, $password);
        $res = $this->db->query($qry);
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}

?>