<?php
namespace Controllers;
use Core\Controller;

class dashboardController extends Controller{
    private $modulo_ativo;

    public function __construct(){
        $this->modulo_ativo = 'dashboard';
    }

    public function index(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='visaogeral';
        $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);
    }


}