$(document).ready(function() {
    $(document).on("click", ".trash-icon", function() {
        let postId = $(this).closest('.row').find('input[name="idToast"]').val();
        let myToast = new bootstrap.Toast($(`.post-toast#toast_${postId}`)[0]);
        myToast.show();
    });
});
