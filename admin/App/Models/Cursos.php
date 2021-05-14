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

    public function aulaMelhorAvaliada($idCurso){
        $sql = $this->db->prepare("SELECT idAula, AVG(nota) AS `media`
                                     FROM `aulas_assistidas`
                                    WHERE idCurso=:idCurso
                                      AND nota is not NULL
                                 GROUP BY idAula
                                 ORDER BY media DESC
                                 LIMIT 1");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

    public function melhorProfessor($idCurso){
        $sql = $this->db->prepare("SELECT ca.idProfessor, AVG(aa.nota) AS `media`
                                     FROM `cursos_aulas` AS ca
                                     JOIN `aulas_assistidas` AS aa
                                       ON ca.id=aa.idAula
                                    WHERE nota is not null
                                      AND ca.idProfessor >0
                                      AND ca.idCurso=:idCurso
                                 GROUP BY ca.idProfessor
                                 ORDER BY media DESC
                                    LIMIT 1");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false):
           $error=$sql->errorInfo();
           print  '<small class="text-danger"><i class="fas fa-times"></i>"'.$error[2].'"</small><br/>';
           return false;
        else:
            return $sql->fetch();
        endif;
    }

    public function qtdAvaliacoesPorAlunos($idCurso){
        $sql = $this->db->prepare("SELECT COUNT(DISTINCT idAluno) AS alunos
                                     FROM `aulas_assistidas`
                                    WHERE nota is not null
                                      AND idCurso=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false):
           $error=$sql->errorInfo();
           print  '<small class="text-danger"><i class="fas fa-times"></i>"'.$error[2].'"</small><br/>';
           return false;
        else:
            $rs=$sql->fetch();
            return $rs['alunos'];
        endif;
    }

    public function qtdAvaliacoes($idCurso){
        $sql = $this->db->prepare("SELECT COUNT(id) AS avaliacoes
                                     FROM `aulas_assistidas`
                                    WHERE nota is not null
                                      AND idCurso=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false):
           $error=$sql->errorInfo();
           print  '<small class="text-danger"><i class="fas fa-times"></i>"'.$error[2].'"</small><br/>';
           return false;
        else:
            $rs=$sql->fetch();
            return $rs['avaliacoes'];
        endif;
    }

    public function totalAlunosCurso($idCurso){
        $sql = $this->db->prepare("SELECT COUNT(DISTINCT idAluno) AS alunos
                                     FROM `alunos_cursos`
                                    WHERE `status`=1
                                      AND idCurso=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false):
            $error=$sql->errorInfo();
            print  '<small class="text-danger"><i class="fas fa-times"></i>"'.$error[2].'"</small><br/>';
            return false;
        else:
            $rs=$sql->fetch();
            return $rs['alunos'];
        endif;
    }

    public function totalProfessoresCurso($idCurso){
        $sql = $this->db->prepare("SELECT COUNT(DISTINCT idProfessor) AS professores
                                     FROM `cursos_aulas`
                                    WHERE `status`=1
                                      AND idCurso=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false):
            $error=$sql->errorInfo();
            print  '<small class="text-danger"><i class="fas fa-times"></i>"'.$error[2].'"</small><br/>';
            return false;
        else:
            $rs=$sql->fetch();
            return $rs['professores'];
        endif;
    }

    public function totalModulosCurso($idCurso){
        $sql = $this->db->prepare("SELECT COUNT(id) AS modulos
                                     FROM `cursos_modulos`
                                    WHERE `status`=1
                                      AND idCurso=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false):
            $error=$sql->errorInfo();
            print  '<small class="text-danger"><i class="fas fa-times"></i>"'.$error[2].'"</small><br/>';
            return false;
        else:
            $rs=$sql->fetch();
            return $rs['modulos'];
        endif;
    }

    public function totalAulasCurso($idCurso){
        $sql = $this->db->prepare("SELECT COUNT(id) AS aulas
                                     FROM `cursos_aulas`
                                    WHERE `status`=1
                                      AND idCurso=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false):
            $error=$sql->errorInfo();
            print  '<small class="text-danger"><i class="fas fa-times"></i>"'.$error[2].'"</small><br/>';
            return false;
        else:
            $rs=$sql->fetch();
            return $rs['aulas'];
        endif;
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

    public function salvarAlteracoesCurso($dados){
        $sql = $this->db->prepare("UPDATE `cursos`
                                      SET `capa`=:capa,
                                          `autor`=:autor,
                                          `nome`=:nome,
                                          `descricao`=:descricao,
                                          `tags`=:tags,
                                          `concluido`=1,
                                          `publico`=:publico
                                    WHERE `id`=:idCurso");
        $sql->bindValue(':capa',$dados['capa']);
        $sql->bindValue(':autor',$dados['autor']);
        $sql->bindValue(':nome',$dados['nome']);
        $sql->bindValue(':descricao',$dados['descricao']);
        $sql->bindValue(':tags',$dados['tags']);
        $sql->bindValue(':publico',$dados['privacidade']);
        $sql->bindValue(':idCurso',$dados['idCurso']);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            return false;
        }else{
            return true;
        }

    }

    public function removerCurso($idCurso){
        $sql = $this->db->prepare("UPDATE `cursos` SET `status`=0 WHERE `id`=:idCurso");
        $sql->bindValue(':idCurso',$idCurso);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            return false;
        }else{
            return true;
        }
    }

    public function nomeCurso($idCurso){
        $sql = $this->db->prepare("SELECT `nome` FROM `cursos` WHERE `id`=:idCurso");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs= $sql->fetch();
            return $rs['nome'];
        }
    }

    public function nomeModulo($idModulo){
        $sql = $this->db->prepare("SELECT `modulo` FROM `cursos_modulos` WHERE `id`=:idModulo$idModulo");
        $sql->bindValue(":idModulo$idModulo",$idModulo);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs= $sql->fetch();
            return $rs['modulo'];
        }
    }

    public function nomeAula($idAula){
        $sql = $this->db->prepare("SELECT `nome` FROM `cursos_aulas` WHERE `id`=:idAula");
        $sql->bindValue(":idAula",$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs= $sql->fetch();
            return $rs['nome'];
        }
    }

    public function modulosCurso($idCurso){
        $sql = $this->db->prepare("SELECT * FROM `cursos_modulos` WHERE `idCurso`=:idCurso AND `status`=1  ORDER BY visibilidade DESC,  visibilidade ASC");
        $sql->bindValue(":idCurso",$idCurso);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetchAll();
        }
    }

    public function criarModulo($dados){
        //Calculando a ordem do ultimo cursos
        $sql=$this->db->prepare("SELECT `ordem` FROM `cursos_modulos` WHERE `status`=1 ORDER BY `id` DESC");
        $sql->execute();
        $rs=$sql->fetch();
        $ordem=$rs['ordem']++;
        
        $sql = $this->db->prepare("INSERT INTO `cursos_modulos` 
                                              (`idCurso`,`tipo_modulo`,`modulo`,`descricao`,`ordem`,`visibilidade`,`status`)
                                       VALUES (:idCurso,:tipo,:modulo,:descricao,:ordem,:visibilidade,1)");
        $sql->bindValue(":idCurso",$dados['idCurso']);
        $sql->bindValue(":tipo",$dados['tipo']);
        $sql->bindValue(":modulo",$dados['nome']);
        $sql->bindValue(":descricao",$dados['descricao']);
        $sql->bindValue(":ordem",$ordem);
        $sql->bindValue(":visibilidade",$dados['visibilidade']);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
         }else{
            return $this->db->lastInsertId();
         }
    }

    public function infoModulo($idModulo){
        $sql = $this->db->prepare("SELECT * FROM `cursos_modulos` WHERE `id`=:idModulo");
        $sql->bindValue(":idModulo",$idModulo);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

    public function idCurso_byModulo($idModulo){
        $sql = $this->db->prepare("SELECT `idCurso` FROM `cursos_modulos` WHERE `id`=:idModulo");
        $sql->bindValue(":idModulo",$idModulo);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs=$sql->fetch();
            return $rs['idCurso'];
        }
    }

    public function removerModulo($idModulo){
        $sql = $this->db->prepare("UPDATE `cursos_modulos` SET `status`=0 WHERE `id`=:idModulo");
        $sql->bindValue(':idModulo',$idModulo);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            return false;
        }else{
            return true;
        }
    }

    public function salvarAlteracoesModulo($dados){
        $sql = $this->db->prepare("UPDATE `cursos_modulos`
                                      SET `tipo_modulo`=:tipo,
                                          `modulo`=:nome,
                                          `descricao`=:descricao,
                                          `visibilidade`=:visibilidade
                                    WHERE `id`=:idModulo");
        $sql->bindValue(':tipo',$dados['tipo']);
        $sql->bindValue(':nome',$dados['nome']);
        $sql->bindValue(':descricao',$dados['descricao']);
        $sql->bindValue(':visibilidade',$dados['visibilidade']);
        $sql->bindValue(':idModulo',$dados['idModulo']);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            return false;
        }else{
            return true;
        }
    }

    public function totalAulasModulo($idModulo){
        $sql = $this->db->prepare("SELECT COUNT(id) AS total 
                                     FROM `cursos_aulas` 
                                    WHERE `idModulo`=:idModulo
                                      AND `status`=1
                                 ORDER BY `ordem` ASC");
        $sql->bindValue(":idModulo",$idModulo);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs = $sql->fetch();
            return $rs['total'];
        }
    }

    public function aulasModulo($idModulo){
        $sql = $this->db->prepare("SELECT * 
                                     FROM `cursos_aulas` 
                                    WHERE `idModulo`=:idModulo
                                      AND `status`=1
                                 ORDER BY `ordem` ASC");
        $sql->bindValue(":idModulo",$idModulo);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetchAll();
        }
    }

    public function atualizaOrdem($idAula,$ordem){
        $sql = $this->db->prepare("UPDATE `cursos_aulas`
                                      SET `ordem`=:ordem 
                                    WHERE `id`=:idAula");
        $sql->bindValue(":ordem",$ordem);
        $sql->bindValue(":idAula",$idAula);
        if($sql->execute()===false){
           $erro = $sql->errorInfo();
           echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetchAll();
        }
    }

    
    public function ordemPxAula($idModulo){
        $sql = $this->db->prepare("SELECT `ordem` 
                                     FROM `cursos_aulas` 
                                    WHERE `idModulo`=:idModulo
                                 ORDER BY `ordem` DESC 
                                    LIMIT 1");
        $sql->bindValue(":idModulo",$idModulo);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            $rs = $sql->fetch();
            return $rs['ordem']+1;
        }
    }

    public function dadosProgramacao($idLive){
        $sql = $this->db->prepare("SELECT * 
                                     FROM `live_programacao`
                                    WHERE `idLive`=:idLive");
        $sql->bindValue(':idLive',$idLive);
        if($sql->execute()===false){
            $error = $sql->errorInfo();
            print '<small class="text-danger"><i class="fas fa-times"></i> "'.$error[2].'"</small><br/>';
        }
        return $sql->fetch();
    }

   
    public function criarAula($dados){
        if($dados['faseAtual']==0){//Informacoes
            $sql = $this->db->prepare("INSERT INTO `cursos_aulas` 
                                                 (`idCurso`,`idModulo`,`dataCriacao`,`tipoAula`,`idProfessor`,`tipoConteudo`,`capa`,`nome`,`descricao`,`tags`,`ordem`,`visibilidade`,`status`)
                                          VALUES (:idCurso,:idModulo,now(),:tipoAula,:idProfessor,:tipoConteudo,0,:nome,:descricao,:tags,:ordem,0,1)");
             $sql->bindValue(":idCurso",$dados['idCurso']);
             $sql->bindValue(":idModulo",$dados['idModulo']);
             $sql->bindValue(":tipoAula",'Aula');
             $sql->bindValue(":idProfessor",$dados['professor']);
             $sql->bindValue(":tipoConteudo",$dados['tipoConteudo']);
             $sql->bindValue(":nome",$dados['nome']);
             $sql->bindValue(":descricao",'Sem descricao');
             $sql->bindValue(":tags",$dados['tags']);
             $sql->bindValue(":ordem",$dados['ordem']);
            if($sql->execute()===false){
                $erro = $sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
             }else{
                return $this->db->lastInsertId();
             }
        }
        if($dados['faseAtual']==1){//Conteudo
            $sql = $this->db->prepare("UPDATE `cursos_aulas`
                                          SET `link`=:linkVideo,
                                              `plataforma_video`=:plataforma
                                        WHERE `id`=:idAula");
            $sql->bindValue(":linkVideo",$dados['linkVideo']);
            $sql->bindValue(":plataforma",$dados['plataforma']);
            $sql->bindValue(":idAula",$dados['idAula']);
            if($sql->execute()===false){
               $erro = $sql->errorInfo();
               echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            }else{
                return $dados['idAula'];
            }
        }

        if($dados['faseAtual']==2){//Descricao
            $sql = $this->db->prepare("UPDATE `cursos_aulas`
                                          SET `descricao`=:descricao
                                        WHERE `id`=:idAula");
            $sql->bindValue(":descricao",$dados['texto_editor']);
            $sql->bindValue(":idAula",$dados['idAula']);
            if($sql->execute()===false){
               $erro = $sql->errorInfo();
               echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
            }else{
                return $dados['idAula'];
            }
        }

        if($dados['faseAtual']==3){//agendamento
            $sql = $this->db->prepare("SELECT `id` FROM `cursos_liberacao_aulas` WHERE `idAula`=:idAula");
            $sql->bindValue(":idAula",$dados['idAula']);
            if($sql->execute()===false){
                $erro = $sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
             }else{
                if($sql->rowCount()==0){
                    $sql = $this->db->prepare("INSERT INTO `cursos_liberacao_aulas`
                                                           (`idAula`,`regraLiberacao`,`diasLiberacao`,`dataLiberacao`)
                                                    VALUES (:idAula,:regra,:dias,:dataLiberacao)");
                }else{
                    $sql = $this->db->prepare("UPDATE `cursos_liberacao_aulas`
                                                  SET `regraLiberacao`=:regra,
                                                      `diasLiberacao`=:dias,
                                                      `dataLiberacao`=:dataLiberacao
                                                WHERE `idAula`=:idAula");
                }                
                $sql->bindValue(":regra",$dados['regra']);
                if($dados['regra']=='D'):
                    $sql->bindValue(":dias",$dados['dias']);
                    $sql->bindValue(":dataLiberacao",date('Y-m-d'));
                elseif($dados['regra']=='F'):
                    $sql->bindValue(":dias",0);
                    $sql->bindValue(":dataLiberacao",$dados['dataLiberacao']);
                else:
                    $sql->bindValue(":dias",0);
                    $sql->bindValue(":dataLiberacao",date('Y-m-d'));
                endif;
                $sql->bindValue(":idAula",$dados['idAula']);
                if($sql->execute()===false){
                    $erro = $sql->errorInfo();
                    echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
                }else{
                    return $dados['idAula'];
                }
            }
        }        
        

        if($dados['faseAtual']==4){//confirma
            $sql = $this->db->prepare("UPDATE `cursos_aulas`
                                          SET `idProfessor`=:idProfessor,
                                              `tipoConteudo`=:tipoConteudo,
                                              `nome`=:nome,
                                              `descricao`=:descricao,
                                              `tags`=:tags,
                                              `link`=:linkVideo,
                                              `plataforma_video`=:plataforma
                                        WHERE `id`=:idAula");
            //Informações
            $sql->bindValue(":idProfessor",$dados['professor']);
            $sql->bindValue(":tipoConteudo",$dados['tipoConteudo']);
            $sql->bindValue(":nome",$dados['nome']);
            $sql->bindValue(":tags",$dados['tags']);
            //Conteudo
            $sql->bindValue(":linkVideo",$dados['linkVideo']);
            $sql->bindValue(":plataforma",$dados['plataforma']);
            //Descricao
            $sql->bindValue(":descricao",$dados['texto_editor']);
            //idAula
            $sql->bindValue(":idAula",$dados['idAula']);
            if($sql->execute()===false){
               $erro = $sql->errorInfo();
               echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: Confirmacao"'.$erro[2].'" </small><br/>';
            }else{
                return $dados['idAula'];
            }
        }
    }

    
    public function infoAula($idAula){
        $sql = $this->db->prepare("SELECT * FROM `cursos_aulas` WHERE `id`=:idAula");
        $sql->bindValue(":idAula",$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

    public function salvarNome($idAula,$nome){
        $sql = $this->db->prepare("UPDATE `cursos_aulas` SET `nome`=:nome WHERE `id`=:idAula");
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':idAula',$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }
    
    public function salvarNovoVideo($idAula,$idVideo,$plataforma){
        $sql = $this->db->prepare("UPDATE `cursos_aulas`
                                      SET `link`=:idVideo,
                                          `plataforma_video`=:plataforma
                                    WHERE `id`=:idAula");   
        $sql->bindValue(":idVideo",$idVideo);
        $sql->bindValue(":plataforma",$plataforma);
        $sql->bindValue(":idAula",$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $idAula;
        }
    }


    public function agendamentoAula($idAula){
        $sql = $this->db->prepare("SELECT * FROM `cursos_liberacao_aulas` WHERE `idAula`=:idAula");
        $sql->bindValue(":idAula",$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

    public function salvarRegraAula($idAula,$regra,$dias,$dataLiberacao){
        $sql = $this->db->prepare("UPDATE `cursos_liberacao_aulas`
                                      SET `regraLiberacao`=:regra,
                                          `diasLiberacao`=:dias,
                                          `dataLiberacao`=:dataLiberacao
                                    WHERE `idAula`=:idAula");   
        $sql->bindValue(":regra",$regra);
        if($regra=='D'):
            $sql->bindValue(":dias",$dias);
            $sql->bindValue(":dataLiberacao",date('Y-m-d'));
        elseif($regra=='F'):
            $sql->bindValue(":dias",0);
            $sql->bindValue(":dataLiberacao",$dataLiberacao);
        else:
            $sql->bindValue(":dias",0);
            $sql->bindValue(":dataLiberacao",date('Y-m-d'));
        endif;
        $sql->bindValue(":idAula",$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $idAula;
        }
    }


    public function salvaDescricaoAula($idAula,$descricao){
        $sql = $this->db->prepare("UPDATE `cursos_aulas` SET `descricao`=:descricao WHERE `id`=:idAula");
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':idAula',$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

    public function setVisibilidadeAula($idAula,$visibilidade){
        $sql = $this->db->prepare("UPDATE `cursos_aulas` SET `visibilidade`=:visibilidade WHERE `id`=:idAula");
        $sql->bindValue(':visibilidade',$visibilidade);
        $sql->bindValue(':idAula',$idAula);
        if($sql->execute()===false){
            $erro = $sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro de dados: "'.$erro[2].'" </small><br/>';
        }else{
            return $sql->fetch();
        }
    }

   

}