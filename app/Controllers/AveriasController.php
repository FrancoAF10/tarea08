<?php

namespace App\Controllers;

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
        "fechahora"=>$this->request->getVar("fechahora"),
        "status"=>$this->request->getVar("status")
      ];
      
      $averias->insert($data);
    }
}
