<div class="bg-body-tertiary bg-opacity-50 rounded-5">
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="#" method="POST">
                <h2 class="mb-4 revly-primary-color">LOGIN</h2>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputUsername">Username</label>
                    <input type="text" class="form-control rounded-pill" id="inputUsername" name="username" placeholder="Username" required/>
                </div>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputPassword">Password</label>
                    <input type="password" class="form-control rounded-pill" id="inputPassword" name="password" placeholder="Password" required/>
                </div>
                <input class="btn btn-primary w-50 mb-2 rounded-pill" type="submit" name="submit" value="LOGIN"/>
                <?php require("update-msg.php"); ?>
            </form>
            <section>
                <a class ="link-primary" href="sign-up.php">Register a new account</a>
            </section>
        </div>
        <div class="col-1"></div>
    </div>
</div>

