<?php

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use React\Socket\SocketServer;
use React\Socket\SecureServer;
use MyApp\Chat;

require dirname(__DIR__) . '/websock/vendor/autoload.php';


$loop = React\EventLoop\Loop::get();

$server = new SocketServer('127.0.0.1:9000', array(), $loop);

$secureServer = new SecureServer($server, $loop, [
    'local_cert'  => '/etc/letsencrypt/live/gamepsn1to1.com/bundled.crt',
    'local_pk' => '/etc/letsencrypt/live/gamepsn1to1.com/privkey.pem',
    'verify_peer' => false,
]);

$httpServer = new HttpServer(
    new WsServer(
        new Chat()
    )
);

$ioServer = new IoServer($httpServer, $secureServer, $loop);

$ioServer->run();
