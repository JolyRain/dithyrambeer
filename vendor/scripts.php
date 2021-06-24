<?php
function session_on():bool {
    return array_key_exists('user', $_SESSION);
}
