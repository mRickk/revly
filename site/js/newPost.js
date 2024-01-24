// script.js

document.addEventListener("DOMContentLoaded", function () {
    // Trova tutti gli elementi della dropdown
    var dropdownItems = document.querySelectorAll('.dropdown-item');

    // Aggiungi un listener a ciascun elemento della dropdown
    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function () {
            // Imposta il valore del campo nascosto con il valore dell'elemento cliccato
            document.getElementById('selectedEvaluation').value = item.getAttribute('data-value');
            // Cambia il testo del pulsante principale con il valore selezionato
            document.getElementById('evaluationBtn').innerText = item.innerText;
        });
    });
});

function previewImage() {
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('imgPost');
    var file = fileInput.files[0];
    
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}


