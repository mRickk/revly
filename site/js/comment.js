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
                <div class="comment bg-body-secondary bg-opacity-75 mb-2">
                    <div class="row gx-1">
                        <div class="col-1">
                            <img class="rounded-circle" src="<?php echo UPLOAD_DIR . ${data.img}; ?>" alt="Profile picture of <?php echo ${data.username};?>"/>
                        </div>
                        <div class="col-10">
                            <a href='profile.php?username=<?php echo ${data.username}; ?>'>
                                <h2>
                                    <?php echo ${data.username}; 
                                    if (${data.isCompany}): ?>
                                    <i class="bi bi-patch-check-fill"></i>
                                    <?php endif; ?>
                                </h2>
                            </a>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row gx-1">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <p class="text-break"><?php echo ${data.description};?></p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row gx-1">
                        <div class="col-1"></div>
                        <div class="col-10 text-end">
                            <p class="text-break"><?php echo substr(${data.date_time}, 0, -3);?></p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>`

                commentContainer.append(newComment);
                $('#inputComment').val('');
            }
        });
    });
});
