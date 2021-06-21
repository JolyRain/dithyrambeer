<?php
require 'defaults.php';
$name = 'rating';
global $MAX_RATING;
for ($value = $MAX_RATING; $value > 0; $value--) { ?>
    <input type="radio" class="radio" onclick="click_radio(this)" name="<?= $name ?>" value="<?= $value ?>"
           id="<?= $name . $value ?>">
    <label onmouseenter="enter_label(this)" onmouseleave="leave_label()" for="<?= $name . $value ?>"
           class="unselectable">☆</label>
<?php }
?>
