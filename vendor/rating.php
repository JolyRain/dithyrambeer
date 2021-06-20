<?php
$maxValue = 10;
function print_star()
{
    $name = 'rating';
    global $maxValue;
    for ($value = $maxValue; $value > 0; $value--) { ?>
        <input type="radio" class="radio" onclick="click_radio(this)"  name="<?= $name ?>" value="<?= $value ?>" id="<?= $name . $value ?>">
        <label onmouseenter="enter_label(this)"  onmouseleave="leave_label()" for="<?= $name . $value ?>" class="unselectable">☆</label>
    <?php }
}
?>
