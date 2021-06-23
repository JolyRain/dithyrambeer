<?php
$MAX_RATING = 10;

function getUserLevel($opin_count)
{
    if ($opin_count < 10) {
        return 'новичок';
    } else if ($opin_count < 50) {
        return 'бывалый';
    } else if ($opin_count < 100) {
        return 'эксперт';
    } else if ($opin_count < 500) {
        return 'мудрец';
    } else if ($opin_count < 1000) {
        return 'легенда';
    }
}