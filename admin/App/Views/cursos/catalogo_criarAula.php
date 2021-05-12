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
                            <option value=""></option>
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
                <input type="hidden" name="idCurso" value="<?= $idAula?>"/>
                <div class="row">
                    <div class="col-10 offset-1">
                        <label for="autor">Copie ou cole o link da vídeo aula</label>
                        <input type="text" name="link" id="link" placeholder="Insira o link do seu vídeo" class="form-control form-control-lg">
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
        <?php elseif($faseAtual==2)://Descricao?>
            
        <?php elseif($faseAtual==3)://Material de Apoio/anexos?>
            <form method="post" id="form_novaAula">
                <input type="hidden" name="faseAtual" value="<?= $faseAtual?>"/>
                <input type="hidden" name="idCurso" value="<?= $idCurso?>"/>
                <div class="row">
                    <div class="col-10 offset-1">
                        <label for="capa">Capa</label>
                        <input type="text" name="capa" id="capa">
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
        <?php elseif($faseAtual==4)://Agendamento?>


        <?php elseif($faseAtual==5)://Confirmacao?>
            <form method="post" id="form_novaAula">
                <input type="hidden" name="faseAtual" value="<?= $faseAtual?>"/>
                <input type="hidden" name="idCurso" value="<?= $idCurso?>"/>

                <?php $infoCurso=$this->infoCurso($idCurso);?>

                <div class="row">
                    <div class="col-10 offset-1">
                        <label for="capa">Capa</label>
                        <input type="text" value="<?= $infoCurso['capa']?>" name="capa" id="capa">
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-10 offset-1">
                        <label for="nome">Nome<b class="text-danger" title="Campo obrigatório">*</b></label>
                        <input type="text" value="<?= $infoCurso['nome']?>" name="nome" id="nome" placeholder="Nome do curso" required class="form-control form-control-lg">
                    </div>
                    <div class="col-10 offset-1">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" placeholder="Breve descrição do Curso" class="form-control form-control-lg"><?= $infoCurso['descricao']?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1">
                        <label for="autor">Autor</label>
                        <input type="text" value="<?= $infoCurso['autor']?>" name="autor" id="autor" placeholder="Nome do criador do curso" class="form-control form-control-lg">
                    </div>
                    <div class="col-10 offset-1">
                        <label for="tags">Tags (Separadas por ponto e vírgula ';')</label>
                        <textarea name="tags" id="tags" placeholder="Insira tags para ajudar os alunos a encontrar este curso nas buscas" class="form-control form-control-lg"><?= $infoCurso['tags']?></textarea>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-10 offset-1 text-right">
                        <button type="submit" class="btn btn-danger btn-lg" onClick="criarCurso()">
                            Concluir
                        </button>
                    </div>
                </div>
            </form>
        <?php elseif($faseAtual==4):?>
            <div class="row">
                <div class="col text-center">    
                    <i class="far fa-thumbs-up text-success" style="font-size:5rem"></i>
                    <p class="h4 text-muted">Curso cadastrado com sucesso!</p>                    
                </div>                
            </div>    
            <hr/>
            <div class="row">
                <div class="col-10 offset-1 text-center">
                    <p class="h5 text-muted">O que você quer fazer agora?</p>                    
                </div>
                <div class="col-10 offset-1 text-center">
                    <?php $linkCurso = base64_encode($idCurso.':curso');?>
                    <a class="btn btn-outline-danger" href="<?= BASE_URL."cursos/editar/".$linkCurso?>">
                        <i class="fas fa-folder-open"></i> Abrir curso 
                    </a> 
                    <a class="btn btn-outline-danger" href="<?= BASE_URL."cursos/criarCurso"?>">
                        <i class="fas fa-plus"></i> Criar novo curso 
                    </a> 
                    <a class="btn btn-outline-danger" href="<?= BASE_URL."cursos/catalogo"?>">
                        <i class="fas fa-reply"></i> Voltar ao catálogo 
                    </a>                 
                </div>
                
            </div>   
        <?php endif;?>    
    </div>
</div>