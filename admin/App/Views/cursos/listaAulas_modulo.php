<div class="row align-items-center">
    <div class="col">
        <p class="h4"><?= count($aulasModulo).' Aula(s)'?></p>
    </div>
    <div class="col text-right">
        <?php $idModulo = base64_encode($infoModulo['id'].':modulo');?>
        <a class="btn btn-danger btn-create" href="<?= BASE_URL.'cursos/criarAula/'.$idModulo?>">
            <i class="fas fa-plus"></i> Criar nova aula
        </a>
    </div>
</div>
<br/>
<div class="row align-items-center">
    <?php if(empty($aulasModulo)):?>
        <div class="col-10 offset-1 text-center">
            <i class="h1 far fa-folder-open"></i>
            <p class="h4">Nenhuma aula cadastrada neste módulo!</p>
            <a class="btn btn-outline-danger btn-create" href="<?= BASE_URL.'cursos/criarAula/'.$idModulo?>">
                <i class="fas fa-plus"></i> Criar nova aula
            </a>
    </div>
        </div>
    <?php else:?>
        <div class="col-12">
            <div class='card' style="background:#ececec">
                <div class='card-body'>
                    <style type="text/css"> .dragHelper_<?=$infoModulo['id']?>{border:2px dashed #ccc;min-height:100px;margin:4px;}</style>
                    <div class="recebeDrag containerDrop_<?= $infoModulo['id']?>" id="recebeDrag_<?= $infoModulo['id'] ?>">
                    <?php 
                        $i=1;
                        foreach($aulasModulo as $am):?>

                               
                            <div class='card itemDrag' id='<?= $am['id']?>'>
  			                    <div class='card-body' style="padding:0px">
                                    <div class="row align-items-center no-gutters" id='<?= $am['id']?>'>
                                        <?php if(!empty($am['capa'])):?>
                                            <div class="col-md-3">
                                                <img src="<?= $this->getImageBiblioteca($am['capa'])?>" class="card-img" alt="...">  
                                            </div>
                                        <?php endif;?>
                                        <div class="col">
                                            <div class="card-body" style="padding:1rem">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="tituloAula"><i class="fas fa-chalkboard"></i> <?= $am['nome']?></p>
                                                        <p class="descricaoAula d-inline-block text-truncate" style="max-width: 450px;">
                                                            <?= $am['descricao']?> 
                                                        </p>
                                                        <br>
                                                        <small class="infoAula">
                                                            <b>Cod:</b> <?= $am['id']?> 
                                                            <i class="fas fa-sort-numeric-down"></i> <b style="margin-left:20px">Ordem:</b> <?=$i.'º '?> 
                                                            <i class="fas fa-tags" aria-hidden="true"></i> <b style="margin-left:20px">Tags: </b>     
                                                            <?php if(empty($am['tags'])):?>
                                                                <div class="btn btn-sm btn-outline-secondary" style="color:#f00;font-size: .8rem;">
                                                                    Sem Tags
                                                                </div>
                                                            <?php else:
                                                                $tags = explode(';',$am['tags']);
                                                                foreach($tags as $t):?>
                                                                    <div class="btn btn-sm btn-outline-secondary" style="color:#f00;font-size: .8rem;">
                                                                        <?= $t?>
                                                                    </div>
                                                                <?php endforeach;
                                                            endif;?> 
                                                        </small>
                                                    </div>
                                                    <div class="col-5 text-right">
                                                        <div class="row">
                                                            <div class="col">
                                                                <?php 
                                                                //TIPO AULA
                                                                if($am['tipoAula']=='Aula'):?>
                                                                    <div class="btn btn-outline-danger btn-sm" title="Aula">
                                                                        <i class="fas fa-chalkboard-teacher"></i>
                                                                    </div>    
                                                                <?php elseif($am['tipoAula']=='Prova'):?>
                                                                    <div class="btn btn-outline-danger btn-sm" title="Prova">
                                                                        <i class="fas fa-tasks"></i></p>
                                                                    </div> 
                                                                <?php elseif($am['tipoAula']=='Quiz'):?>
                                                                    <div class="btn btn-outline-danger btn-sm" title="Quiz">
                                                                        <i class="fas fa-question-circle"></i>
                                                                    </div> 
                                                                <?php endif;

                                                                //TIPO CONTEUDO
                                                                if($am['tipoConteudo']=='video'):?>
                                                                    <div class="btn btn-outline-primary btn-sm" title="Vídeo">
                                                                        <i class="fas fa-video"></i>
                                                                    </div>  
                                                                <?php elseif($am['tipoConteudo']=='LIVE'):
                                                                    $dadosLive=$this->dadosProgramacao($am['id']);
                                                                    if(empty($dadosLive)):?>
                                                                        <div class="btn btn-outline-secondary btn-sm" title="Live não programada">
                                                                            <i class="fas fa-broadcast-tower"></i>
                                                                        </div> 
                                                                    <?php elseif(date('Y-m-d H:i:s')>date('Y-m-d H:i:s',strtotime($dadosLive['data']))):?>
                                                                        <div class="btn btn-outline-primary btn-sm" title="Live transmitida dia <?= date('d/m/Y H:i:s',strtotime($dadosLive['data'])) ?>">
                                                                            <i class="fas fa-broadcast-tower"></i>
                                                                        </div> 
                                                                    <?php else: ?>
                                                                        <div class="btn btn-outline-primary btn-sm" title="Live agendada para <?= date('d/m/Y H:i:s',strtotime($dadosLive['data'])) ?>">
                                                                            <i class="fas fa-broadcast-tower"></i> Live: <?= date('d/m/Y H:i:s',strtotime($dadosLive['data'])) ?>
                                                                        </div>   
                                                                    <?php endif;?>
                                                                <?php elseif($am['tipoConteudo']=='podcast'):?>
                                                                    <div class="btn btn-outline-primary btn-sm" title="Podcast">
                                                                        <i class="fas fa-microphone-alt"></i>
                                                                    </div> 
                                                                <?php elseif($am['tipoConteudo']=='texto'):?>
                                                                    <div class="btn btn-outline-primary btn-sm" title="Texto">
                                                                        <i class="fas fa-align-justify"></i>
                                                                    </div> 
                                                                <?php endif;
                                                                                
                                                                //VISIBILIDADE
                                                                if($am['visibilidade']):?>
                                                                    <div class="btn btn-outline-info btn-sm" title="Pública">
                                                                        <i class="fas fa-bullhorn"></i>
                                                                    </div>    
                                                                <?php else:?>
                                                                    <div class="btn btn-secondary btn-sm" title="Privada">
                                                                        <i class="fas fa-eye-slash"></i>
                                                                    </div> 
                                                                <?php endif;?>  
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <?php $linkAula = base64_encode($am['id'].':aula')?>
                                                                <a href="<?= BASE_URL.'cursos/abrirAula/'.$linkAula?>" class="btn btn-info btn-sm" style="margin-top:5px">
                                                                    <i class="fas fa-edit" aria-hidden="true"></i> Editar Aula
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                    ++$i;
                    endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
</div>

<script src="<?= PUBLIC_PATH?>js/jquery-3.4.1.min.js"></script>
<script src="<?= PUBLIC_PATH?>js/jquery-ui.min.js"></script>

<script type="text/javascript">
	$(function(){
	 	// configura drag and drop
	    $(".containerDrop_<?= $infoModulo['id']?>").sortable({
	        connectWith: ['.containerDrop_<?= $infoModulo['id'] ?>'],
	        placeholder: 'dragHelper_<?= $infoModulo['id']?>',
	        scroll: true,
	        revert: true,
	        stop: function(e,ui) {
		        reordenaAula();
		 	}
		});
	}); 
						    
	// salva cookie
	var reordenaAula = function() {
	var ordem = $('#recebeDrag_<?= $infoModulo['id'] ?>').sortable('toArray');	
	var ordemModulo = '<?= $infoModulo['ordem'] ?>';
	var idCurso = '<?= $infoModulo['idCurso'] ?>';
	var idModulo = '<?= $infoModulo['id'] ?>';
    console.log(ordem)
        $.ajax({  
            type: "POST",
            data: {ordem,ordemModulo,idCurso,idModulo} ,
            url: "<?= BASE_URL.'cursos/reordenaAula'?>",
            dataType: "html",
            success: function(result){
                $('#reordena').html('');
                $('#reordena').append(result);
            },
            beforeSend: function(){
            },
            complete: function(msg){
            }
        });				      
    };
</script>