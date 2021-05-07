<?php
namespace Models;
use Core\Model;

class Biblioteca extends Model{
    public function getImageBiblioteca($idImagem){
        $sql = $this->db->prepare("SELECT `arquivo`,`extensao` FROM `biblioteca` WHERE `id`=:idImagem");
        $sql->bindValue(':idImagem',$idImagem);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs = $sql->fetch();
            return $rs['arquivo'];
        };
    }
}