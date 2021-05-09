<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Cursos</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Catálogo</a></li>
                    <li class="breadcrumb-item active">Página do Curso</li>
                </ol>
            </div>
            <p class="h4 page-title">
                Página do Curso
            </p>
         </div>
   </div>
</div> 

<div class="row align-items-center">
    <div class="col-2 text-center">
        <?php if($infoCurso['capa']):?>
            <img src="<?= $this->getImageBiblioteca($infoCurso['capa'])?>" class="card-img-top" alt="Capa do curso">
        <?php else:?>
            <i class="fas fa-camera h1 text-muted"></i>
            <p class="h4 text-secondary">Sem Capa</p>
        <?php endif;?>
    </div>
    <div class="col" style="border-left:1px solid #ccc">
        <div class="row">
            <div class="col">
                <p>
                <b>Cód.: </b><?= $infoCurso['id']?><br/>
                <b>Título: </b><?= $infoCurso['nome']?><br/>
                <small><b>Descrição: </b><?= $infoCurso['descricao']?></small><br/>
                <b>Por: </b><?= $infoCurso['autor']?></p>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col">
                <b>Tags: </b><?= $infoCurso['tags']?>
                <?php $privacidade = ($infoCurso['publico']==1) ? "Publicado" : "Privado";?>
                <b>Privacidade:</b> <?= $privacidade?>
                <?php if(empty($infoCurso['concluido'])):?>
                    <br/><b class="text-danger"><i class="fas fa-exclamation"></i> Confirme a configuração deste curso</b>
                <?php endif;?>
                </p>
            </div>
            <div class="col text-right">
                <a href="<?= BASE_URL.'cursos/catalogo'?>" class="btn btn-outline-secondary">
                    <i class="fas fa-reply"></i> Voltar
                </a>
                <div class="btn btn-outline-info" onClick="estatisticasCurso('<?= $infoCurso['id']?>')">
                    <i class="far fa-chart-bar"></i> Estatísticas
                </div>
                <div class="btn btn-info" onClick="editarInfoCurso('<?= $infoCurso['id']?>')">
                    <i class="fas fa-edit"></i> Editar informações
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-body">
        <p><?= count($modulosCurso).' Módulo(s)'?></p>
        <div class="row align-items-center">
            <div class="col-2">
                <div class="card card-item bg-danger text-light" onClick="novoModulo('<?= $infoCurso['id']?>','selecionar')">
                    <div class="card-body" style="margin-bottom:0px">
                        <i class="fas fa-folder-plus"></i>
                        <p>Criar novo módulo</p>
                    </div>
                </div>
            </div>

            <?php foreach($modulosCurso as $mc):?>
                <div class="col-2">
                    <?php if($mc['visibilidade']):?>
                        <div class="card card-item">
                    <?php else:?>
                        <div class="card card-item" style="background:#ccc;opacity:.7" >
                            <div class="" style="position:absolute; color:#777; top:5px; right:5px; text-align:center">
                                <i class="fas fa-lock" style="font-size:1.5rem"></i><br/>
                                <b class="h6">Privado</b>
                            </div>
                    <?php endif;?>

                    <div class="card-body ">
                        <?php if($mc['modulo']):?>
                                <i class="fas fa-folder text-danger"></i>
                            <?php endif;?>
                            <p title="<?= $mc['modulo']?>"><?= $this->resumeText($mc['modulo'],3)?></p>
                            <small title="<?= $mc['descricao']?>">
                                <?php if(empty($mc['descricao'])){
                                    echo 'Sem Descrição';
                                }else{ 
                                    echo $this->resumeText($mc['descricao'],3);
                                }?>
                            </small>
                            <?php 
                            $linkModulo= base64_encode($mc['id'].':modulo');?>
                            <a href="<?= BASE_URL."cursos/modulo/".$linkModulo ?>"
                               class="btn btn-create btn-block btn-outline-danger btn-sm">
                                Ver Aulas
                            </a>
                        </div>    
                        
                    </div>
                </div>
            <?php endforeach;?>
        </div>

    </div>
</div>