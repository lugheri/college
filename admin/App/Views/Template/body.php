<div class="body">
    <?php require 'nav.php';
    $modulo = $this->tituloModulo($moduloAtivo);
    $tela = $this->infoTela($telaAtual);  
   
    ?>

    <div class="container-fluid conteudo">
        <!-- start page title -->
        <?php if(!empty($tela['nome'])):?>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Administração</a></li>
                                
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $modulo?></a></li>
                                <li class="breadcrumb-item active"><?= $tela['nome']?></li>
                            </ol>
                        </div>
                        <p class="h4 page-title">
                            <?= $tela['nome']?><br/>
                            <small><?= $tela['descricao']?></small>
                        </p>
                        
                    </div>
                </div>
            </div>   
            <br/> 
        <?php endif;?> 
        <!-- end page title --> 
        <div id='conteudo'>
            <?php $this->loadViewInTemplate($viewName,$viewData);?>  
        </div>
    </div>
</div>
<?php require 'modal.php';