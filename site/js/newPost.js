document.addEventListener("DOMContentLoaded", function () {
    var dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function () {
            document.getElementById('selectedEvaluation').value = item.getAttribute('data-value');
            document.getElementById('evaluationBtn').innerText = item.innerText;
        });
    });

    var inputSubject = document.getElementById('subjectInput');
    var datalist = document.getElementById('tagSuggestions');

    inputSubject.addEventListener('input', function () {
        var inputValue = inputSubject.value.trim().toLowerCase();
        datalist.innerHTML = '';

        if (inputValue !== '') {
            getSuggestions(inputValue);
        }
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

function getSuggestions(searchTerm) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var suggestions = JSON.parse(xhr.responseText);
                updateSuggestionsList(suggestions);  // Corretto il nome della funzione qui
            }
        }
    };

    xhr.open('GET', 'search.php?q=' + encodeURIComponent(searchTerm), true);
    xhr.send();
}

function updateSuggestionsList(suggestions) {
    var datalist = document.getElementById('tagSuggestions');

    suggestions.forEach(function (tagItem) {
        var option = document.createElement('option');
        option.value = tagItem.name + ' - ' + tagItem.company_name;
        datalist.appendChild(option);
    });
}

var inputSubject = document.getElementById('subjectInput');
inputSubject.addEventListener('input', function () {
    var inputValue = inputSubject.value.trim().toLowerCase();
    datalist.innerHTML = '';

    if (inputValue !== '') {
        getSuggestions(inputValue);
    }
});

