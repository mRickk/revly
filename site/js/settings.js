$('.toggleLike').on('click', function() {
    changeToggle($(this), 2);
});

$('.toggleComments').on('click', function() {
    changeToggle($(this), 3);
});

$('.toggleTags').on('click', function() {
    changeToggle($(this), 4);
});

$('.toggleFollows').on('click', function() {
    changeToggle($(this), 1);
});

function changeToggle(toggle, update) {
    $.ajax({
        url: "change-toggle.php",
        type: "POST",
        data: { "toggle": update },
        success: function(response) {
            var icon = toggle.find('i');
            var classList = icon.removeClass('bi-toggle-on bi-toggle-off').toggleClass('revly-primary-color text-secondary');
            if (classList.hasClass('text-secondary')) {
                icon.addClass('bi-toggle-off');
            } else {
                icon.addClass('bi-toggle-on');
            }
        }
    });
}
