$(document).ready(function() {
    var followBtn = $('#followBtn');

    followBtn.click(function() {
        $.ajax({
            type: 'POST',
            url: 'handle-follow.php',
            success: function(response) {
                data = JSON.parse(response);
              
                followBtn.removeClass('btn-primary btn-outline-dark');

                followBtn.addClass(data.follow ? 'btn-outline-dark' : 'btn-primary');
                followBtn.text(data.follow ? 'Following' : 'Follow me');

                var followerCount = $('#followerCount');
                var currentCount = parseInt(followerCount.text());
                followerCount.text(data.follow ? (currentCount + 1) : (currentCount - 1));
            }
        });
    });
});