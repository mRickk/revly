$(document).ready(function() {
    $('#commentForm').submit(function(e) {
        e.preventDefault();

        // Ottieni il testo del commento dal campo di input
        var commentText = $('#inputComment').val();

        // Esegui una richiesta AJAX per salvare il commento
        $.ajax({
            type: 'POST',
            url: 'save_comment.php',
            data: { "comment": commentText },
            success: function(response) {
                // Ricarica la pagina dopo aver salvato il commento
                console.log(response);
                //location.reload();
            }
        });
    });
});
