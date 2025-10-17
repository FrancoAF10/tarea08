<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Averias extends Seeder
{
    public function run()
    {
        $data=[
            [
                "cliente"=> "Gian Franco Anton Felix",
                "problema"=> "Router Roto",
                "fechahora"=> "2025-10-10 14:20:00",
                "status"=> "Pendiente"
            ],
            [
                "cliente"=> "Aimar Alexander Contreras Carrillo",
                "problema"=> "Sin Conexión a Internet",
                "fechahora"=> "2025-10-10 14:20:00",
                "status"=> "Pendiente"
            ],
            [
                "cliente"=> "Kelvin Pipa Castilla",
                "problema"=> "Internet lento",
                "fechahora"=> "2025-10-10 14:20:00",
                "status"=> "Pendiente"
            ]
        ];

        //insertar en la tabla
        $this->db->table("averias")->insertBatch($data);
    }
}
