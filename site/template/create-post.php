<form action="create-post.php" method="POST" enctype="multipart/form-data">
    <h1>NEW POST</h1>
    <div class="mt w-50 h-50 mb-2">
        <label for="imgPost" class="file-label">
            <!-- Imposta un'immagine di anteprima predefinita -->
            <img id="preview" src="./img/default-image.jpg" alt="Default Preview" style="max-width:100%; max-height:100%;">
            <!-- Nascondi l'input del file finché non viene selezionato un'immagine -->
            <input class="square visually-hidden" type="file" id="imgPost" name="imgPost" accept="image/jpg, image/png, image/jpeg, image/jpg" onchange="previewImage()">
            
        </label>
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
            <label for="subjectInput">Subject:</label>
            <input type="text" id="subjectInput" list="tagSuggestions">
            <datalist id="tagSuggestions"></datalist>
        </li>
        <li>
            <input type="text" class="form-control mb-1" name="description" placeholder="Description" class="form-floating mb-3" required>
        </li>
        <li>
            <button type="submit" class="btn btn-outline-secondary w-100 mb-1 rounded-5" value="Rate it!">Rate it!</button>
        </li>
    </ul>
<script src="./js/newPost.js"></script>
</form>
