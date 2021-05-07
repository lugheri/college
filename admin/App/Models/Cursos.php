<?php
namespace Models;
use Core\Model;

class Cursos extends Model{
    public function listarCursos($privacidade){
        if($privacidade === false){
            $sql = $this->db->prepare("SELECT * 
                                         FROM `cursos` 
                                        WHERE `status`=1 
                                     ORDER BY `id` DESC");            
        }else{
            $sql = $this->db->prepare("SELECT * 
                                         FROM `cursos` 
                                        WHERE `publico`=:privacidade 
                                          AND `status`=1 
                                     ORDER BY `id` DESC");
            $sql->bindValue(":privacidade",$privacidade);
        }
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetchAll();
        }
    }


    public function totalAlunos_curso($idCurso){
        $sql = $this->db->prepare("SELECT count(c.id) as `total` 
                                     FROM `alunos_cursos` AS `c`
                                     JOIN `alunos` AS `a`
                                       ON a.id=c.idAluno
                                    WHERE a.status=1
                                      AND c.idCurso=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs=$sql->fetch();
            return $rs['total'];
        }
    }

    public function avaliacao_curso($idCurso){
        $sql = $this->db->prepare("SELECT count(id) as `total`, sum(nota) AS nota
                                     FROM `aulas_assistidas`
                                    WHERE idCurso=:idCurso
                                      AND nota is not null");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false){
           $erro = $sql->errorInfo();
           echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs=$sql->fetch();
            $total =  $rs['total'];
            $nota =  $rs['nota'];
            if($total==0){return "Não Avaliado";}
            $media = round($nota/$total,2);
            return $media;
        }
    }

    public function criarCurso($dados){
        if($dados['faseAtual']==0){//Cadastra atualizacoes
            $sql = $this->db->prepare("INSERT INTO `cursos` 
                                                 (`dataCriacao`,`nome`,`descricao`,`publico`,`status`)
                                          VALUES (now(),:nome,:descricao,0,1)");
            $sql->bindValue(":nome",$dados['nome']);
            $sql->bindValue(":descricao",$dados['descricao']);
            if($sql->execute()===false){
                $erro = $sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
             }else{
                return $this->db->lastInsertId();
             }
        }
        if($dados['faseAtual']==1){//Cadastra atualizacoes
            $sql = $this->db->prepare("UPDATE `cursos`
                                          SET `autor`=:autor,
                                              `tags`=:tags
                                        WHERE `id`=:idCurso");
            $sql->bindValue(":autor",$dados['autor']);
            $sql->bindValue(":tags",$dados['tags']);
            $sql->bindValue(":idCurso",$dados['idCurso']);
            if($sql->execute()===false){
               $erro = $sql->errorInfo();
               echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            }else{
                return $dados['idCurso'];
            }
        }

        if($dados['faseAtual']==2){//salva capa
            $sql = $this->db->prepare("UPDATE `cursos`
                                          SET `capa`=:capa
                                        WHERE `id`=:idCurso");
            $sql->bindValue(":capa",$dados['capa']);
            $sql->bindValue(":idCurso",$dados['idCurso']);
            if($sql->execute()===false){
               $erro = $sql->errorInfo();
               echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            }else{
                return $dados['idCurso'];
            }
        }

        if($dados['faseAtual']==3){//confirma
            $sql = $this->db->prepare("UPDATE `cursos`
                                          SET `capa`=:capa,
                                              `nome`=:nome,
                                              `descricao`=:descricao,
                                              `tags`=:tags,
                                              `concluido`=1
                                        WHERE `id`=:idCurso");
            $sql->bindValue(":capa",$dados['capa']);
            $sql->bindValue(":nome",$dados['nome']);
            $sql->bindValue(":descricao",$dados['descricao']);
            $sql->bindValue(":tags",$dados['tags']);
            $sql->bindValue(":idCurso",$dados['idCurso']);
            if($sql->execute()===false){
               $erro = $sql->errorInfo();
               echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            }else{
                return $dados['idCurso'];
            }
        }
    }

    public function infoCurso($idCurso){
        $sql = $this->db->prepare("SELECT * FROM `cursos` WHERE `id`=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }
}