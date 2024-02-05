<form action="create-post.php" method="POST" enctype="multipart/form-data" class="bg-body-secondary bg-opacity-75 mb-3 pb-2">
    <div class="row px-3 py-2">
        <h2 class="fs-4">New Post</h2>
    </div>
    <div class="row gx-1 mb-1">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="border rounded mb-2 text-center">
                <label for="imgPost" class="file-label">
                    <img class="rounded" id="preview" src="./img/default_preview.png" alt="Preview">
                    <input class="square visually-hidden" type="file" id="imgPost" name="imgPost" accept="image/jpg, image/png, image/jpeg, image/jpg">
                </label>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1 mb-3">
        <div class="col-1"></div>
        <div class="col-10 text-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" name="evaluation" data-bs-toggle="dropdown" aria-expanded="false" id="evaluationBtn" required>
                    Evaluation
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" data-value="1">1 <i class="bi bi-star-fill"></i></a></li>
                    <li><a class="dropdown-item" data-value="2">2 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></a></li>
                    <li><a class="dropdown-item" data-value="3">3<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></a></li>
                    <li><a class="dropdown-item" data-value="4">4<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></a></li>
                    <li><a class="dropdown-item" data-value="5">5<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></a></li>
                </ul>
                <input type="hidden" name="selectedEvaluation" id="selectedEvaluation" required>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1 mb-3">
        <div class="col-1"></div>
        <div class="col-10">
            <label for="subjectInput" class="d-none">Subject:</label>
            <input type="text" class="form-control" name="subjectInput" id="subjectInput" list="tagSuggestions" placeholder="Subject of review" required/>
            <datalist id="tagSuggestions"></datalist>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1 mb-3">
        <div class="col-1"></div>
        <div class="col-10">
            <label for="descriptionInput" class="d-none">Description:</label>
            <textarea class="form-control" name="description" placeholder="Add description..." id="descriptionInput" rows="5" required></textarea>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1 mb-3">
        <div class="col-1"></div>
        <div class="col-10 text-end">
            <button type="submit" class="btn btn-outline-secondary rounded-pill" value="Rate it!">Rate it!</button>
        </div>
        <div class="col-1"></div>
    </div>
</form>