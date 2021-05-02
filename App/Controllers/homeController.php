<?php
namespace Controllers;
use Core\Controller;

class homeController extends Controller{
    private $modulo_ativo;

    public function __construct(){
        $this->modulo_ativo = 'home';
    }

    public function index(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['texto']='Home';
        $this->loadTemplate($this->modulo_ativo.'/visaoGeral',$data);
    }


}