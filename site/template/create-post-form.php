<form action="create-post.php" method="POST" enctype="multipart/form-data" class="bg-body-secondary bg-opacity-75 mb-3 pb-2 shadow roboto-regular">
    <div class="row px-3 py-2">
        <h2 class="fs-4 ">New Post</h2>
    </div>
    <div class="row gx-1 mb-1">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="border rounded mb-2 text-center">
                <label for="imgPost" class="file-label"><span class="visually-hidden">Post picture</span>
                    <img class="rounded" id="preview" src="./img/default_preview.png" alt="Preview">
                    <input class="square visually-hidden" type="file" id="imgPost" name="imgPost" accept="image/jpg, image/png, image/jpeg, image/jpg" required>
                </label>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1 mb-3">
        <div class="col-4"></div>
        <div class="col-4 text-center">
            <label for="evaluationInput" class="">Evaluation</label>
            <select class="form-select" name="selectedEvaluation" id="evaluationInput">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option selected>5</option>
            </select>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row gx-1 mb-3">
        <div class="col-1"></div>
        <div class="col-10">
            <label for="subjectInput" class="visually-hidden">Subject:</label>
            <input type="text" class="form-control" name="subjectInput" id="subjectInput" list="tagSuggestions" placeholder="Subject of review" required/>
            <datalist id="tagSuggestions"></datalist>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1 mb-3">
        <div class="col-1"></div>
        <div class="col-10">
            <label for="descriptionInput" class="visually-hidden">Description:</label>
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