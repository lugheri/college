<div class="modal-content">
    <div class="modal-body" style="background:#f1f1f1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"><i class="fas fa-edit"></i>  Alterar informações do módulo</p>
        <br/>
        <form method="post" id="form_editarModulo">
            <input type="hidden" name="idModulo" id="idModulo" value="<?= $infoModulo['id']?>" required class="form-control"/>
            <input type="hidden" name="idCurso" id="idCurso" value="<?= $infoModulo['idCurso']?>" required class="form-control"/>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" value="<?= $infoModulo['modulo']?>" required class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="Módulo" <?php if($infoModulo['tipo_modulo']=="Módulo"){ echo "selected";}?> >Módulo</option>
                                <option value="Bônus" <?php if($infoModulo['tipo_modulo']=="Bônus"){ echo "selected";}?> >Bônus</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" required class="form-control"><?= $infoModulo['descricao']?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nome">Visibilidade</label>
                            <select name="visibilidade" id="visibilidade" class="form-control">
                                <option <?php if($infoModulo['visibilidade']=="0"){ echo "selected";}?> value="0">Privado</option>
                                <option <?php if($infoModulo['visibilidade']=="1"){ echo "selected";}?> value="1">Público</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <div class="btn btn-sm btn-outline-secondary" data-dismiss="modal">
                        Fechar
                    </div>
                    <div class="btn btn-sm btn-outline-danger" onClick="removerModulo('<?= $infoModulo['id']?>','perguntar')">
                        <i class="fas fa-trash"></i> Excluir Módulo
                    </div>
                    <button type="submit" class="btn btn-danger" onClick="salvarAlteracoesModulo()">
                        <i class="fas fa-save"></i>  Salvar Alterações
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


