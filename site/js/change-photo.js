
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


document.getElementById('imgPost').addEventListener('change', previewImage);

document.getElementById('removePhotoButton').addEventListener('click', function () {
    document.getElementById('removePhotoInput').value = 'true';
    document.getElementById('preview').src = './upload/default-image.png';
});