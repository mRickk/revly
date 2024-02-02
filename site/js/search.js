$(document).ready(function() {
    let searchBar = document.querySelector("#searchBar");

    // Aggiungi un evento alla search bar all'avvio della pagina
    showRecentSearches();

    searchBar.addEventListener("input", function() {
        let data = searchBar.value.trim();

        // Se l'input è vuoto, mostra le ricerche recenti
        if (data === "") {
            showRecentSearches();
        } else {
            // Altrimenti, mostra i suggerimenti in tempo reale
            $.ajax({
                url: "search-user.php",
                type: "POST",
                data: { q: data},
                success: showResult
            });
        }
    });

    function showRecentSearches() {
        $.ajax({
            url: "recent-searches.php",
            type: "GET",
            success: showResult
        });
    }

    function showResult(data) {
        console.log(data);
        let resultContainer = document.querySelector("#searchResult");
        resultContainer.innerHTML = JSON.parse(data).map(user => `
        <a href="#" class="d-inline-block user-link" data-email="${user.email}">
            <div class="row gx-2">                
                    <div class="col-1">
                        <img class="rounded-circle" src="${user.img}" alt="Profile picture of <?php echo ${user.username}; ?>"/>
                    </div>
                    <div class="col-9">
                        <p>
                            ${user.username}
                            ${user.isCompany ? '<i class="bi bi-patch-check-fill fs-5"></i>' : ''}
                        </p>
                    </div>
            </div>
        </a>
        `).join("");

        // Aggiungi un gestore di eventi per i clic sui link degli utenti
        document.querySelectorAll(".user-link").forEach(link => link.addEventListener("click", handleUserClick));
    }

    // Funzione per gestire il clic su un link utente
    function handleUserClick(event) {
        event.preventDefault();
    
        let username = event.target.innerText;
        $.ajax({
            url: "recent-search-update.php",
            type: "POST",
            data: { "username": username },
            success: function(response){ 
                // Modifica l'URL per includere l'email e lo username
                window.location.href = "profile.php?username=" + username;
            }
        });
    }
});
