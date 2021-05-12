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
                <b>Nome da Aula: </b><?= $infoAula['nome']?><br/>
                <b>Curso: </b><?= $this->nomeCurso($infoAula['idCurso'])?></p>
                <b>Módulo: </b><?= $this->nomeModulo($infoAula['idModulo'])?></p>
            </div>
            <div class="col text-right">
                <?php $linkModulo = base64_encode($infoAula['idModulo'].':modulo')?>
                <a href="<?= BASE_URL.'cursos/modulo/'.$linkModulo?>" class="btn btn-outline-secondary">
                    <i class="fas fa-reply"></i> Voltar
                </a>
                <div class="btn btn-info" onClick="editarAula('<?= $infoAula['id']?>')">
                    <i class="fas fa-edit"></i> Editar informações
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
VIDEO

Edição do video
Adição de Materiais
Inclusao de links
Edição avançada de texto
Agendamento de liberacao da aula

PROVA
edicao das informacoes
tempo de prova
tipo de nota
Agendamento de liberacao da prova

live
Live Director