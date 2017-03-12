<?php
require('vendor/autoload.php');
include 'src/Chat.php';
use Ratchet \Server\IoServer;
use ChatApp\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
  //new Chat(),
  new HttpServer(
      new WsServer(
        new Chat()
        )
  ),
  8000
);
$server->run();


 ?>
