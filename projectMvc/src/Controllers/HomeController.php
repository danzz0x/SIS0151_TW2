<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Producto;

class HomeController extends Controller
{
  public function index()
  {
    //Rescatamos los datos con ayuda del 
    //modelo de datos


    $this->render('index');
  }
  public function dashboard()
  {
    $this->render('dashboard');
  }
}
