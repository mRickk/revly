<?php $user = $templateParams["user"]; ?>
<a href="#" onclick="history.go(-1)"><i class="bi bi-arrow-left-circle"></i></a>
<form action="#" method="POST">
    <h2 class="text-primary d-flex align-items-center">Change your password</h2>
    <ul>
        <li>
            <label>Old password<input type="password" name="oldpassword" required/></label>
        </li>
        <li>
            <label>New password<input type="password" name="password" required/></label>
        </li>
        <li>
            <label>Confirm new password<input type="password" name="confirmpassword" required/></label>
        </li>
        <li>
            <input type="submit" name="submit" value="UPDATE PASSWORD"/>
        </li>
    </ul>
    <?php require("update-msg.php"); ?>
</form>