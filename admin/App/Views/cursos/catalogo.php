<div class="row">
    <div class="col">
        <a class="btn btn-create btn-danger" href="<?= BASE_URL?>cursos/criarCurso">
            <i class="fas fa-plus"></i> Criar Curso
        </a>
    </div>
    <div class="col text-right">
       
        <?php if(empty($privacidade)){ $privacidade='todos';}?>
        <?php if(empty($modoView)){ $modoView='card';}?>
        <?php if($privacidade=='todos'){
              $cursos = $this->listarCursos(false);
              $title=count($cursos).' Curso(s) cadastrado(s).';
        }else if($privacidade=='publico'){
            $cursos = $this->listarCursos(1);
            $title=count($cursos).' Curso(s) publicado(s).';
        }else if($privacidade=='privado'){
            $cursos = $this->listarCursos(0);
            $title=count($cursos).' Curso(s) privado(s).';
        }?>

        <div <?php if($privacidade=='todos'){ echo 'class="btn btn-sm btn-primary"';}else{ echo 'class="btn btn-sm btn-light"';}?>
            onClick="filtraCatalogo('todos','<?= $modoView?>')">
            Todos
        </div>

        <div class="btn-group" role="group" aria-label="filtro_catalogo">
            <div <?php if($privacidade=='publico'){ echo 'class="btn btn-sm btn-primary"';}else{ echo 'class="btn btn-sm btn-light"';}?>
                onClick="filtraCatalogo('publico','<?= $modoView?>')">
                Públicos
            </div>
            <div <?php if($privacidade=='privado'){ echo 'class="btn btn-sm btn-primary"';}else{ echo 'class="btn btn-sm btn-light"';}?>
                onClick="filtraCatalogo('privado','<?= $modoView?>')">
                Privados
            </div>
        </div>

        <div class="btn-group" role="group" aria-label="modoView_catalogo">
            <div <?php if($modoView=='card'){ echo 'class="btn btn-sm btn-primary"';}else{ echo 'class="btn btn-sm btn-light"';}?>
                onClick="filtraCatalogo('<?= $privacidade?>','card')">
                <i class="fas fa-th"></i>
            </div>
            <div <?php if($modoView=='list'){ echo 'class="btn btn-sm btn-primary"';}else{ echo 'class="btn btn-sm btn-light"';}?>
                onClick="filtraCatalogo('<?= $privacidade?>','list')">
                <i class="fas fa-th-list"></i>
            </div>
        </div>

        <a class="btn btn-sm btn-outline-danger" title="Lixeira" href="<?= BASE_URL?>cursos/lixeira">
            <i class="fas fa-trash-alt"></i>
        </a>


    </div>
</div>
<br/>
<div class="row">
    <div class="col">
        <p class='title'><?= $title ?></p>
    </div>
</div>
<br/>
<div class="row align-items-center">     
    <?php    
  
    if($modoView=='card'):
        foreach($cursos as $c):
            $linkCurso = base64_encode($c['id'].':curso');?>
            <div class="col-4">
                <div class="card">

                    <?php 
                    if($c['capa']):?>
                        <img src="<?= $this->getImageBiblioteca($c['capa'])?>" class="card-img-top" alt="Capa do curso">
                    <?php else:?>
                        <div class="card-header text-center" style="padding:100px 0px; background:#ccc">
                            <i class="h1 fas fa-camera"></i>
                            <p class="h5">Sem Capa</p>
                        </div>
                    <?php endif;?>
                    
                    <div class="card-body card-curso">
                        <?php 
                        if($c['publico']):?>
                            <div class="privacidadeCurso publico" >
                                <i class="fas fa-bullhorn"></i> Públicado
                            </div>  
                        <?php else:?>
                            <div class="privacidadeCurso privado">
                                <i class="fas fa-lock"></i> Privado
                            </div>  
                        <?php endif;?>

                        <div class="dadosCurso">
                            <h5 class="card-title">
                                <?= $c['nome'];
                                if(!$c['concluido']):?>
                                  <i class="fas fa-exclamation-circle text-danger" title="Curso pode estar incompleto!"></i>
                                <?php endif;?>
                            </h5>                    
                            <small class="card-description"><?= $this->resumeText($c['descricao'],25)?></small>
                        </div>
                        <div class="descCurso">
                            <p class="infoCurso">
                                <b>Cód.:</b> <?= $c['id']?> |
                                <b title="Total de alunos"><i class="fas fa-users"></i></b> <?= $this->totalAlunos_curso($c['id'])?> |
                                <b title="Avaliação Média"><i class="fas fa-star"></i></b> <?= $this->avaliacao_curso($c['id'])?>
                                <br/>
                                <p title="Tags"><i class="fas fa-tags"></i> <?= $c['tags']?></p>  
                            </p>
                            
                            <a class="btn btn-create btn-outline-danger btn-block" href="<?= BASE_URL .'cursos/editar/'.$linkCurso?>">
                                <i class="fas fa-folder-open"></i> Abrir Curso
                            </a>
                        </div>  
                    </div>
                </div>            
            </div>
        <?php endforeach;
    else://Modo de lista
        foreach($cursos as $c):
            $linkCurso = base64_encode($c['id'].':curso');?>
            <div class="col-12">
                <div class="card"> 
                    <div class="row no-gutters align-items-center">  
                        <?php if($c['capa']):?>
                            <div class="col-md-2"> 
                                <img src="<?= $this->getImageBiblioteca($c['capa'])?>" class="card-img-top" alt="Capa do curso">
                            </div>
                        <?php else:?>
                            <div class="col-md-2 text-center" style="border-right:1px solid #ccc"> 
                                    <i class="h1 fas fa-camera"></i>
                                    <p class="h5">Sem Capa</p>
                            </div>
                        <?php endif;?>
                        
                        <div class="col">
                            <div class="card-body fcard-curso">
                                <?php if($c['publico']):?>
                                    <div class="privacidadeCurso publico" >
                                        <i class="fas fa-bullhorn"></i> Públicado
                                    </div>  
                                <?php else:?>
                                    <div class="privacidadeCurso privado">
                                        <i class="fas fa-lock"></i> Privado
                                    </div>  
                                <?php endif;?>

                                <div class="dadosCurso">
                                    <h5 class="card-title">
                                        <?= $c['nome'];
                                        if(!$c['concluido']):?>
                                          <i class="fas fa-exclamation-circle text-danger" title="Curso pode estar incompleto!"></i>
                                        <?php endif;?>    
                                    </h5>                    
                                    <small class="card-description"><?= $this->resumeText($c['descricao'],25)?></small>
                                </div>
                                <div class="descCurso">
                                    <div class="row">
                                        <div class="col">
                                            <p class="infoCurso">
                                                <b>Cód.:</b> <?= $c['id']?> |
                                                <b title="Total de alunos"><i class="fas fa-users"></i></b> <?= $this->totalAlunos_curso($c['id'])?> |
                                                <b title="Avaliação Média"><i class="fas fa-star"></i></b> <?= $this->avaliacao_curso($c['id'])?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p title="Tags"><i class="fas fa-tags"></i> <?= $c['tags']?></p>
                                        </div>
                                        <div class="col-4 text-right">
                                            <a class="btn btn-create btn-outline-danger" href="<?= BASE_URL .'cursos/editar/'.$linkCurso?>">
                                                <i class="fas fa-folder-open"></i> Abrir Curso
                                            </a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>            
            </div>
        <?php endforeach;
    endif;?>
</div>