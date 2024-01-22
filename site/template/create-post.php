<form action="index.php" method="POST">
    <h1>NEW POST</h1>
    <ul>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" id="inputGroupFile01">
        </div>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Star
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">1</a></li>
                <li><a class="dropdown-item" href="#">2</a></li>
                <li><a class="dropdown-item" href="#">3</a></li>
            </ul>
        </div>
        <li>
            <input type="email" class="form-control mb-1" id="floatingInput" placeholder="Subject" class="form-floating mb-3">
        </li>
        <li>
            <input type="email" class="form-control mb-1" id="floatingInput" placeholder="Description" class="form-floating mb-3">
        </li>
        <button type="submit" class="btn btn-outline-secondary w-100 mb-1 rounded-5">Rate it!</button>
    </ul>
</form>