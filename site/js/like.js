$(document).ready(function() {
    $(document).on("click", ".like-icon", function() {
        let likeIcon = $(this);

        let idPost = likeIcon.find('input[name="idPost"]').val();

        $.ajax({
            url: "handle-like.php",
            type: "POST",
            data: { post_id: idPost },
            success: function(response) {
                data = JSON.parse(response);
                var likeCount = $('#numLike' + idPost);
                var currentCount = parseInt(likeCount.text());
                if (data.liked) {
                    likeCount.text(currentCount + 1);
                    likeIcon.html('<input name="idPost" type="hidden" value="'+ idPost + '"/><span class="bi bi-heart-fill text-danger fs-2" title="Liked"></span>');
                } else {
                    likeCount.text(currentCount - 1);
                    likeIcon.html('<input name="idPost" type="hidden" value="'+ idPost + '"/><span class="bi bi-heart text-secondary fs-2" title="Not liked"></span> ');
                }
            }
        });
    });
});
