<?php 
namespace App\Models;

use CodeIgniter\Model;

class Masyarakat extends Model{
    protected $table      = 'tb_masyarakat';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_masyarakat';
    protected $allowedFields = ['nik', 'nama', 'username', 'password', 'telp'];

    protected $useSoftdeleted = true;
    protected $deletedFields = 'deleted_at';
}

