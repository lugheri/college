<?php
namespace Core;
use Core\Models;
use Models\Usuarios;

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
        include 'App/Views/loadTemplate.php';
    }

    public function loadViewInTemplate($viewName,$viewData = array()){
        extract($viewData);
        $infoUser=$this->dataUser();
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

}