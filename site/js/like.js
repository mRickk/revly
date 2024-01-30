$(document).ready(function() {
    // Aggiungi un gestore di eventi per i clic sulle icone dei like
    $(".like-icon").on("click", function() {
        // Ottieni l'ID del post dal data attributo
        let postId = $(this).data("post-id");

        // Effettua una chiamata AJAX per gestire il like
        $.ajax({
            url: "handle-like.php",
            type: "POST",
            data: { post_id: postId },
            success: function(response) {
                // Aggiorna l'aspetto dell'icona del like in base alla risposta del server
                if (response.liked) {
                    $(this).html('<i class="bi bi-heart-fill liked"></i>');
                } else {
                    $(this).html('<i class="bi bi-heart"></i>');
                }
            }
        });
    });
});
