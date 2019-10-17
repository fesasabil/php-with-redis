<?php

require_once __DIR__ . '/vendor/autoload.php';

use Predis\Client;

try {
    $redis = new Client();
    $redis->set('username', 'fesa');
    $user = $redis->get('username');
    echo $user."\n";
} catch (Exception $e) {
    die($e->getMessage());
}