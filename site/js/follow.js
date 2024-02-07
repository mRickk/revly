$(document).ready(function() {
    let followBtn = $('#followBtn');

    followBtn.click(function() {
        $.ajax({
            type: 'POST',
            url: 'handle-follow.php',
            success: function(response) {
                data = JSON.parse(response);
              
                followBtn.removeClass('btn-primary btn-secondary');

                followBtn.addClass(data.follow ? 'btn-secondary' : 'btn-primary');
                followBtn.text(data.follow ? 'Following' : 'Follow me');

                let followerCount = $('#followerCount');
                let currentCount = parseInt(followerCount.text());
                followerCount.text(data.follow ? (currentCount + 1) : (currentCount - 1));
            }
        });
    });
});
