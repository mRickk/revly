<?php

function registerLoggedUser($user){
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["user_img"] = $user["user_img"];
}

function isUserLoggedIn() {
    return !empty($_SESSION["username"]) && !empty($_SESSION["email"]) && !empty($_SESSION["user_img"]);
}

function savePostID($post_id) {
    $_SESSION["post_id"] = $post_id;
}

function saveProfile($profile_email) {
    $_SESSION["profile_email"] = $profile_email;
}


function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $imageFileType = strtolower(pathinfo($path.$imageName,PATHINFO_EXTENSION));
    $imageSize = getimagesize($image["tmp_name"]);

    $maxKB = 5000; //Originale 500
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    else if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }
    else if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }   
    else {
        $newName = 0;
        do{
            $newName++;
            $newPath = $path.$newName.".".$imageFileType;
        }
        while(file_exists($newPath));

        if(!move_uploaded_file($image["tmp_name"], $newPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $newName.".".$imageFileType;
        }
    }
    return array($result,$msg);
}

function getTaggableSuggestions($searchTerm, $dbh) {
    $tags = $dbh->getTaggable();
    $filteredTags = [];

    foreach ($tags as $tag) {
        if (stripos($tag['name'], $searchTerm) !== false || stripos($tag['company_name'], $searchTerm) !== false) {
            $filteredTags[] = $tag;
        }
    }
    
    return $filteredTags;
}

function sec_session_start() {
    $session_name = 'sec_session_id'; // Imposta un nome di sessione
    $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
    $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
    ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
    $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
    session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
    session_start(); // Avvia la sessione php.
    session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}

?>