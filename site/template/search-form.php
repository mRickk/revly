<form action="#" method="POST">
    <div class="row gx-1">
        <input type="search" id="searchBar" class="form-control rounded-pill" placeholder="Search"/>
        <label class="form-label d-none" for="searchBar">Search</label>
    </div>
</form>

<section class="d-flex flex-column min-vh-100">
    <div class="recent-searches flex-grow-1 bg-body-tertiary bg-opacity-25 mt-3 p-2">
        <div class="row gx-1">
            <h2>Recent searches</h2><?php //TODO: modificare il titolo con Search result ogni volta che si cerca ?>
        </div>
        <div id="searchResult">
            

        </div>
    </div>
</section>
