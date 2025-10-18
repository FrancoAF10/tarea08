<?php

require __DIR__ . '/vendor/autoload.php';
//servidor websocket para codeigniter 4
use App\Libraries\Notify;
use Ratchet\Server\IoServer; //INPUT OUTPUT
use Ratchet\Http\HttpServer; //PROTOCOLO DE COMUNICACIÓN
use Ratchet\WebSocket\WsServer;//SOCKET

use App\Libraries\Chat; //implementacion de socket=CHAT

$server=IoServer::factory(
    new HttpServer(
      new WsServer(
        new Notify()
      )
      ),
      8080
);

echo "servidor websocket iniciado en puerto 8080\n";
echo "pulse CTRL + C para detener el servidor";

$server->run();