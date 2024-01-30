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
        // Esegui una chiamata AJAX per ottenere le ricerche recenti dal database
        $.ajax({
            url: "recent-searches.php",
            type: "GET",
            success: showResult
        });
    }

    function showResult(data) {
        let resultContainer = document.querySelector("#searchResult");
        resultContainer.innerHTML = JSON.parse(data).map(user => `
            <section class="w-100 ms-n40 ms-md-n3 mt-2">
                <a href="#" class="d-inline-block user-link" data-email="${user.email}">${user.username}</a>
            </section>
        `).join("");

        // Aggiungi un gestore di eventi per i clic sui link degli utenti
        document.querySelectorAll(".user-link").forEach(link => link.addEventListener("click", handleUserClick));
    }

    // Funzione per gestire il clic su un link utente
    // Funzione per gestire il clic su un link utente
    function handleUserClick(event) {
        event.preventDefault();

        let username = event.target.innerText;

        // Modifica l'URL per includere l'email e lo username
        window.location.href = "profile.php?username=" + username;
    }

});
