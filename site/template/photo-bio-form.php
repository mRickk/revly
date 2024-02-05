<?php $user = $templateParams["user"]; ?>
<form action="#" method="POST" enctype="multipart/form-data">
    <h2 class="text-primary d-flex align-items-center">Change your information</h2>
    <ul>
        <li>
            <div class="mt w-50 h-50 mb-2">
                <label for="imgPost" class="file-label">
                    <img id="preview" src="<?php echo UPLOAD_DIR . $user["img"]; ?>" alt="User Preview">
                    <input class="square visually-hidden" type="file" id="imgPost" name="imgPost" accept="image/jpg, image/png, image/jpeg, image/jpg">
                </label>
            </div>
        </li>
        <li>
            <button type="button" id="removePhotoButton"><i class="bi bi-trash"></i></button>
            <input type="submit" name="submit" value="UPDATE"/>
        </li>
        <li>
            <label>Biography<input type="text" name="bio" value="<?php echo $user["biography"]; ?>" required/></label>
        </li>
    </ul>
    <input type="hidden" id="removePhotoInput" name="removePhoto" value="false">
    <?php require("update-msg.php"); ?>
</form>
