<div class="modal-content">
    <div class="modal-body" style="background:#f1f1f1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"><i class="fas fa-folder-plus"></i>  Novo Módulo</p>
        <br/>
        <?php if($tipo=="selecionar"):?>
           
            <p>Selecione o que você deseja incluir de acordo com uma das opções abaixo:</p>
            <div class="row">
                <div class="col">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="h1 fas fa-folder text-danger"></i>
                            <p class="title">Módulo</p>
                            <p class="h6">Módulo de aulas convencionais!</p>
                            <hr/>
                            <div class="btn btn-outline-danger btn-create" onClick="novoModulo('<?= $idCurso?>','modulo')">
                                <i class="fas fa-check"></i> Selecionar
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="h1 fas fa-gift text-danger"></i>
                            <p class="title">Bônus</p>
                            <p class="h6">Módulo especial com conteúdo promocional!</p>
                            <hr/>
                            <div class="btn btn-outline-danger btn-create" onClick="novoModulo('<?= $idCurso?>','bonus')">
                                <i class="fas fa-check"></i> Selecionar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <div class="btn btn-outline-secondary" data-dismiss="modal">
                        Fechar
                    </div>
                </div>
            </div>
        <?php else:?>
            <form method="post" id="form_novoModulo">
                <input type="hidden" name="idCurso" id="idCurso" value="<?= $idCurso?>" required class="form-control"/>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" required class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="tipo">Tipo</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="modulo" <?php if($tipo=="modulo"){ echo "selected";}?> >Módulo</option>
                                    <option value="bonus" <?php if($tipo=="bonus"){ echo "selected";}?> >Bônus</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="descricao">Descrição</label>
                                <textarea name="descricao" id="descricao" required class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nome">Visibilidade</label>
                                <select name="visibilidade" id="visibilidade" class="form-control">
                                    <option value="0">Privado</option>
                                    <option value="1">Público</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <div class="btn btn-outline-secondary" data-dismiss="modal">
                            Fechar
                        </div>
                        <button type="submit" class="btn btn-danger" onClick="criarModulo()">
                            <i class="fas fa-folder-plus"></i>  Criar Módulo
                        </button>
                    </div>
                </div>
            </form>
        <?php endif;?>
    </div>
</div>


