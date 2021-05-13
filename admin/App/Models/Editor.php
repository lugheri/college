<?php namespace Models;
use Core\Model;

class Editor extends Model{
    public function fontes(){
        $sql = $this->db->prepare("SELECT * FROM `editor_fontes` ORDER BY `nome` ASC");
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
         }else{
             return $sql->fetchAll();
         }
    }
}