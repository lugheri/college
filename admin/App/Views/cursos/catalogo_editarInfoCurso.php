<div class="modal-content">
    <div class="modal-body" style="background:#f1f1f1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"><i class="far fa-edit"></i>  Editar informações do curso</p>
        <br/>
        <form method="post" id="form_editarCurso">
            <input type="hidden" name="idCurso" id="idCurso" value="<?= $infoCurso['id']?>" class="form-control"/>
                        
            <div class="row align-items-center">
                <div class="col-4 text-center" style="position:relative">
                    <?php if($infoCurso['capa']):?>
                        <img src="<?= $this->getImageBiblioteca($infoCurso['capa'])?>" 
                            alt="capa-curso" style="width:100%">
                        <input type="hidden" name="capa" id="capa" value="<?= $infoCurso['capa']?>" class="form-control"/>
                                
                        <div class="btn btn-outline-danger btn-sm" style="position: absolute;bottom:16px;left:25%;width: 50%;">
                            Alterar Imagem
                        </div>
                    <?php else:?>
                        <i class="h1 fas fa-camera"></i>
                        <p class="h4">Sem Capa</p>
                        <input type="hidden" name="capa" id="capa" value="<?= $infoCurso['capa']?>" class="form-control"/>
                        <div class="btn btn-info btn-sm">
                            Inserir Imagem
                        </div> 
                    <?php endif;?>                
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" required id="nome" value="<?= $infoCurso['nome']?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="descricao">Descrição</label>
                                    <textarea name="descricao" id="descricao" class="form-control"><?= $infoCurso['descricao']?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="autor">Autor</label>
                                    <input type="text" name="autor" id="autor" value="<?= $infoCurso['autor']?>" class="form-control"/>
                                </div>
                                <div class="col-4">
                                    <label for="privacidade">Privacidade</label>
                                    <select name="privacidade" id="privacidade" class="form-control">
                                        <option <?php if($infoCurso['publico']==1){echo "selected";}?> value="1">Público</option>
                                        <option <?php if($infoCurso['publico']==0){echo "selected";}?> value="0">Privado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="tags">Tags</label>
                                    <textarea name="tags" id="tags" class="form-control"><?= $infoCurso['tags']?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col text-right">
                    <div class="btn btn-sm btn-outline-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Fechar
                    </div>
                    <div class="btn btn-sm btn-outline-danger" onClick="removerCurso('<?= $infoCurso['id']?>','perguntar')">
                        <i class="fas fa-trash"></i> Excluir Curso
                    </div>
                    <button type="submit" class="btn btn-success" onClick="salvarAlteracoesCursos()">
                        <i class="fas fa-save"></i> Salvar alterações
                    </button>
                </div> 
            </div>
        </form>
    </div>
</div>