<?php $user = $templateParams["user"]; ?>
<form action="#" method="POST">
    <h2 class="text-primary d-flex align-items-center">Change your personal details</h2>
    <ul>
        <li>
            <label>Username<input type="text" name="username" value="<?php echo $user["username"]; ?>" required/></label>
        </li>
        <li>
            <label>Name<input type="text" name="name" value="<?php echo $user["name"]; ?>" required/></label>
        </li>
        <li>
            <label>Surname<input type="text" name="surname" value="<?php echo $user["surname"]; ?>" required/></label>
        </li>
        <li>
            <input type="submit" name="submit" value="UPDATE"/>
        </li>
    </ul>
    <?php require("update-msg.php"); ?>
</form>