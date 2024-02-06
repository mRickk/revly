<?php $user = $templateParams["user"]; ?>

<div class="bg-body-tertiary bg-opacity-50 rounded-5 mb-5 shadow">
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="#" method="POST" enctype="multipart/form-data">
                <h2 class="mb-4 mt-2">Change your photo & bio</h2>
                <div class="border rounded mb-2 text-center">
                    <label for="imgPost" class="file-label">
                        <img id="preview" src="<?php echo UPLOAD_DIR . $user["img"]; ?>" alt="User Preview">
                        <input class="square visually-hidden" type="file" id="imgPost" name="imgPost" accept="image/jpg, image/png, image/jpeg, image/jpg">
                    </label>
                </div>
                <button type="reset" class="btn btn-danger mb-3 py-1 px-2" id="removePhotoButton"><i class="bi bi-trash fs-5"></i></button>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputBio">Biography</label>
                    <textarea rows="3" name="bio" class="form-control rounded-4" id="inputBio" placeholder="Insert new bio..." required><?php echo $user["biography"]; ?></textarea>
                </div>
                <input class="btn btn-primary w-50 mb-2 rounded-pill shadow-sm" type="submit" name="submit" value="UPDATE"/>
                <input type="hidden" id="removePhotoInput" name="removePhoto" value="false">
                <?php require("update-msg.php"); ?>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>
