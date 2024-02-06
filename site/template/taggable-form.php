<div class="bg-body-tertiary bg-opacity-50 rounded-5 shadow">
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="#" method="POST">
                <h2 class="mb-4 mt-2">Insert new Taggable</h2>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputTaggable">Taggable</label>
                    <input type="text" class="form-control rounded-pill" id="inputTaggable" name="taggable" placeholder="Insert new taggable..." required/>
                </div>
                <div class="form-group mb-3">
                    <label class="d-none" for="inputAddress">Address</label>
                    <input type="text" class="form-control rounded-pill" name="Address" placeholder="Insert address..."/>
                </div>
                <input class="btn btn-primary w-50 mb-2 rounded-pill shadow-sm" type="submit" name="submit" value="UPDATE"/>
                <?php require("update-msg.php"); ?>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>