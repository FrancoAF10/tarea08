<?php

namespace App\Controllers;
use WebSocket\Client; 
use App\Models\Averias;

class AveriasController extends BaseController
{
    public function index(): string
    {
        $averias=new Averias();
        $datos["averias"]=$averias->orderBy("id","ASC")->findAll();
        return view('Averias/listar',$datos);
    }

    public function registrar(){
        return view('Averias/registrar');
    }
    public function crear(){
      $averias=new Averias();
      $data=[
        "cliente"=>$this->request->getVar("cliente"),
        "problema"=>$this->request->getVar("problema"),
        "fechahora"=>$this->request->getVar("fechahora")
      ];
      
      $averias->insert($data);
       try {
            $client = new Client("ws://localhost:8080");
            $client->send(json_encode([
                'type' => 'nueva_averia',
                'data' => $data
            ]));
            $client->close();
        } catch (\Exception $e) {
            log_message('error', 'Error enviando notificación WebSocket: ' . $e->getMessage());
        }
    }
}
