<div class="bg-body-tertiary bg-opacity-25 rounded-5 shadow p-4 mb-5 text-center">
    <form action="#" method="POST">
        <h2 class="mb-4 roboto-light">CREATE ACCOUNT</h2>
        <small class="text-muted d-block text-center mb-2">(All fields are required unless specified optional)</small>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputUsername">Username</label>
            <input type="text" class="form-control rounded-pill" id="inputUsername" name="username" placeholder="Username" value="<?php echo isset($templateParams["username"]) ? $templateParams["username"] : '';?>" required/>
        </div>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputName">Name</label>
            <input type="text" class="form-control rounded-pill" id="inputName" name="name" placeholder="Name" value="<?php echo isset($templateParams["name"]) ? $templateParams["name"] : '';?>" required/>
        </div>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputSurname">Surname (optional)</label>
            <input type="text" class="form-control rounded-pill" id="inputSurname" name="surname" value="<?php echo isset($templateParams["surname"]) ? $templateParams["surname"] : '';?>" placeholder="Surname (optional)"/>
        </div>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputEmail">Email</label>
            <input type="email" class="form-control rounded-pill" id="inputEmail" name="email" value="<?php echo isset($templateParams["email"]) ? $templateParams["email"] : '';?>" placeholder="Email" required/>
        </div>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputPassword">Password</label>
            <input type="password" class="form-control rounded-pill" id="inputPassword" name="password" value="<?php echo isset($templateParams["password"]) ? $templateParams["password"] : '';?>" placeholder="Password" required/>
        </div>
        <div class="form-group mb-3">
            <label class="visually-hidden" for="inputConfirmPassword">Confirm password</label>
            <input type="password" class="form-control rounded-pill" id="inputConfirmPassword" name="confirm_password" placeholder="Confirm password" required/>
        </div>
        <input class="btn btn-primary w-auto px-4 rounded-pill mb-2" type="submit" name="submit" value="CREATE ACCOUNT"/>
        <?php require("update-msg.php"); ?>
    </form>
    <div class="text-center mt-2 text-secondary">
        <a class="roboto-bold" href="index.php">Log into existing account</a>
    </div>
</div>