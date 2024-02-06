<?php $isButtonDisabled = $templateParams["requestCompany"]; ?>
<div class="bg-body-tertiary bg-opacity-50 rounded-5 shadow">
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="#" method="POST">
                <h2 class="mb-4 mt-2">Submit your company account request</h2>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputName">Name</label>
                    <input type="text" class="form-control rounded-pill" id="inputName" name="name" placeholder="Insert company name..." required/>
                </div>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputAddress">Address</label>
                    <input type="text" class="form-control rounded-pill" name="address" id="inputAddress" placeholder="Insert company address..." required/>
                </div>

                <input class="btn btn-primary w-50 mb-2 rounded-pill shadow-sm" type="submit" name="submit" value="SUBMIT" <?php if ($isButtonDisabled) echo 'disabled'; ?>/>
                <?php require("update-msg.php"); ?>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>