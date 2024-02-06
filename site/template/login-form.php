<div class="bg-body-tertiary bg-opacity-25 rounded-5 shadow p-4">
    <form action="#" method="POST">
        <h2 class="text-center mb-4">LOGIN</h2>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputUsername">Username</label>
            <input type="text" class="form-control rounded-pill" id="inputUsername" name="username" placeholder="Username" required/>
        </div>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputPassword">Password</label>
            <input type="password" class="form-control rounded-pill" id="inputPassword" name="password" placeholder="Password" required/>
        </div>
        <div class="text-center"> <!-- Aggiunto il div con la classe text-center -->
            <input class="btn btn-primary w-auto px-4 mb-2 rounded-pill shadow-sm" type="submit" name="submit" value="LOGIN"/>
        </div>
        <?php require("update-msg.php"); ?>
    </form>
    <div class="text-center">
        <a class="link-primary" href="sign-up.php">Register a new account</a>
    </div>
</div>