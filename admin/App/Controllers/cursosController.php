<?php namespace Controllers;
use Core\Controller;
use Models\Cursos;

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

    public function filtraCatalogo(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo';
        $this->loadView($this->modulo_ativo.'/'.$data['telaAtual'],$_POST);
    }

    //Lista de curso por status
    public function listarCursos($status){
        $c = new Cursos();
        return $c->listarCursos($status);
    }

    public function totalAlunos_curso($idCurso){
        $c = new Cursos();
        return $c->totalAlunos_curso($idCurso);
    }
    
    public function avaliacao_curso($idCurso){
        $c = new Cursos();
        return $c->avaliacao_curso($idCurso);
    }

    public function criarCurso(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo_criarCurso';

        //Fases do Cadastro
        $data['fases'] = array(
            '<i class="fas fa-info"></i> Informações',
            '<i class="fas fa-wrench"></i> Pré Configuração',
            '<i class="fas fa-camera"></i> Imagem de Capa',
            '<i class="fas fa-check"></i> Confirmação');
        
        if(empty($_POST)){    
            //Fase atual
            $data['faseAtual']=0;
            $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);
        }else{
            $c = new Cursos();
            $data['faseAtual']=$_POST['faseAtual']+1;
            $data['idCurso']=$c->criarCurso($_POST);

            $this->loadView($this->modulo_ativo.'/'.$data['telaAtual'],$data);
        }        
    }

    public function infoCurso($idCurso){
        $c = new Cursos();
        return $c->infoCurso($idCurso);
    }

    public function editar($idCurso){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo_editarCurso';

        $c = new Cursos();
        $idCurso = explode(':',base64_decode($idCurso));
        $data['infoCurso']=$c->infoCurso($idCurso[0]);

        $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);

    }

}