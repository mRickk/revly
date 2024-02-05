$(document).ready(function() {
    $(document).on("click", ".trash-icon", function() {
        var myToast = new bootstrap.Toast($('#myToast')[0]);
        myToast.show();
    });
});
