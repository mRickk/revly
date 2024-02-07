document.addEventListener("DOMContentLoaded", function () {
    
    let inputSubject = document.getElementById('subjectInput');
    let datalist = document.getElementById('tagSuggestions');

    inputSubject.addEventListener('input', function () {
        let inputValue = inputSubject.value.trim().toLowerCase();
        datalist.innerHTML = '';

        if (inputValue !== '') {
            getSuggestions(inputValue);
        }
    });
});


function previewImage() {
    let preview = document.getElementById('preview');
    let fileInput = document.getElementById('imgPost');
    let file = fileInput.files[0];

    if (file) {
        let reader = new FileReader();
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
    let datalist = document.getElementById('tagSuggestions');

    suggestions.forEach(function (tagItem) {
        let option = document.createElement('option');
        option.value = tagItem.name + ' - ' + tagItem.company_name;
        datalist.appendChild(option);
    });
}
