$(document).ready(function() {
    let searchBar = document.querySelector("#searchBar");

    searchBar.addEventListener("input", function() {
        let data = searchBar.value;
        if (data == "") {
            showResult("[]"); // Invia un array JSON vuoto come stringa
        } else {
            $.ajax({
                url: "search-user.php",
                type: "POST",
                data: { q: data },
                success: function(response) {
                    showResult(response);
                }
            });
        }
    });

    function showResult(data) {
        console.log("Risposta JSON:", data);
    
        let result = "";
        data = JSON.parse(data);
            for (let i = 0; i < data.length; i++) {
                let user = `
                <section class="w-100 ms-n40 ms-md-n3 mt-2">
                <span class="d-inline-block">${data[i]["username"]}</span>
                </section>
                `;
                result += user;
            }
    
        let resultContainer = document.querySelector("#searchResult");
        resultContainer.innerHTML = result;
    }
    
    
});
