<?php
namespace Models;
use Core\Model;

class Usuarios extends Model{
    //Verifica se o usuario esta logado
    public function isLogged(){
        if(isset($_COOKIE['user_traderx'])&&!empty($_COOKIE['user_traderx'])){
            $userData = explode(':', base64_decode($_COOKIE['user_traderx']));
            return $userData;
        }else{
            setcookie("user_traderx",null,time()-1);
            header('Location: '.BASE_URL.'login');
            return false;
        }
    }

    public function autenticar($dados){
        $sql = $this->db->prepare("SELECT `id`,`nome`,`email` 
                                     FROM `usuarios` 
                                    WHERE `email`=:email
                                      AND `senha`=:senha 
                                      AND `status`=1");
        $sql->bindValue(':email',$dados['username']);
        $sql->bindValue(':senha',md5($dados['pass']));
        if($sql->execute() === false){
            return false;
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            if($sql->rowCount()==0){
                return false;
            }else{
                return $sql->fetch();
            }
        }
    }
}