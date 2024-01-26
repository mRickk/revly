document.addEventListener("DOMContentLoaded", function () {
    var dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function () {
            document.getElementById('selectedEvaluation').value = item.getAttribute('data-value');
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

document.addEventListener("DOMContentLoaded", function () {
    var inputSubject = document.getElementById('subjectInput');
    var datalist = document.getElementById('tagSuggestions');

    inputSubject.addEventListener('input', function () {
        var inputValue = inputSubject.value.toLowerCase();
        datalist.innerHTML = ''; // Pulisci la lista dei suggerimenti

        // Esegui la chiamata AJAX per ottenere i suggerimenti
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var suggestions = JSON.parse(xhr.responseText);

                    // Aggiungi i nuovi suggerimenti
                    suggestions.forEach(function (tagItem) {
                        var option = document.createElement('option');
                        option.value = tagItem.name + ' - ' + tagItem.company_name;
                        datalist.appendChild(option);
                    });
                }
            }
        };

        // Modifica l'URL della chiamata AJAX in base alla tua configurazione
        xhr.open('GET', 'searc.php?q=' + inputValue, true);
        xhr.send();
    });
});
