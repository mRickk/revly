<?php if(isset($templateParams["success-msg"])):?>
    <p class="text-success"><?php echo $templateParams["success-msg"]; ?></p>
<?php elseif(isset($templateParams["failure-msg"])): ?>
    <p class="text-danger"><?php echo $templateParams["failure-msg"]; ?></p>
<?php endif; ?>