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
    $.ajax({
        url: 'search.php',
        type: 'GET',
        data: { q: searchTerm },
        success: function (suggestions) {
            updateSuggestionsList(JSON.parse(suggestions));
        }
    });
}

function updateSuggestionsList(suggestions) {
    var datalist = document.getElementById('tagSuggestions');

    suggestions.forEach(function (tagItem) {
        var option = document.createElement('option');
        option.value = tagItem.name + ' - ' + tagItem.company_name;
        datalist.appendChild(option);
    });
}
