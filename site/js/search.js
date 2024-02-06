$(document).ready(function() {
    let searchBar = document.querySelector("#searchBar");

    showRecentSearches();

    searchBar.addEventListener("input", function() {
        let data = searchBar.value.trim();

        if (data === "") {
            showRecentSearches();
        } else {
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
        <a href="#" class="user-link">
            <div class="row gx-2 mb-3">
                <div class="d-flex align-items-center">
                    <div class="col-1 me-1">
                        <div class="ratio ratio-1x1 text-center">
                            <img class="rounded-circle object-fit-fill" src="${user.img}"/>
                        </div>
                    </div>
                    <div class="col-9">
                        <p class="m-0">
                                ${user.username}
                                ${user.isCompany ? '<span class="bi bi-patch-check-fill fs-5" title="company"></span>' : ''}
                        </p>
                    </div>
                </div>
            </div>
        </a>
        `).join("");

        document.querySelectorAll(".user-link").forEach(link => link.addEventListener("click", handleUserClick));
    }

    function handleUserClick(event) {
        event.preventDefault();
    
        let username = event.target.innerText;
        $.ajax({
            url: "recent-search-update.php",
            type: "POST",
            data: { "username": username },
            success: function(response){ 
                window.location.href = "profile.php?username=" + username;
            }
        });
    }
});
