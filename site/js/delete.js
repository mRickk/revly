$(document).ready(function() {
    $(document).on("click", ".trash-icon", function() {
        let myToast = new bootstrap.Toast($('#myToast')[0]);
        myToast.show();
    });
});
