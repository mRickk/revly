<?php $user = $templateParams["user"]; ?>
<a href="settings.php"><i class="bi bi-arrow-left-circle"></i></a>
<form action="#" method="POST" enctype="multipart/form-data">
    <h2 class="text-primary d-flex align-items-center">Change your information</h2>
    <ul>
        <li>
            <div class="mt w-50 h-50 mb-2">
                <label for="imgPost" class="file-label">
                    <img id="preview" src="<?php echo UPLOAD_DIR . $user["img"]; ?>" alt="User Preview" style="max-width:100%; max-height:100%;">
                    <input class="square visually-hidden" type="file" id="imgPost" name="imgPost" accept="image/jpg, image/png, image/jpeg, image/jpg">
                </label>
            </div>
        </li>
        <li>
            <i class="bi bi-trash"></i></a>
            <input type="submit" name="submit" value="UPDATE"/>
        </li>
        <li>
            <label>Biography<input type="text" name="bio" value="<?php echo $user["biography"]; ?>" required/></label>
        </li>
    </ul>
    <input type="hidden" id="removePhotoInput" name="removePhoto" value="false">
    <script src="./js/change-photo.js"></script>
    <?php require("update-msg.php"); ?>
</form>
