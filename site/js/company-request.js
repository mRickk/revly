$(document).ready(function() {
    $(document).on("click", "#companyRequest", function() {
        $.ajax({
            url: "company-request-account.php",
            type: "POST",
            data: { "email": email }
        });
    });
});
