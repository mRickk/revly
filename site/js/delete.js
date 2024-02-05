$(document).ready(function() {
    $(document).on("click", ".trash-icon", function() {
        var myToast = new bootstrap.Toast($('#myToast')[0]);
        myToast.show();
    });
});


$(document).ready(function() {
    $(document).on("click", "#confirm", function() {
        let idPost = likeIcon.find('input[name="idPost"]').val();
        $.ajax({
            url: 'deletePost.php',
            method: 'POST',
            data: {
                "idPost": idPost
            },
            success: function(response) {
                location.reload();
            }
        });
    });
});