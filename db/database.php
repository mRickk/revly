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
        $qry = "SELECT username, img as user_img, email FROM users U WHERE U.username = '" . $this->db->real_escape_string($username) . "' AND U.password = '" . $this->db->real_escape_string($password) . "'";
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
        return is_bool($res) ? [] : $res->fetch_column();
    }

    public function getUser($email) {
        $qry = "SELECT * FROM users WHERE email = '$email';";
        $res = $this->db->query($qry);
        return is_bool($res) ? [] : $res->fetch_all(MYSQLI_ASSOC);
    }

    /*
1. SELECT username, description, likes, evaluation, users.img as user_img, post.img as post_img, subject, id_taggable, date_time FROM follow, post, users WHERE follow.follower_email = '" . $this->db->real_escape_string($email) . "' AND post.author_email = follow.user_email AND users.email = post.author_email;
2. SELECT address, users.name as company_name FROM users, taggable WHERE taggable.id = '" . $this->db->real_escape_string($idTaggable) . "' AND taggable.company_email = users.email;
SOLO SE id_taggable è != NULL*/
    
    public function getHomePosts($email) {
        $qry = "SELECT 
                users.username,
                p.id AS id_post,
                p.description,
                p.likes,
                p.evaluation,
                users.img AS user_img,
                p.img AS post_img,
                p.subject,
                p.date_time,
                taggable.name AS tag_name,
                taggable.address AS tag_address,
                company.name AS company_name
            FROM
                follow
            JOIN
                post p ON p.author_email = follow.user_email
            JOIN
                users ON users.email = p.author_email
            LEFT JOIN
                taggable ON taggable.id = p.id_taggable
            LEFT JOIN
                users AS company ON taggable.company_email = company.email
            WHERE 
                follow.follower_email = '" . $this->db->real_escape_string($email) . "'
            ORDER BY p.date_time DESC;";
        $res = $this->db->query($qry);
        return is_bool($res) ? [] : $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserNotifications($email) {
        $qry = "SELECT N.date_time, U.username as notifier_username, U.img as notifier_img, NT.message, post.img as post_img, N.id_post FROM notification N JOIN notification_type NT ON NT.id = N.id_type JOIN users U ON U.email = N.notifier_email LEFT OUTER JOIN post ON N.id_post = post.id WHERE N.notified_email = '" . $this->db->real_escape_string($email) . "' ORDER BY N.date_time DESC;";
        $res = $this->db->query($qry);
        return is_bool($res) ? [] : $res->fetch_all(MYSQLI_ASSOC);
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
        $time = date('Y-m-d H:i:s');
        echo $evaluation;
        $qry = NULL;
        if(!isset($taggable)){
            $qry = "INSERT INTO `post` (`img`, `evaluation`, `likes`, `subject`, `description`, `date_time`, `id_taggable`, `author_email`) VALUES ('$img', '3', '1', '$subject', '$description', '$time', NULL, '$email');";
            echo "dai";
        }
        else {
            $qry = "INSERT INTO `post` (`img`, `evaluation`, `likes`, `subject`, `description`, `date_time`, `id_taggable`, `author_email`) VALUES ('$img', '3', '1', NULL, '$description', '$time', NULL, '$email');";
            echo "dioc";
        }
        $res = $this->db->query($qry);
        if (!$res) {
            // Se la query fallisce, stampa l'errore
            echo "Errore nella query: " . $this->db->error;
        }
        return $res;
    }

    public function getTaggable() {
        $qry = "SELECT * FROM taggable;";
        $res = $this->db->query($qry);
        return is_bool($res) ? [] : $res->fetch_all(MYSQLI_ASSOC);
    }

    public function newRequestCompany($email){
        $time = time();
        $qry = "INSERT INTO `company_account_request` (`company_email`, `date_time`) VALUES ($email, $time);";
        $res = $this->db->query($qry);
        return $res;
    }

    public function isPostLiked($email , $idPost) {
        $qry = "SELECT * FROM LIKES WHERE likes.user_email = $email AND likes.id_post = $idPost";
        $res = $this->db->query($qry);
        return !is_bool($res);
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

    public function getProfilePosts($email) {
        $qry = "SELECT
                users.username,
                p.id AS id_post,
                p.description,
                p.likes,
                p.evaluation,
                users.img AS user_img,
                p.img AS post_img,
                p.subject,
                p.date_time,
                taggable.name AS tag_name,
                taggable.address AS tag_address,
                company.name AS company_name
            FROM
                post p
            JOIN
                users ON users.email = p.author_email
            LEFT JOIN
                taggable ON taggable.id = p.id_taggable
            LEFT JOIN
                users AS company ON taggable.company_email = company.email
            WHERE 
                p.author_email = '" . $this->db->real_escape_string($email) . "'
            ORDER BY p.date_time DESC;";
        $res = $this->db->query($qry);
        return is_bool($res) ? [] : $res->fetch_all(MYSQLI_ASSOC);
    }

    

}
?>