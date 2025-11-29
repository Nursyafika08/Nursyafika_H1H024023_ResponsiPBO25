<?php
function saveSession(array $entry){
    $file = __DIR__ . '/sessions.json';

    if(!file_exists($file)){
        file_put_contents($file, json_encode([]));
    }

    $data = json_decode(file_get_contents($file), true);
    $data[] = $entry;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

function loadSessions(): array {
    $file = __DIR__ . '/sessions.json';
    if(!file_exists($file)) return [];
    return json_decode(file_get_contents($file), true) ?: [];
}
