<?php
function session_on(): bool
{
    return array_key_exists('user', $_SESSION);
}

function roundRating($rating): float
{
    return floor($rating * 100) / 100;
}

function isPersonalPage($user_id): bool
{
    return session_on() and $_SESSION['user']['user_id'] == $user_id;
}

function isAdminSession(): bool
{
    return session_on() and $_SESSION['user']['role'] == 'admin';
}

function printStars($value): void
{?>
    <label onmouseenter="enter_label(this)" onmouseleave="leave_label()" for="<?= $name . $value ?>"
           class="unselectable">☆</label>
    <?php
}

