$(document).ready(function() {
    // Aggiungi un gestore di eventi per i clic sulle icone dei like
    $(document).on("click", ".like-icon", function() {
        // Salva il riferimento all'elemento like-icon
        let likeIcon = $(this);

        // Ottieni l'ID del post dal data attributo
        let postId = likeIcon.data("post-id");

        // Effettua una chiamata AJAX per gestire il like
        $.ajax({
            url: "handle-like.php",
            type: "POST",
            data: { post_id: postId },
            success: function(response) {
                // Aggiorna l'aspetto dell'icona del like in base alla risposta del server
                data = JSON.parse(response);
                if (data.liked) {
                    likeIcon.html('<i class="bi bi-heart-fill w-100" ></i>');
                } else {
                    likeIcon.html('<i class="bi bi-heart w-100"></i> ');
                }
            }
        });
    });
});
