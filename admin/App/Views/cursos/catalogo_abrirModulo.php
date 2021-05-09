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

<div class="row align-items-end">
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
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col">
                <p><?= count($aulasModulo).' Aula(s)'?></p>
            </div>
            <div class="col text-right">
                <div class="btn btn-danger btn-create" onClick="novaAula('<?= $infoModulo['id']?>','selecionar')">
                    <i class="fas fa-plus"></i> Criar nova aula
                </div>
            </div>
        </div>
       
        <div class="row align-items-center">
            <?php foreach($aulasModulo as $am):?>
                dados da aula <?= $am['nome']?> <br/>
            <?php endforeach;?>
        </div>

    </div>
</div>