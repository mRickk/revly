$(document).ready(function() {
    let searchBar = document.querySelector("#searchBar");

    searchBar.addEventListener("input", function() {
        let data = searchBar.value.trim();
        if (data === "") return showResult("[]"); // Se l'input è vuoto, mostra un array JSON vuoto

        $.ajax({
            url: "search-user.php",
            type: "POST",
            data: { q: data },
            success: showResult
        });
    });

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
    function handleUserClick(event) {
        event.preventDefault();

        // Ottieni l'email dal dataset dell'elemento cliccato
        let userEmail = event.target.dataset.email;

        // Effettua la richiesta per impostare la variabile di sessione
        $.ajax({
            url: "set-profile-session.php",
            type: "POST",
            data: { email: userEmail },
            success: function(response) {
                // Puoi fare qualcosa con la risposta, se necessario
                console.log(response);

                // Ora puoi reindirizzare l'utente a profile.php
                window.location.href = "profile.php";
            }
        });
    }
});
