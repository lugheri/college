<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Catálogo</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Página do Curso</a></li>
                    <li class="breadcrumb-item active">Página do Módulo</li>
                </ol>
            </div>
            <p class="h4 page-title">
                Página do Módulo
            </p>
         </div>
   </div>
</div> 

<div class="row align-items-center">
    <div class="col-2 text-center">
        <?php if($infoModulo['tipo_modulo']=="Módulo"):?>
            <i class="h1 fas fa-folder"></i>
            <p class="h5">Módulo</p>
        <?php else:?>
            <i class="h1 fas fa-gift"></i>
            <p class="h5">Bônus</p>
        <?php endif;?>
    </div>
    <div class="col" style="border-left:1px solid #ccc">
        
        <div class="row align-items-end">
            <div class="col">
                <p><b>Cód.: </b><?= $infoModulo['id']?><br/>
                <b>Módulo: </b><?= $infoModulo['modulo']?><br/>
                <b>Descrição: </b><?= $infoModulo['descricao']?></small><br/>
                <b>Curso: </b><?= $this->nomeCurso($infoModulo['idCurso'])?></p>
            </div>
            <div class="col text-right">
                <?php $linkCurso = base64_encode($infoModulo['idCurso'].':curso')?>
                <a href="<?= BASE_URL.'cursos/editar/'.$linkCurso?>" class="btn btn-outline-secondary">
                    <i class="fas fa-reply"></i> Voltar
                </a>
                <div class="btn btn-info" onClick="editarModulo('<?= $infoModulo['id']?>')">
                    <i class="fas fa-edit"></i> Editar informações
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-body" id='reordena'>
        <?php require 'listaAulas_modulo.php'?>
    </div>
</div>