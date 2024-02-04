document.getElementById('toggleLike').addEventListener('click', function() {
    changeToggle($(this), 2);
});

document.getElementById('toggleComments').addEventListener('click', function() {
    changeToggle($(this), 3);
});

document.getElementById('toggleTags').addEventListener('click', function() {
    changeToggle($(this), 4);
});

document.getElementById('toggleFollows').addEventListener('click', function() {
    changeToggle($(this), 1);
});

function changeToggle(toggle, update) {
    $.ajax({
        url: "change-settings.php",
        type: "POST",
        data: { "toggle": update },
        success: function(response) {
            console.log(response);
            toggle.toggleClass('bi-toggle-on bi-toggle-off');
        }
    });
}

