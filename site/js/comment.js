$(document).ready(function() {
    $('#commentForm').submit(function(e) {
        e.preventDefault();

        var commentText = $('#inputComment').val();

        $.ajax({
            type: 'POST',
            url: 'save_comment.php',
            data: { "comment": commentText },
            success: function(response) {
                var data = JSON.parse(response);

                var commentContainer = $('#commentContainer');
                var newComment = '<div class="comment">' +
                    '<p>' + data.description + '</p>' +
                    '<p>' + data.date_time + ' by ' + data.username + '</p>' +
                    '<img src="' + data.img + '" alt="Profile Picture">' +
                    '</div>';

                commentContainer.append(newComment);
                $('#inputComment').val('');
            }
        });
    });
});
