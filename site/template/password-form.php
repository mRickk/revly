<?php $user = $templateParams["user"]; ?>

<div class="bg-body-tertiary bg-opacity-50 rounded-5 mb-5 shadow">
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="#" method="POST">
                <h2 class="mb-4 mt-2 roboto-light">Change your password</h2>
                <div class="form-group mb-3">
                    <label class="visually-hidden" for="inputOldPassword">Old password</label>
                    <input type="password" class="form-control rounded-pill" id="inputOldPassword" name="oldpassword" placeholder="Old password" required/>
                </div>
                <div class="form-group mb-3">
                    <label class="visually-hidden" for="inputNewPassword">New password</label>
                    <input type="password" class="form-control rounded-pill" id="inputNewPassword" name="password" placeholder="New password" required/>
                </div>
                <div class="form-group mb-3">
                    <label class="visually-hidden" for="inputConfirmPassword">Confirm new password</label>
                    <input type="password" class="form-control rounded-pill" id="inputConfirmPassword" name="confirmpassword" placeholder="Confirm new password" required/>
                </div>
                <input class="btn btn-primary w-50 mb-2 rounded-pill shadow-sm" type="submit" name="submit" value="UPDATE"/>
                <?php require("update-msg.php"); ?>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>