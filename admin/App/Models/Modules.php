<?php
namespace Models;
use Core\Model;

class Modules extends Model{

    public function modules($type){
        $sql = $this->db->prepare("SELECT * FROM `modulos` WHERE `local_exibicao`=:type AND `status`=1 ORDER BY `ordem` ASC");
        $sql->bindValue(':type',$type);
        if($sql->execute()===false){
           $erro = $sql->errorInfo();
           echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetchAll();
        }
    }

    public function telasModulo($idModule){
        $sql = $this->db->prepare("SELECT * FROM `telas` WHERE `idmodulo`=:idModule AND `status`=1 ORDER BY `ordem` ASC");
        $sql->bindValue(':idModule',$idModule);
        if($sql->execute()===false){
           $erro = $sql->errorInfo();
           echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetchAll();
        }
    }

    public function tituloModulo($modulo){
        $sql = $this->db->prepare("SELECT `nome` FROM `modulos` WHERE `modulo`=:modulo");
        $sql->bindValue(':modulo',$modulo);
        if($sql->execute()===false){
           $erro = $sql->errorInfo();
           echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs=$sql->fetch();
            return $rs['nome'];
        }
    }

    public function infoTela($tela){
        $sql = $this->db->prepare("SELECT `nome`,`descricao` FROM `telas` WHERE `tela`=:tela");
        $sql->bindValue(':tela',$tela);
        if($sql->execute()===false){
           $erro = $sql->errorInfo();
           echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

}