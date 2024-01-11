<form action="index.php" method="POST">
    <h1>CREATE ACCOUNT</h1>
    <p>(All fields are required unless specified optional)</p>
    <ul>
        <li>
            <label>Username<input type="text" name="username" required/></label>
        </li>
        <li>
            <label>Name<input type="text" name="name" required/></label>
        </li>
        <li>
            <label>Surname (optional)<input type="text" name="surname"/></label>
        </li>
        <li>
            <label>Email<input type="email" name="email" required/></label>
        </li>
        <li>
            <label>Password<input type="password" name="password" required/></label>
        </li>
        <li>
            <label>Confirm password DA FARE CON JS<input type="password" name="confirm_password" required/></label>
        </li>
        <li>
            <input type="submit" name="submit" value="CREATE ACCOUNT"/>
        </li>
    </ul>
</form>
<section>
    <a href="index.php">Log into existing account</a>
</section>