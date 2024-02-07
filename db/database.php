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
        $qry = "SELECT username, img as user_img, email, password FROM users U WHERE U.username = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result();
        $arr = $res->fetch_assoc();
        if ($res->num_rows == 1 && password_verify($password, $arr["password"])) {
            return $arr;
        }
        return [];
    }

    public function registerUser($username, $password, $name, $email, $surname = '') {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $qry = "INSERT INTO `users` (`email`, `username`, `name`, `surname`, `password`, `biography`,
            `isCompany`, `notifyLikes`, `notifyComments`, `notifyTags`, `notifyFollows`)
            VALUES (?, ?, ?, ?, ?, '', 0, 1, 1, 1, 1)";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('sssss', $email, $username, $name, $surname, $password);
        $res = $stmt->execute();
        return $res;
    }

    public function getUsers($username) {
        $qry = "SELECT username, email, img, isCompany FROM users WHERE username LIKE ?";
        $stmt = $this->db->prepare($qry);
        $tmp = '%' . $username . '%';
        $stmt->bind_param('s', $tmp);
        $stmt->execute();
        $res = $stmt->get_result();
        $results = $res->fetch_all(MYSQLI_ASSOC);

        foreach ($results as &$user) {
            $user['img'] = UPLOAD_DIR . $user['img'];
        }

        return $results;
    }

    public function getUserWithUsername($username) {
        $qry = "SELECT email, username, name, surname, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows FROM users WHERE username = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return is_null($res) ? [] : $res;
    }

    public function getEmailByUsername($username) {
        $qry = "SELECT email FROM users WHERE username = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return is_null($res) ? [] : $res["email"];
    }

    public function getUserWithEmail($email) {
        $qry = "SELECT email, username, name, surname, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows FROM users WHERE email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return is_null($res) ? [] : $res;
    }

    /*
1. SELECT username, description, evaluation, users.img as user_img, post.img as post_img, subject, id_taggable, date_time FROM follow, post, users WHERE follow.follower_email = '" . $this->db->real_escape_string($email) . "' AND post.author_email = follow.user_email AND users.email = post.author_email;
2. SELECT address, users.name as company_name FROM users, taggable WHERE taggable.id = '" . $this->db->real_escape_string($idTaggable) . "' AND taggable.company_email = users.email;
SOLO SE id_taggable è != NULL*/
    
    public function getHomePosts($email) {
        $qry = "SELECT
                users.username,
                users.isCompany,
                p.id AS id_post,
                p.description,
                (SELECT COUNT(*) FROM likes WHERE id_post = p.id) as likes,
                (SELECT COUNT(*) FROM comments WHERE id_post = p.id) as comments,
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
                users.isCompany,
                p.id AS id_post,
                p.description,
                (SELECT COUNT(*) FROM likes WHERE id_post = p.id) as likes,
                (SELECT COUNT(*) FROM comments WHERE id_post = p.id) as comments,
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
        $qry = "SELECT 
        N.date_time, 
        U.username as notifier_username, 
        U.email as notifier_email, 
        U.img as notifier_img, 
        U.isCompany, 
        NT.message, 
        post.img as post_img, 
        N.id_post
    FROM 
        notification N 
     JOIN
		users NU ON NU.email = ?
    JOIN 
        notification_type NT ON NT.id = N.id_type 
    JOIN 
        users U ON U.email = N.notifier_email
    LEFT OUTER JOIN 
        post ON N.id_post = post.id 
    WHERE 
        N.notified_email = ?
        AND (
            (NU.notifyFollows = 1 AND N.id_type = 1) OR
            (NU.notifyLikes = 1 AND N.id_type = 2) OR
            (NU.notifyComments = 1 AND N.id_type = 3) OR
            (NU.notifyTags = 1 AND N.id_type = 4)
        )
    ORDER BY 
        N.date_time DESC;";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $email, $email);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getComments($idPost) {
        $qry = "SELECT description, date_time, username, img, isCompany FROM comments C, users U WHERE C.id_post = ? AND C.author_email = U.email ORDER BY date_time";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('i', $idPost);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecentSearches($email) {
        $qry = "SELECT searched_email as email, username, img, isCompany FROM recent_searches, users WHERE user_email = ? AND searched_email = email ORDER BY date_time DESC;";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $stmt->execute(); 
        $res = $stmt->get_result();
        $results = $res->fetch_all(MYSQLI_ASSOC);
        if ($res->num_rows > 0) {
            foreach ($results as &$user) {
                $user['img'] = UPLOAD_DIR . $user['img'];
            }
            return $results;
        } else {
            return array();
        }
    }

    private function getlastUserPost($email) {
        $lastPostQuery = "SELECT id FROM post WHERE author_email = ? ORDER BY date_time DESC LIMIT 1";
        $stmt = $this->db->prepare($lastPostQuery);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $lastPost = $result->fetch_assoc()['id'];
        return $lastPost;
    }

    private function getEmailFromTaggable($idTag) {
        $notifiedQuery = "SELECT company_email FROM taggable WHERE id = ?";
        $stmt = $this->db->prepare($notifiedQuery);
        $stmt->bind_param('i', $idTag);
        $stmt->execute();
        $result = $stmt->get_result();
        $emailNotified = $result->fetch_assoc()['company_email'];
        return $emailNotified;
    }

    public function newPost($email, $img, $subject, $description, $evaluation, $taggable) {
        $timestamp = date('Y-m-d H:i:s');
        $qry = "INSERT INTO `post` (`img`, `evaluation`, `subject`, `description`, `date_time`, `id_taggable`, `author_email`)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('sisssis', $img, $evaluation, $subject, $description, $timestamp, $taggable, $email);
        $res = $stmt->execute();

        if($taggable != NULL){
            $this->addNotify($this->getlastUserPost($email), $email, 4, $this->getEmailFromTaggable($taggable));
        }

        return $res;
    }

    public function getTaggable() {
        $qry = "SELECT taggable.id, taggable.name, company.name AS company_name FROM taggable, users AS company WHERE company.email = taggable.company_email;";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function checkRequestCompany($email) {
        $selectQuery = "SELECT COUNT(*) AS count FROM company_account_request WHERE company_email = ?";
        $selectStmt = $this->db->prepare($selectQuery);
        $selectStmt->bind_param('s', $email);
        $selectStmt->execute();
        $selectResult = $selectStmt->get_result();
        $row = $selectResult->fetch_assoc();
        return $row['count'] > 0 ;
    }

    public function newRequestCompany($address, $name, $email) {
        $insertQuery = "INSERT INTO company_account_request (company_email, date_time, name, address) VALUES (?, CURRENT_TIMESTAMP, ?, ?);";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bind_param('sss', $email, $name, $address);
        $res = $insertStmt->execute();
        $insertStmt->close();
        return $res;
    }

    public function newComment($comment, $id_post, $author_email) {
        $qry = "INSERT INTO comments (description, date_time, author_email, id_post) VALUES (?, CURRENT_TIMESTAMP, ?, ?)";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ssi', $comment, $author_email, $id_post);
        $res = $stmt->execute();
        $comment = $this->getComments($id_post);
        return $comment[count($comment) -1];
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

    public function updatePassword($username, $email, $oldPassword, $newPassword) {
        if ($this->checkLogin($username, $oldPassword)) {
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $qry = "UPDATE users SET password = ? WHERE email = ?";
            $stmt = $this->db->prepare($qry);
            $stmt->bind_param('ss', $newPassword, $email);
            $res = $stmt->execute();
            return $res;
        }
        return false;
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
                users.isCompany,
                p.id AS id_post,
                p.description,
                (SELECT COUNT(*) FROM likes WHERE id_post = p.id) as likes,
                (SELECT COUNT(*) FROM comments WHERE id_post = p.id) as comments,
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
                p.id = ?";
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

    public function getNumberLike($idPost) {
        $qry = "SELECT COUNT(*) as num_likes FROM likes WHERE id_post = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('i', $idPost);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row['num_likes'];
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

    public function updateRecentSearches($user_email, $searched_user) {
        $qry = 'INSERT INTO recent_searches (user_email, searched_email, date_time)
        VALUES (?, ?, CURRENT_TIMESTAMP)
        ON DUPLICATE KEY UPDATE date_time = CURRENT_TIMESTAMP;';
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $user_email, $searched_user);
        var_dump($searched_user);
        $res = $stmt->execute();
        return $res;
    }

    public function getEmailFromPost($postId){
        $qry = "SELECT author_email FROM post WHERE id = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row['author_email'];
    }

    public function addNotify($postId, $email, $type, $notified){
        $qry = 'INSERT INTO notification (date_time, id_type, notifier_email, notified_email, id_post)
        VALUES (CURRENT_TIMESTAMP, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($qry);
        if($notified == NULL){
            $notified = $this->getEmailFromPost($postId);
        }
        $stmt->bind_param('issi', $type, $email, $notified, $postId);
        $res = $stmt->execute();
        return $res;
    }

    public function deleteNotify($postId, $email, $type){
        $qry = 'DELETE FROM notification WHERE id_type = ? AND notifier_email = ? AND notified_email = ? AND  id_post = ?';
        $stmt = $this->db->prepare($qry);
        $a = $this->getEmailFromPost($postId);
        $stmt->bind_param('issi', $type, $email, $a, $postId);
        $res = $stmt->execute();
        return $res;
    }

    public function handleLike($userEmail, $postId) {
        $liked = $this->isPostLiked($userEmail, $postId);
        if ($liked) {
            $query = "DELETE FROM likes WHERE user_email = ? AND id_post = ?";
        } else {
            $query = "INSERT INTO likes (user_email, id_post) VALUES (?, ?)";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $userEmail, $postId);
        $success = $stmt->execute();
        return !$liked;
    }

    public function follow($follower_email, $followed_email){
        if(!$this->isFollowed($followed_email, $follower_email)){
            $qry = 'INSERT INTO follow ( follower_email, user_email)
            VALUES (?, ?)';
        }
        else{
            $qry = 'DELETE FROM follow WHERE follower_email = ? AND user_email = ?';
        }
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $follower_email, $followed_email);
        $res = $stmt->execute();
        return $res;
    }

    public function getFollower($email) {
        $qry = "SELECT U.username, U.email, U.img, U.isCompany FROM users U, follow F WHERE U.email = F.follower_email AND F.user_email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $res = $stmt->get_result();
        $results = $res->fetch_all(MYSQLI_ASSOC);

        foreach ($results as &$user) {
            $user['img'] = UPLOAD_DIR . $user['img'];
        }

        return $results;
    }

    public function getFollows($email) {
        $qry = "SELECT U.username, U.email, U.img, U.isCompany FROM users U, follow F WHERE U.email = F.user_email AND F.follower_email = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $results = $res->fetch_all(MYSQLI_ASSOC);

        foreach ($results as &$user) {
            $user['img'] = UPLOAD_DIR . $user['img'];
        }

        return $results;
    }

    public function getListLike($idPost) {
        $qry = "SELECT U.username, U.email, U.img, U.isCompany FROM users U, likes L WHERE U.email = L.user_email AND L.id_post = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('i',$idPost);
        $stmt->execute();
        $res = $stmt->get_result();
        $results = $res->fetch_all(MYSQLI_ASSOC);

        foreach ($results as &$user) {
            $user['img'] = UPLOAD_DIR . $user['img'];
        }

        return $results;
    }

    public function updateToggle($update, $email) {
        switch ($update) {
            case 1:
                $qry="UPDATE users
                SET notifyFollows = CASE WHEN notifyFollows = 1 THEN 0 ELSE 1 END
                WHERE users.email=?;";
                break;
            case 2:
                $qry="UPDATE users
                SET notifyLikes = CASE WHEN notifyLikes = 1 THEN 0 ELSE 1 END
                WHERE users.email=?;";
                break;
            case 3:
                $qry="UPDATE users
                SET notifyComments = CASE WHEN notifyComments = 1 THEN 0 ELSE 1 END
                WHERE users.email=?;";
                break;
            case 4:
                $qry="UPDATE users
                SET notifyTags = CASE WHEN notifyTags = 1 THEN 0 ELSE 1 END
                WHERE users.email=?;";
                break;
        }
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('s', $email);
        $res = $stmt->execute();
        return $res;
    }

    public function deletePost($idPost) {
        $qry = 'DELETE FROM post WHERE id = ?';
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('i', $idPost);
        $res = $stmt->execute();
        return $res;
    }

    public function insertTaggable($name, $address, $email){
        $qry = 'INSERT INTO taggable (name, address, company_email)
        VALUES (?, ?, ?)';
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('sss', $name, $address, $email);
        $res = $stmt->execute();
        return $res;
    }

    public function getAllUsers() {
        $qry = "SELECT email, username, password FROM users";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return is_null($res) ? [] : $res;
    }
}
?>