<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Página do Curso</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Página do Módulo</a></li>
                    <li class="breadcrumb-item active">Criar Aula</li>
                </ol>
            </div>
            <p class="h4 page-title">
                Criar aula<br/>
                <small>Cadastre uma nova aula!</small>
            </p>
         </div>
   </div>
</div>   

<div class="card">
    <div class="card-body">
        <ol class="breadcrumb breadcrumb-progress">
            <?php foreach($fases as $k => $f):?>
                <li class="breadcrumb-item-progress breadcrumb-item <?php if($faseAtual < $k){echo "pend";}?>">
                    <a href="javascript: void(0);"><?= $f ?></a>
                </li>
            <?php endforeach;?>
        </ol>
    
        <?php if($faseAtual==0)://Informações?>
            <form method="post" id="form_novaAula">
                <input type="hidden" name="faseAtual" value="<?= $faseAtual?>"/>
                <input type="hidden" name="idCurso" value="<?= $idCurso?>"/>
                <input type="hidden" name="idModulo" value="<?= $idModulo?>"/>
                <input type="hidden" name="ordem" value="<?= $ordem?>"/>
                <div class="row">
                    <div class="col-6 offset-1">
                        <label for="nome">Nome<b class="text-danger" title="Campo obrigatório">*</b></label>
                        <input type="text" name="nome" id="nome" placeholder="Nome da aula" required class="form-control form-control-lg">
                    </div>
                    <div class="col-4">
                        <label for="tipoConteudo">Tipo<b class="text-danger" title="Campo obrigatório">*</b></label>
                        <select name="tipoConteudo" id="tipoConteudo" required class="form-control form-control-lg">
                            <option value="video">Vídeo Aula</option>
                            <option value="LIVE">Live</option>
                            <option value="Prova">Prova/Quiz</option>                            
                        </select>
                    </div>

                    <div class="col-7 offset-1">
                        <label for="tags">Tags (Separadas por ponto e vírgula ;)</label>
                        <textarea name="tags" id="tags" placeholder="Crie palavras chaves relevantes ao seu conteúdo" class="form-control form-control-lg"></textarea>
                    </div>
                    <div class="col-3">
                        <label for="professor">Professor</label>
                        <select name="professor" id="professor" class="form-control form-control-lg">
                            <option value="0"></option>
                            <?php foreach($professores as $p):?>
                                <option value="<?= $p['id']?>"><?= $p['nome']?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-10 offset-1 text-right">
                        <?php $linkModulo = base64_encode($idModulo.':modulo');?>
                        <a class="btn btn-outline-secondary" href="<?= BASE_URL.'cursos/modulo/'.$linkModulo?>">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger btn-lg" onClick="criarAula()">
                            Prosseguir
                        </button>
                    </div>
                </div>
            </form>
        <?php elseif($faseAtual==1)://Conteúdo?>
            <form method="post" id="form_novaAula">
                <input type="hidden" name="faseAtual" value="<?= $faseAtual?>"/>
                <input type="hidden" name="idAula" value="<?= $idAula?>"/>
                <div class="row">
                    <div class="col-10 offset-1">
                        <label for="autor">Copie ou cole o link da vídeo aula</label>
                        <input type="text" name="link" id="link" required
                               placeholder="Insira o link do seu vídeo" 
                               class="form-control form-control-lg"
                               onInput="loadVideo(this.value)">
                    </div>
                </div>
                <div id='loadVideo'>
                <hr/>
                    <div class="row">
                        <div class="col-10 offset-1 text-right">                       
                            <button disabled class="btn btn-danger btn-lg" title="Insira o link do vídeo">
                                Prosseguir
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        <?php elseif($faseAtual==2)://Descricao?>
            <form method="post" id="form_novaAula">
                <div class="row">
                    <div class="col-10 offset-1">
               
                    <input type="hidden" name="faseAtual" value="<?= $faseAtual?>"/>
                    <input type="hidden" name="idAula" value="<?= $idAula?>"/>
                    <!--editor-->
                    <?php $editor_content='Sem descrição';?>
                    <?php require 'App/Views/editor/index.php'?>
                    <!--editor-->
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-10 offset-1 text-right">                       
                        <button type="submit" class="btn btn-danger btn-lg" onClick="criarAula()">
                            Prosseguir
                        </button>
                    </div>
                </div>
            </form>
        <?php elseif($faseAtual==3)://Agendamento?>
            <form method="post" id="form_novaAula">
                <input type="hidden" name="faseAtual" value="<?= $faseAtual?>"/>
                <input type="hidden" name="idAula" value="<?= $idAula?>"/><hr/>
                <div class="row">
                    <div class="col-10 offset-1">
                        <label for="regra">Selecione uma regra de liberação</label>
                        <select name="regra" id="regra" class="form-control form-control-lg" onChange="selRegraLiberacao(this.value)">
                            <option selected="" value="L">L - Liberação Imediata</option>
                            <option value="D">D - Quantidade de dias apos a compra</option>
                            <option value="F">F - Data fixa</option>
                        </select>
                    </div>

                    <div class="col-10 offset-1" id='regraSelecionada'>
                        <div class="card bg-success text-light text-center">
                            <div class="card-body">
                                <b>L -  Liberação Imediata</b><br/>
                                <small>A aula estará disponível para o aluno assim que ele acessa-la</small>
                            </div>
                        </div>
                    </div>
                    

                    <hr/>
                    <div class="col-10 offset-1 text-right">                       
                        <button type="submit" class="btn btn-danger btn-lg" onClick="criarAula()">
                            Prosseguir
                        </button>
                    </div>
                </div>
            </form>
        <?php elseif($faseAtual==4)://Confirmacao?>
            <form method="post" id="form_novaAula">
                <?php $infoAula=$this->infoAula($idAula)?>

                <input type="hidden" name="faseAtual" value="<?= $faseAtual?>"/>
                <input type="hidden" name="idAula" value="<?= $idAula?>"/>
                <div class="row">
                    <div class="col-10 offset-1">
                        <p class="title">
                            <i class="fas fa-info"></i> Informações
                        </p>
                    </div>
                    <div class="col-6 offset-1">
                        <label for="nome">Nome<b class="text-danger" title="Campo obrigatório">*</b></label>
                        <input type="text" name="nome" id="nome" value='<?= $infoAula['nome']?>' placeholder="Nome da aula" required class="form-control form-control-lg">
                    </div>
                    <div class="col-4">
                        <label for="tipoConteudo">Tipo<b class="text-danger" title="Campo obrigatório">*</b></label>
                        <select name="tipoConteudo" id="tipoConteudo" required class="form-control form-control-lg">
                            <option <?php if($infoAula['tipoConteudo']=="video"){ echo "selected";}?> value="video">Vídeo Aula</option>
                            <option <?php if($infoAula['tipoConteudo']=="LIVE"){ echo "selected";}?> value="LIVE">Live</option>
                            <option <?php if($infoAula['tipoConteudo']=="Prova"){ echo "selected";}?> value="Prova">Prova/Quiz</option>                            
                        </select>
                    </div>

                    <div class="col-7 offset-1">
                        <label for="tags">Tags (Separadas por ponto e vírgula ;)</label>
                        <textarea name="tags" id="tags" placeholder="Crie palavras chaves relevantes ao seu conteúdo" class="form-control form-control-lg"><?= $infoAula['tags']?></textarea>
                    </div>
                    <div class="col-3">
                        <label for="professor">Professor</label>
                        <select name="professor" id="professor" class="form-control form-control-lg">
                            <option value="0"></option>
                            <?php foreach($professores as $p):?>
                                <option <?php if($infoAula['idProfessor']==$p['id']){ echo "selected";}?>  value="<?= $p['id']?>"><?= $p['nome']?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>
                </div>
                <hr/>
                   
                <div class="row">
                    <div class="col-10 offset-1">
                        <p class="title">
                            <i class="fas fa-video"></i> Conteúdo
                        </p>
                    </div>
                    <div class="col-10 offset-1">
                        <label for="autor">Copie ou cole o link da vídeo aula</label>
                        <input type="text" name="link" id="link" required
                               value='<?= $infoAula['link']?>'
                               placeholder="Insira o link do seu vídeo" 
                               class="form-control form-control-lg"
                               onInput="loadVideo(this.value)">
                    </div>
                </div>
                <div id='loadVideo'>
                    <div class='row align-items-center'>
                        <div class='col-6 offset-1 '>
                            <?php
                            $plataforma=$infoAula['plataforma_video'];
                            if($plataforma=='youtube'):?>
                                <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $infoAula['link']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php endif;		

                            if($plataforma=='vimeo'):?>
                                <iframe src="https://player.vimeo.com/video/<?= $infoAula['link']?>?color=ff9933&title=0&byline=0&portrait=0&badge=0" width="100%" height="300" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            <?php endif;?>
                        </div>
                        <div class="col-4">
                            <?php if($plataforma=='youtube'):?>
                                <p class="h2 text-danger"><i class="fab fa-youtube"></i> YouTube</p>
                            <?php endif;
                            
                            if($plataforma=='vimeo'):?>
                                <p class="h2 text-info"><i class="fab fa-vimeo"></i> Vimeo</p>
                            <?php endif;?>
                            <p class='h4 text-secondary'>Verifique se o vídeo foi carregado corretamente</p>
                            <small class='text-secondary'>Se sim clique em <b class="text-danger">Prosseguir</b>, caso contrário, verifique se seu link esta correto ou tente inserir um link diferente!</small><br/>
                            <input type="hidden" name="linkVideo" value="<?= $infoAula['link']?>"/>
                            <input type="hidden" name="plataforma" value="<?= $plataforma?>"/>
                            <br/><hr/>
                            <div class="row">
                                <div class="col-10 offset-1 text-right">                       
                                    <button type="submit" class="btn btn-danger btn-lg" onClick="criarAula()">
                                        Prosseguir
                                    </button>
                                </div>
                            </div>		
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-10 offset-1">
                        <p class="title">
                            <i class="fas fa-file-alt"></i> Descrição
                        </p>
                    </div>
                    <div class="col-10 offset-1">
                                
                        <!--editor-->
                        <?php $editor_content=$infoAula['descricao'];?>
                        <?php require 'App/Views/editor/index.php'?>
                        <!--editor-->
                    </div>
                </div>
                <hr/>

                <div class="row">
                    <div class="col-10 offset-1 text-right">
                        <?php $linkModulo = base64_encode($idModulo.':modulo');?>
                        <a class="btn btn-outline-secondary" href="<?= BASE_URL.'cursos/modulo/'.$linkModulo?>">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger btn-lg" onClick="criarAula()">
                            Prosseguir
                        </button>
                    </div>
                </div>
            </form>
        <?php elseif($faseAtual==5):?>
            <div class="row">
                <div class="col text-center">    
                    <i class="far fa-thumbs-up text-success" style="font-size:5rem"></i>
                    <p class="h4 text-muted">Aula cadastrada com sucesso!</p>                    
                </div>                
            </div>    
            <hr/>
            <div class="row">
                <div class="col-10 offset-1 text-center">
                    <p class="h5 text-muted">O que você quer fazer agora?</p>                    
                </div>
                <div class="col-10 offset-1 text-center">
                    <?php
                    echo " [".$idAula."] ";
                    
                    $infoAula=$this->infoAula($idAula);
                    $linkAula = base64_encode($idAula.':aula');
                    echo " [".$infoAula['idModulo']."] ";
                    $linkModulo = base64_encode($infoAula['idModulo'].':modulo');?>

                    <a class="btn btn-outline-danger" href="<?= BASE_URL."cursos/editar/".$linkAula?>">
                        <i class="fas fa-folder-open"></i> Abrir aula 
                    </a> 
                    <a class="btn btn-outline-danger" href="<?= BASE_URL."cursos/criarAula/".$linkModulo?>">
                        <i class="fas fa-plus"></i> Criar nova aula neste módulo
                    </a> 
                    <a class="btn btn-outline-danger" href="<?= BASE_URL."cursos/modulo/".$linkModulo?>">
                        <i class="fas fa-reply"></i> Voltar ao módulo 
                    </a>                 
                </div>
                
            </div>   
        <?php endif;?>    
    </div>
</div>

