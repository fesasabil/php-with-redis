<?php

require_once __DIR__ . '/vendor/autoload.php';

use Predis\Client;

try {
    $redis = new Client();
    
    $redis->hset('user', 'name', 'Jono');
    $redis->hset('user', 'email', 'jono@gmail.com');
    $redis->hset('user', 'dob', '2019-10-17');

    print_r($redis->hgetall('user'));

    echo $redis->hget('user', 'name')."\n";
    echo $redis->hget('user', 'email')."\n";
    echo $redis->hget('user', 'dob')."\n";

    print_r($redis->hkeys('user'));
    print_r($redis->hvals('user'));

    echo $redis->hstrlen('user', 'email')."\n";
    echo $redis->hlen('user')."\n";
    echo $redis->hexists('user', 'email')."\n";
    echo $redis->hexists('user', 'website')."\n";

    $redis->hdel('user', 'dob')."\n";
    echo $redis->hexists('user', 'dob')."\n";

    $redis->del('user:123');

} catch (Exception $e) {
    die($e->getMessage());
}