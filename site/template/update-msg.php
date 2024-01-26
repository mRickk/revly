<?php if(isset($templateParams["success-msg"])): //TODO togliere style inline! ?>
    <p style="color: green;"><?php echo $templateParams["success-msg"]; ?></p>
<?php elseif(isset($templateParams["failure-msg"])): ?>
    <p style="color: red;"><?php echo $templateParams["failure-msg"]; ?></p>
<?php endif; ?>