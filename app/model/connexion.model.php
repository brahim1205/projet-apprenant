<?php
function load_data() {
    $file = APP_PATH . '/data/data.json';
    if (file_exists($file)) {
        $json = file_get_contents($file);
        return json_decode($json, true);
    }
    return [];
}

function save_data($data) {
    $file = APP_PATH . '/data/data.json';
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}