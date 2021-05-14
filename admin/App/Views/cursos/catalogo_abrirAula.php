<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Página do Curso</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Página do Módulo</a></li>
                    <li class="breadcrumb-item active">Página da Aula</li>
                </ol>
            </div>
            <p class="h4 page-title">
                Página da Aula
            </p>
         </div>
   </div>
</div> 

<div class="row align-items-center">
    <div class="col-2 text-center">
        <?php if($infoAula['tipoConteudo']=="video"):?>
            <i class="h1 text-danger fas fa-chalkboard-teacher"></i>
            <p class="h5">Aula</p>
        <?php elseif($infoAula['tipoConteudo']=="Prova"):?>
            <i class="h1 text-danger far fa-question-circle"></i>
            <p class="h5">Prova/Quiz</p>
        <?php elseif($infoAula['tipoConteudo']=="LIVE"):?>
            <i class="h1 text-danger fas fa-broadcast-tower"></i>
            <p class="h5">Live</p>
        <?php endif;?>
    </div>
    <div class="col" style="border-left:1px solid #ccc">
        
        <div class="row align-items-end">
            <div class="col">
                <p><b>Cód.: </b><?= $infoAula['id']?><br/>
                <b>Curso: </b><?= $this->nomeCurso($infoAula['idCurso'])?> <i class="fas fa-chevron-right"></i> <b>Módulo: </b><?= $this->nomeModulo($infoAula['idModulo'])?></p>
            </div>
            <div class="col text-right">
                <?php $linkModulo = base64_encode($infoAula['idModulo'].':modulo')?>
                <a href="<?= BASE_URL.'cursos/modulo/'.$linkModulo?>" class="btn btn-outline-secondary">
                    <i class="fas fa-reply"></i> Voltar
                </a>               
            </div>
        </div>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col">
                <label for="nome">Nome da Aula</label>
                <input type="text" name="nome" id="nome" value="<?= $infoAula['nome']?>" class="form-control"/>
            </div>
            <div class="col-2 text-right">
            <br/>
                <div class="btn btn-success btn-block" onClick="salvarNome('<?= $infoAula['id']?>')">
                    <i class="fas fa-save"></i> Salvar
                </div>
            </div>
        </div>
        <div id='salvaNome'></div>
    </div>
</div>

<?php if($infoAula['tipoConteudo']=="video"):?>
    <div class="row ">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class='row align-items-center'>
                        <div class='col-8'>
                            <?php
                            $plataforma=$infoAula['plataforma_video'];
                            $idVideo=$infoAula['link'];
                            if($plataforma=='youtube'):?>
                                <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $idVideo?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php endif;		

                            if($plataforma=='vimeo'):?>
                                <iframe src="https://player.vimeo.com/video/<?= $idVideo?>?color=ff9933&title=0&byline=0&portrait=0&badge=0" width="100%" height="300" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            <?php endif;?>
                        </div>
                        <div class="col-4">
                            <?php if($plataforma=='youtube'):?>
                                <p class="h2 text-danger"><i class="fab fa-youtube"></i> YouTube</p>
                                <?php 
                                $linkCompleto = 'https://www.youtube.com/watch?v='.$idVideo;
                            endif;
                            
                            if($plataforma=='vimeo'):?>
                                <p class="h2 text-info"><i class="fab fa-vimeo"></i> Vimeo</p>
                                <?php
                                $linkCompleto = 'https://player.vimeo.com/video/'.$idVideo;
                            endif;?>
                            <p class='h5 text-secondary'><b>Id do Vídeo:</b> <?= $idVideo ?></p>
                            <p class='h6 text-secondary'>
                                <b>Link do Vídeo: </b><a href="<?= $linkCompleto?>" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Acessar</a>
                            </p><hr/>
                            <div class="btn btn-outline-secondary btn-sm btn-block btn-create" onClick="alterarVideo('<?= $infoAula['id']?>')">
                                <i class="fas fa-video"></i> Alterar Vídeo
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-calendar-check"></i> Regra de liberação da aula
                            <?php if($agendamentoAula['regraLiberacao']=='L'):?>
                                <div class="card bg-success text-light text-center">
                                    <div class="card-body">
                                        <b>L -  Liberação Imediata</b><br/>
                                        <small>A aula estará disponível para o aluno assim que ele acessa-la</small>
                                    </div>
                                </div>
                            <?php elseif($agendamentoAula['regraLiberacao']=='D'):?>
                                <div class="card bg-warning text-dark text-center">
                                    <div class="card-body">
                                        <b>D -  <?= $agendamentoAula['diasLiberacao']?> Dias após a compra</b><br/>
                                        <small>A aula será liberada <b><?= $agendamentoAula['diasLiberacao']?></b> após a data de compra</small>
                                    </div>
                                </div>
                            <?php elseif($agendamentoAula['regraLiberacao']=='F'):?>
                                <div class="card bg-danger text-light text-center">
                                    <div class="card-body">
                                        <b>F - Data fixada</b><br/>
                                        <small>A aula estará disponível apenas após <b><?= date('d/m/Y', strtotime($agendamentoAula['dataLiberacao']))?></b>!</small>
                                    </div>
                                </div>
                            <?php endif;?>
                            <div class="btn btn-outline-info btn-block btn-create btn-sm" onClick="alterarRegraAula('<?= $infoAula['id']?>')">
                                <i class="far fa-calendar"></i> Alterar regra de liberação
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-paperclip"></i> Anexar Materiais
                            <div class="btn btn-sm btn-create btn-block btn-outline-info">
                                <i class="fas fa-plus"></i> Anexar Material
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="descricao"></div>
        </div>
        <div class="col">
            <!--editor-->
            <?php $editor_content=$infoAula['descricao'];?>
            <?php require 'App/Views/editor/index.php'?>
            <!--editor-->
            <br/>
            <div class="row">
                <div class="col text-center">
                    <div class="btn btn-sm btn-success" onClick="salvarDescricao('<?= $infoAula['id']?>')">
                        <i class="fas fa-save"></i> Salvar Descrição
                    </div>
                </div>
            </div>                   
        </div>
        
            
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id='visibilidadeAula'>
                            <i class="fas fa-low-vision"></i> Visibilidade da aula
                            <div class="btn-group btn-block">
                                <?php if($infoAula['visibilidade']==1):?>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-eye"></i> Publicada
                                    </button>
                                <?php else:?>
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-eye-slash"></i> Privada
                                    </button>
                                <?php endif;?>                           
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onClick="setVisibilidadeAula('<?= $infoAula['id']?>',1)"><i class="far fa-eye"></i> Pública</a>
                                    <a class="dropdown-item" href="#" onClick="setVisibilidadeAula('<?= $infoAula['id']?>',0)"><i class="far fa-eye-slash"></i> Privada</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php elseif($infoAula['tipoConteudo']=="Prova"):?>
    PROVA
    edicao das informacoes
    tempo de prova
    tipo de nota
    Agendamento de liberacao da prova
<?php elseif($infoAula['tipoConteudo']=="LIVE"):?>
    live
    Live Director
<?php endif;?>




