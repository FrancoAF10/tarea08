<?php 
namespace App\Models;
use CodeIgniter\Model;

class Averias extends Model{
  protected $table="averias";
  protected $createdField="create_at";
  protected $updatedField="update_id";
  protected $allowedFields=['cliente','problema','fechahora','status'];

}