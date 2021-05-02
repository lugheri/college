<?php
namespace Controllers;
use Core\Controller;
use Models\Usuarios;

class loginController extends Controller{

    public function index(){
        $dados['error']="";
        if(!empty($_POST)):
            $u = new Usuarios();
            $auth = $u->autenticar($_POST);
            if($auth === false):
               $dados['error']=1;
            else:
                $dados['error']="";
                //Setando Cookie de autenticacao
                setcookie("user_traderx",
                          base64_encode('adm:'.$auth['id'].':'.$auth['nome'].':'.$auth['email'].':'.date('Ymdhis')),       
                          time()+(345600*10),
                          '/');


                header('Location: '.BASE_URL);
            endif;
        endif;
        $this->loadLogin($dados);
    }
}