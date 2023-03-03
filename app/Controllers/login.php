<?php 
namespace App\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;

class LoginController extends BaseController 
{

    public function index2()
    {
        return view('login2_view');
    }
    public function login2()
    {
        $petugass = new Petugas();
        $username = $this->request->getpost('username');
    }        

}