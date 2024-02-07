$(document).ready(function() {
    $('#commentForm').submit(function(e) {
        e.preventDefault();

        let commentText = $('#inputComment').val();

        $.ajax({
            type: 'POST',
            url: 'save_comment.php',
            data: { "comment": commentText },
            success: function(response) {
                let data = JSON.parse(response);
                let commentContainer = $('#commentContainer');
                let newComment = `
                <div class="comment bg-body-secondary bg-opacity-75 mb-2 shadow-sm roboto-regular">
                    <div class="row gx-1">
                        <div class="col-1">
                            <div class="ratio ratio-1x1 text-center">
                                <img class="rounded-circle object-fit-cover" src="${data.img}" alt=""/>
                            </div>
                        </div>
                        <div class="col-10">
                            <a href='profile.php?username=${data.username}'>
                                <h2>
                                    ${data.username} 
                                    ${data.isCompany ? '<span class="bi bi-patch-check-fill fs-5" title="Company Badge"></span>' : ''}
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
                            <p class="text-break">${data.date_time.slice(0, -3)}</p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>`;

                commentContainer.append(newComment);
                $('#inputComment').val('');

                let commentCount = $('.numComment');
                let currentCount = parseInt(commentCount.text());
                commentCount.text(currentCount + 1);
            }
        });
    });
});
