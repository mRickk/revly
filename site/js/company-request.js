$(document).ready(function() {
    $(document).on("click", "#companyRequest", function() {
        console.log("AHHHHH");
        $.ajax({
            url: "company-request-account.php",
            type: "POST",
        });
    });
});
