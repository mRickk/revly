<div class="bg-body-tertiary bg-opacity-25 rounded-5 shadow p-4 mb-5 text-center">
    <form action="#" method="POST">
        <h2 class="mb-4 roboto-light">LOGIN</h2>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputUsername">Username</label>
            <input type="text" class="form-control rounded-pill roboto-regular" id="inputUsername" name="username" placeholder="Username" required/>
        </div>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputPassword">Password</label>
            <input type="password" class="form-control rounded-pill roboto-regular" id="inputPassword" name="password" placeholder="Password" required/>
        </div>
        <input class="btn btn-primary w-auto px-4 mb-2 rounded-pill shadow-sm roboto-regular" type="submit" name="submit" value="LOGIN"/>
        <?php require("update-msg.php"); ?>
    </form>
    <div class="text-center mt-2 text-secondary">
        <a class="roboto-bold" href="sign-up.php">Register a new account</a>
    </div>
</div>