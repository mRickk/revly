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
                var newComment = `
                <div class="comment bg-body-secondary bg-opacity-75 mb-2 shadow-sm">
                    <div class="row gx-1">
                        <div class="col-1">
                            <div class="ratio ratio-1x1 text-center">
                                <img class="rounded-circle object-fit-fill" src="${data.img}" alt="Profile picture of ${data.username}"/>
                            </div>
                        </div>
                        <div class="col-10">
                            <a href='profile.php?username=${data.username}'>
                                <h2>
                                    ${data.username} 
                                    ${data.isCompany ? '<i class="bi bi-patch-check-fill fs-5"></i>' : ''}
                                </h2>
                            </a>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row gx-1">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <p class="text-break">${data.description}</p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row gx-1">
                        <div class="col-1"></div>
                        <div class="col-10 text-end">
                            <p class="text-break">${data.date_time}</p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>`;

                commentContainer.append(newComment);
                $('#inputComment').val('');

                var commentCount = $('.numComment');
                var currentCount = parseInt(commentCount.text());
                commentCount.text(currentCount + 1);
            }
        });
    });
});
