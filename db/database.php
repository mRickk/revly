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
        $qry = "SELECT username, img as user_img, email FROM users U WHERE U.username = ? AND U.password = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->num_rows == 1 ? $res->fetch_assoc() : [];
    }

    public function checkUniqueUserAttribute($username, $email) {
        $qry = "SELECT username, email FROM users U WHERE U.username = ? OR U.email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->num_rows == 0;
    }

    public function registerUser($username, $password, $name, $email, $surname = '') {
        $qry = "INSERT INTO USERS VALUES (?, ?, ?, ?, ?, '', '', 0, 1, 1, 1, 1)";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('sssss', $email, $username, $name, $surname, $password);
        $res = $stmt->execute();
        return $res;
    }

    public function getUsers($username) {
        $qry = "SELECT username, email FROM users WHERE username LIKE ?";
        $stmt = $this->db->prepare($qry);
        $tmp = '%' . $username . '%';
        $stmt->bind_param('s', $tmp);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserWithUsername($username) {
        $qry = "SELECT email, username, name, surname, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows, numFollower, numFollowing, numPost FROM users WHERE username = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return is_null($res) ? [] : $res;
    }

    public function getUserWithEmail($email) {
        $qry = "SELECT email, username, name, surname, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows, numFollower, numFollowing, numPost FROM users WHERE email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return is_null($res) ? [] : $res;
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
                follow.follower_email = ?
            ORDER BY p.date_time DESC";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
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
                p.author_email = ? OR taggable.company_email = ?
            ORDER BY p.date_time DESC;";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $email, $email);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserNotifications($email) {
        $qry = "SELECT N.date_time, U.username as notifier_username, U.email as notifier_email, U.img as notifier_img, NT.message, post.img as post_img, N.id_post
            FROM notification N JOIN notification_type NT ON NT.id = N.id_type JOIN users U ON U.email = N.notifier_email
            LEFT OUTER JOIN post ON N.id_post = post.id WHERE N.notified_email = ?
            ORDER BY N.date_time DESC";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getComments($idPost) {
        $qry = "SELECT description, date_time, username, img FROM comments C, users U WHERE C.id_post = ? AND C.author_email = U.email";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('i', $idPost);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecentSearches($email) {
        $qry = "SELECT searched_email as email, username FROM recent_searches, users WHERE user_email = ? AND searched_email = email;";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    public function newPost($email, $img, $subject, $description, $evaluation, $taggable) {
        $timestamp = date('Y-m-d H:i:s');
        //TODO: remove metodo vecchio se nuovo funzia
        /* 
        $qry = "INSERT INTO `post` (`img`, `evaluation`, `likes`, `subject`, `description`, `date_time`, `id_taggable`, `author_email`) VALUES (?, ?, ?, ";
        if(!isset($taggable)){
            $qry = "?, ?, ?, NULL, ?);";
        }
        else {
            $qry = "NULL, ?, ?, NULL, ?);";
        }
        $stmt = $this->db->prepare($qry);
        if(!isset($taggable)){
            
        }
        else {
            $qry = "NULL, ?, ?, NULL, ?);";
        }*/
        $qry = "INSERT INTO `post` (`img`, `evaluation`, `likes`, `subject`, `description`, `date_time`, `id_taggable`, `author_email`)
            VALUES (?, ?, 0, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('sisssis', $img, $evaluation, $subject, $description, $timestamp, $taggable, $email);
        $res = $stmt->execute();
        return $res;
    }

    public function getTaggable() {
        $qry = "SELECT taggable.id, taggable.name, company.name AS company_name FROM taggable, users AS company WHERE company.email = taggable.company_email;";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function newRequestCompany($email) {
        $timestamp = date('Y-m-d H:i:s');
        $qry = "INSERT INTO `company_account_request` (`company_email`, `date_time`) VALUES (?, ?)";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $email, $timestamp);
        $res = $stmt->execute();
        return $res;
    }

    public function isPostLiked($email, $idPost) {
        $qry = "SELECT * FROM likes WHERE user_email = ? AND id_post = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('si', $email, $idPost);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->num_rows > 0;
    }

    public function updatePersonalDetails($username, $name, $surname, $email) {
        $qry = "UPDATE users SET username = ?, name = ?, surname = ? WHERE email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ssss', $username, $name, $surname, $email);
        $res = $stmt->execute();
        echo $stmt->errno;
        return $res;
    }

    public function updatePhoto($img, $biography, $email) {
        $qry = "UPDATE users SET img = ?, biography = ? WHERE email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('sss', $img, $biography, $email);
        $res = $stmt->execute();
        return $res;
    }

    public function updatePassword($email, $oldPassword, $newPassword) {
        $qry = "UPDATE users SET password = ? WHERE email = ? AND password = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('sss', $newPassword, $email, $oldPassword);
        $res = $stmt->execute();
        return $res;
    }

    public function isFollowed($user_email, $follower_email) {
        $qry = "SELECT * FROM follow WHERE user_email = ? AND follower_email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $user_email, $follower_email);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->num_rows > 0;
    }

    public function getPost($id_post) {
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
                p.id = ?
            ORDER BY p.date_time DESC";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('i', $id_post);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->num_rows == 1 ? $res->fetch_assoc() : [];
    }

    public function getNumberPost($user_email) {
        $qry = "SELECT COUNT(*) as post_count FROM post WHERE author_email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row['post_count'];
    }

    public function getNumberFollows($user_email) {
        $qry = "SELECT COUNT(*) as follows_count FROM follow WHERE follower_email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row['follows_count'];
    }
    
    public function getNumberFollowers($user_email) {
        $qry = "SELECT COUNT(*) as follower_count FROM follow WHERE user_email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row['follower_count'];
    }
    
    


}
?>