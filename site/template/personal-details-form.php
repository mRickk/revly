<?php $user = $templateParams["user"]; ?>

<div class="bg-body-tertiary bg-opacity-50 rounded-5">
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="#" method="POST">
                <h2 class="mb-4 mt-2">Change your personal details</h2>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputUsername">Username</label>
                    <input type="text" class="form-control rounded-pill" id="inputUsername" name="username" placeholder="Insert new username..." value="<?php echo $user["username"]; ?>" required/>
                </div>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputName">Name</label>
                    <input type="text" class="form-control rounded-pill" name="name" placeholder="Insert new name..." value="<?php echo $user["name"]; ?>" required/>
                </div>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputSurname">Surname</label>
                    <input type="text" class="form-control rounded-pill" name="surname" placeholder="Insert new surname...(optional)" value="<?php echo $user["surname"]; ?>"/>
                </div>
                <input class="btn btn-primary w-50 mb-2 rounded-pill" type="submit" name="submit" value="UPDATE"/>
                <?php require("update-msg.php"); ?>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>