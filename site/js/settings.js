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
            let icon = toggle.find('span');
            icon.toggleClass('bi-toggle-on bi-toggle-off revly-primary-color text-secondary');
        }
    });
}
