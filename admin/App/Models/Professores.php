<?php
namespace Models;
use Core\Model;

class Professores extends Model{
    public function listarProfessores($status){
        if($status === false){
            $sql = $this->db->prepare("SELECT * 
                                         FROM `cursos_professores` 
                                     ORDER BY `id` DESC");            
        }else{
            $sql = $this->db->prepare("SELECT * 
                                         FROM `cursos` 
                                        WHERE `status`=:st
                                     ORDER BY `id` DESC");
            $sql->bindValue(":st",$status);
        }
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetchAll();
        }
    }

    public function infoProfessor($idProfessor){
        $sql = $this->db->prepare("SELECT * FROM `cursos_professores` WHERE `id`=:idProfessor");
        $sql->bindValue(":idProfessor",$idProfessor);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

    public function nomeProfessor($idProfessor){
        $sql = $this->db->prepare("SELECT `nome` FROM `cursos_professores` WHERE `id`=:idProfessor");
        $sql->bindValue(":idProfessor",$idProfessor);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs= $sql->fetch();
            return $rs['nome'];
        }
    }
}