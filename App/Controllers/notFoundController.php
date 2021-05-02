<?php
namespace Controllers;
use Core\Controller;

class notFoundController extends Controller{

    public function index(){
        echo '404 Página nao localizada';
    }
}