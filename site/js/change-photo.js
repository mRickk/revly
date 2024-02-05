
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


document.getElementById('imgPost').addEventListener('change', previewImage);

document.getElementById('removePhotoButton').addEventListener('click', function () {
    document.getElementById('removePhotoInput').value = 'true';
    document.getElementById('preview').src = './upload/default-image.png';
});