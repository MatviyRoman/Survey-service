<?php

function dd($code) {
    echo '<pre>';
    echo print_r($code);
    echo '</pre>';

    exit;
}

function Now() {
    return date('Y-m-d H:i:s');
}