<form action="#" method="POST">
    <h1 class="text-primary d-flex align-items-center">LOGIN</h1>
    <ul>
        <li>
            <label>Username<input type="text" name="username" required/></label>
        </li>
        <li>
            <label>Password<input type="password" name="password" required/></label>
        </li>
        <li>
            <input type="submit" name="submit" value="LOGIN"/>
        </li>
    </ul>
    <?php require("update-msg.php"); ?>
</form>
<section>
    <a href="sign-up.php">Register a new account</a>
</section>