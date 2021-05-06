<?php namespace Controllers;
use Core\Controller;

class cursosController extends Controller{

    public function __construct(){
        $this->modulo_ativo = 'cursos';
    }

    public function index(){

    }

    public function catalogo(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo';


        $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);
    }
}