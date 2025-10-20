<?php

namespace App\Controllers;
use WebSocket\Client; 
use App\Models\Averias;

class AveriasController extends BaseController
{
    public function index(): string
    {
        $averias=new Averias();
        $datos["averias"]=$averias->where("status","Pendiente")->findAll();
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
                'averia' => $data
            ]));
            $client->close();
        } catch (\Exception $e) {
            log_message('error', 'Error enviando notificación WebSocket: ' . $e->getMessage());
        }
    }
    public function editar(){
        $averias=new Averias();
        $datos["averias"]=$averias->where("status","Solucionado")->findAll();
        return view('Averias/atendidos',$datos);
    }
    public function actualizar($id)
    {
        $averias = new Averias();
        $averia = $averias->find($id);
        $status = $this->request->getVar('status');
        $averias->update($id, ['status' => $status]);

        try {
            $client = new Client("ws://localhost:8080");
            $client->send(json_encode([
                'type' => 'averia_actualizada',
                'averia' => [
                    'id' => $id,
                    'cliente' => $averia['cliente'],
                    'problema' => $averia['problema'],
                    'fechahora' => $averia['fechahora'],
                    'status' => $status
                ]
            ]));
            $client->close();
        } catch (\Exception $e) {
            log_message('error', 'Error enviando notificación WebSocket: ' . $e->getMessage());
        }

        
        return $this->response->setJSON(['success' => true]);

    }

}
