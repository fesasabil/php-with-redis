<?php

require_once __DIR__ . '/vendor/autoload.php';

use Predis\Client;

try {
    $redis = new Client();
    $redis->setex('card', 10, "{\"name\":\"shampoo pantene\", \"amount\":\"10\"}");
    $run = true;

    while ($run) {
        $cart = $redis->get('card');
        echo $cart."\n";

        $ttl = $redis->ttl('card');
        echo "ttl: ".$ttl."\n";

        sleep(1);

        if ($ttl < 0)
        {
            $run = false;
        }
    }
} catch (Exception $e) {
    die($e->getMessage());
}