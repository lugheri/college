<?php
namespace Core;
use Core\Models;
use Models\Usuarios;
use Models\Modules;
use Models\Biblioteca;

class Controller{

    public function loadLogin($viewData = array()){
        extract($viewData);
        include 'App/Views/login/login.php';
    }

    public function loadView($viewName,$viewData = array()){
        extract($viewData);
        include 'App/Views/'.$viewName.'.php';
    }

    public function loadTemplate($viewName,$viewData = array()){
        extract($viewData);
        //Dados do usuário
        $infoUser=$this->dataUser();
     
        //modulos do sistema
        $m = new Modules();
        //Listagem dos modulos disponíveis para side bar e barra de navegacao
        $modulos=$m->modules('side');

        include 'App/Views/loadTemplate.php';
    }

    public function loadViewInTemplate($viewName,$viewData = array()){
        extract($viewData);    
        
        include 'App/Views/'.$viewName.'.php';
    }

    //Outras funcoes comuns a todos controllers

    //Verifica se o usuario esta logado e recupera todos os dados do mesmo
    public function dataUser(){
        $u = new Usuarios;
        $dataUser=$u->isLogged();
        define('USER_ID',$dataUser[1]);
        define('USER_NAME',$dataUser[2]);
        define('USER_MAIL',$dataUser[3]);
    }

    public function telasModulo($idModule){
        $m = new Modules();
        return $m->telasModulo($idModule);
    }

    
    public function tituloModulo($modulo){
        $m = new Modules();
        return $m->tituloModulo($modulo);
    }

    public function infoTela($tela){
        $m = new Modules();
        return $m->infoTela($tela);
    }

    public function getImageBiblioteca($idImagem){
        $b = new Biblioteca();
        $link_imagem = BIBLIOTECA.$b->getImageBiblioteca($idImagem);
        return $link_imagem;
    }

    public function resumeText($text,$limit){
        $t=explode(" ",$text);
        if(count($t) > $limit):
            $smallText="";
            for($i=0;$i < $limit;++$i):
                $smallText.=$t[$i]." ";
            endfor;
            $smallText.='...';
            return $smallText;
        endif;
        return $text;

    }

    
    

}