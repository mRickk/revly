<div class="row text-center">
    <div class="col-1"></div>
    <div class="col-10">
        <form action="#" method="POST">
            <h2 class="text-primary mb-4">CREATE ACCOUNT</h2>
            <p class="mb-3">(All fields are required unless specified optional)</p>
            <div class="form-group mb-3">
                <label class="d-none" for="inputUsername">Username</label>
                <input type="text" class="form-control rounded-pill" id="inputUsername" name="username" placeholder="Username" value="<?php echo isset($templateParams["username"]) ? $templateParams["username"] : '';?>" required/>
            </div>
            <div class="form-group mb-3">
                <label class="d-none" for="inputName">Name</label>
                <input type="text" class="form-control rounded-pill" id="inputName" name="name" placeholder="Name" value="<?php echo isset($templateParams["name"]) ? $templateParams["name"] : '';?>" required/>
            </div>
            <div class="form-group mb-3">
                <label class="d-none" for="inputSurname">Surname (optional)</label>
                <input type="text" class="form-control rounded-pill" id="inputSurname" name="surname" value="<?php echo isset($templateParams["surname"]) ? $templateParams["surname"] : '';?>" placeholder="Surname"/>
            </div>
            <div class="form-group mb-3">
                <label class="d-none" for="inputEmail">Email</label>
                <input type="email" class="form-control rounded-pill" id="inputEmail" name="email" value="<?php echo isset($templateParams["email"]) ? $templateParams["email"] : '';?>" placeholder="Email" required/>
            </div>
            <div class="form-group mb-3">
                <label class="d-none" for="inputPassword">Password</label>
                <input type="password" class="form-control rounded-pill" id="inputPassword" name="password" value="<?php echo isset($templateParams["password"]) ? $templateParams["password"] : '';?>" placeholder="Password" required/>
            </div>
            <div class="form-group mb-3">
                <label class="d-none" for="inputConfirmPassword">Confirm password</label>
                <input type="password" class="form-control rounded-pill" id="inputConfirmPassword" name="confirm_password" placeholder="Confirm password" required/>
            </div>
            <input class="btn btn-primary w-50 mb-2 rounded-pill" type="submit" name="submit" value="CREATE ACCOUNT"/>
            <?php require("update-msg.php"); ?>
        </form>
        <section>
            <a class ="link-primary" href="index.php">Log into existing account</a>
        </section>
    </div>
    <div class="col-1"></div>
</div>
