<?php

function pr($arr, $op = false)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    if ($op) {
        die();
    }
}
