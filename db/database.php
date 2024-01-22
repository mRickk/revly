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

    public function getEmail($username) {
        $qry = "SELECT email FROM users WHERE username = '$username';";
        $res = $this->db->query($qry);
        return $res;
    }

    public function getUser($email) {
        $qry = "SELECT * FROM users WHERE email = '$email';";
        $res = $this->db->query($qry);
        return $res;
    }
    
    public function post($username) {
        $emailResult = $this->getEmail($username);
        $emailRow = $emailResult->fetch_assoc();
        if ($emailRow && isset($emailRow['email'])) {
            $email = $emailRow['email'];
            $qry = "SELECT * FROM follow, post WHERE follow.follower_email = '$email' AND post.author_email = follow.user_email;";
        }
        $res = $this->db->query($qry);
        return $res;    
    }

    public function getComments($idPost) {
        $qry = "SELECT * FROM comments AS C, users AS U WHERE C.id_post = $idPost AND C.author_email = U.email;";
        $res = $this->db->query($qry);
        return $res;
    }

    public function getrecentSearches($email) {
        $qry = "SELECT * FROM recent_searches AS RS WHERE RS.user_email = $email;";
        $res = $this->db->query($qry);
        return $res;
    }

    public function newPost($email, $img, $subject, $description, $evaluation, $taggable){
        $time = time();
        $qry = "INSERT INTO `post` (`img`, `evaluation`, `likes`, `subject`, `description`, `date_time`, `id_taggable`, `author_email`)
         VALUES ($img, $evaluation, '0', $subject, $description, $time, $taggable, $email);";
        $res = $this->db->query($qry);
        return $res;
    }

    public function newRequestCompany($email){
        $time = time();
        $qry = "INSERT INTO `company_account_request` (`company_email`, `date_time`) VALUES ($email, $time);";
        $res = $this->db->query($qry);
        return $res;
    }

    public function getPostLiked($email , $idPost) {
        $qry = "SELECT * FROM LIKES WHERE likes.user_email = $email AND likes.id_post = $idPost";
        $res = $this->db->query($qry);
        return $res;
    }
    
    public function getSettings($email) {
        $qry = "SELECT notifyLikes, notifyComments, notifyTags, notifyFollows FROM users AS U WHERE U.email = $email";
        $res = $this->db->query($qry);
        return $res;
    }

    public function updatePhoto($email, $img) {
        $qry = "UPDATE users SET img = '$img' WHERE email = '$email";
        $res = $this->db->query($qry);
        return $res;
    }

    public function updatePasswd($email, $img) {
        $qry = "UPDATE users SET img = '$img' WHERE email = '$email";
        $res = $this->db->query($qry);
        return $res;
    }

}
?>