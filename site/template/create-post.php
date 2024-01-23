<form action="create-post.php" method="POST">
    <h1>NEW POST</h1>
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        <input type="file" class="form-control" name="file" required>
    </div>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" name="evaluation" data-bs-toggle="dropdown" aria-expanded="false" id="evaluationBtn" required>
            Evaluation
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" data-value="1">1</a></li>
            <li><a class="dropdown-item" href="#" data-value="2">2</a></li>
            <li><a class="dropdown-item" href="#" data-value="3">3</a></li>
            <li><a class="dropdown-item" href="#" data-value="4">4</a></li>
            <li><a class="dropdown-item" href="#" data-value="5">5</a></li>
        </ul>
        <!-- Aggiungi un campo nascosto per memorizzare il valore selezionato -->
        <input type="hidden" name="selectedEvaluation" id="selectedEvaluation" required>
    </div>
    <ul>
        <li>
            <input type="text" class="form-control mb-1" name="subject" placeholder="Subject" class="form-floating mb-3" required>
        </li>
        <li>
            <input type="text" class="form-control mb-1" name="description" placeholder="Description" class="form-floating mb-3" required>
        </li>
        <li>
            <button type="submit" class="btn btn-outline-secondary w-100 mb-1 rounded-5" value="Rate it!">Rate it!</button>
        </li>
    </ul>
</form>

