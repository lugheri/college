<div class="modal-content">
    <div class="modal-body" style="background:#f1f1f1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"><i class="far fa-chart-bar"></i>  Estatísticas do curso</p>
        <br/>
        <p  class="h3"> 
            <?php if($infoCurso['capa']):?>
                <span class="account-user-avatar"> 
                    <img src="<?= $this->getImageBiblioteca($infoCurso['capa'])?>" alt="capa-curso" class="rounded-circle" style="width:35px; height:35px">
                </span>
            <?php else:?>
                <i class="fas fa-chalkboard-teacher"></i> 
            <?php endif;
            echo $infoCurso['nome']?></p>        
        <small>
            <b>Criado em: </b><?= date('d/m/Y H:i', strtotime($infoCurso['dataCriacao']))?> 
            <b style="margin-left:10px">Por: </b><?= $infoCurso['autor']?> 
            <?php $privacidade = ($infoCurso['publico'])?"Públicado":"Privado";?>
            <b style="margin-left:10px">Privacidade: </b><?= $privacidade?> 
        </small>
        
        <div class="row align-items-center">
            <div class="col-4">
                <div class="card" style="background:none;box-shadow:none">
                    <div class="card-body" >
                        <?php if($media=="Não Avaliado"):?>
                            <span style="font-size:2rem"><?= $media?></span><br/>
                        <?php else:?>
                            <span style="font-size:3.5rem"><?= $media?></span><br/>
                        <?php
                        endif;                                 
                        for($i=1;$i<=5;++$i):
                            if($media>=$i):
                                echo '<i class="fas fa-star text-warning"></i>';
                            else:   
                                $v=$i-.5;
                                if($media >= $v):
                                    echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                else:
                                    echo '<i class="far fa-star text-muted"></i>';
                                endif;
                            endif;                                   
                        endfor;
                        ?>
                        <br/>
                        <small><b>Avaliação do Curso</b></small>
                    </div>
                </div> 
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?php $media=round($melhorAula['media']);?>
                                <span style="float:right">
                                    <?php                                 
                                    for($i=1;$i<=5;++$i):
                                        if($media>=$i):
                                            echo '<i class="fas fa-star text-warning"></i>';
                                        else:   
                                            $v=$i-.5;
                                            if($media >= $v):
                                                echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                            else:
                                                echo '<i class="far fa-star text-muted"></i>';
                                            endif;
                                        endif;                                   
                                    endfor;
                                    ?>  
                                </span>
                                <p style="margin:0px;font-size:1.5rem;">
                                    <?= $media?>
                                </p>
                                <b style="font-size:.8rem; margin:0px"><?= $this->nomeAula($melhorAula['idAula'])?></b><br/>
                                <small>Aula melhor avaliada</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?php $media=round($melhorProfessor['media']);?>
                                <span style="float:right">
                                    <?php                                 
                                    for($i=1;$i<=5;++$i):
                                        if($media>=$i):
                                            echo '<i class="fas fa-star text-warning"></i>';
                                        else:   
                                            $v=$i-.5;
                                            if($media >= $v):
                                                echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                            else:
                                                echo '<i class="far fa-star text-muted"></i>';
                                            endif;
                                        endif;                                   
                                    endfor;
                                    ?>  
                                </span>
                                <p style="margin:0px;font-size:1.5rem;">
                                    <?= $media?>
                                </p>
                                <b style="font-size:.8rem; margin:0px"><?= $this->nomeProfessor($melhorProfessor['idProfessor'])?></b><br/>
                                <small>Professor(a) melhor avaliado(a)</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p style="margin:0px;font-size:1.5rem;">
                                    <?= $qtdAvaliacoes_porAluno?> aluno(s)
                                </p>
                                <small>Qtd de alunos que avaliaram o curso</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p style="margin:0px;font-size:1.5rem;">
                                    <?= $qtdAvaliacoes?> avaliações
                                </p>
                                <small>Qtd total de avaliações do curso</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p style="margin:0px;font-size:1.5rem;">
                            <?= $alunosCurso?> aluno(s)
                        </p>
                        <small>Total de alunos ativos no curso</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p style="margin:0px;font-size:1.5rem;">
                            <?= $professoresCurso?> professor(es)
                        </p>
                        <small>Total de professores do curso</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p style="margin:0px;font-size:1.5rem;">
                            <?= $modulosCurso?> módulo(s)
                        </p>
                        <small>Total de módulos do curso</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p style="margin:0px;font-size:1.5rem;">
                            <?= $aulasCurso?> aula(s)
                        </p>
                        <small>Total de aulas do curso</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>


