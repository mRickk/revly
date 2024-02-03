<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Change password";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "photo-bio-form.php";
    $templateParams["js"] = array("js/back.js");

    // Recupera le informazioni dell'utente dal database
    $userInfo = $dbh->getUserWithEmail($_SESSION["email"]);

    if ($userInfo) {
        $templateParams["user"] = $userInfo;

        // Processa l'invio del form solo se è stato effettivamente inviato
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Inizializza $msg con l'immagine corrente dell'utente
            $msg = $userInfo["img"];

            if (isset($_POST["removePhoto"]) && $_POST["removePhoto"] === "true") {
                // Rimuovi l'immagine e reimposta $msg a "default.png"
                unlink(UPLOAD_DIR . $userInfo["img"]);
                $msg = "default.png";
            } elseif (isset($_FILES["imgPost"]) && $_FILES["imgPost"]["size"] > 0) {
                // Se è stata selezionata una nuova immagine, aggiorna $msg
                list($result, $newMsg) = uploadImage(UPLOAD_DIR, $_FILES["imgPost"]);

                if ($result == 1) {
                    $msg = $newMsg;
                }
            }

            // Effettua l'aggiornamento utilizzando $msg
            $res = $dbh->updatePhoto($msg, $_POST["bio"], $_SESSION["email"]);

            if ($res) {
                $templateParams["success-msg"] = "Your photo & bio has been updated!";
                // Redirect a settings.php dopo l'update
                header("Location: settings.php");
                exit; // Termina lo script dopo la redirect
            } else {
                $templateParams["failure-msg"] = "An error occurred: your photo & bio has NOT been updated.";
            }
        }
    } else {
        // Gestisci il caso in cui le informazioni dell'utente non siano disponibili
        echo "Errore nel recupero delle informazioni dell'utente.";
    }

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
