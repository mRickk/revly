<form action="#" method="POST">
    <h2>LOGIN</h2>
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
    <?php if(isset($templateParams["loginError"])): ?>
    <p><?php echo $templateParams["loginError"]; ?></p>
    <?php endif;?>
</form>
<section>
    <a href="sign-up.php">Register a new account</a>
</section>