<div class="modal-content">
    <div class="modal-body" style="background:#f1f1f1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"><i class="fas fa-calendar"></i>  Alterar regra de liberação</p>
        <br/>
        
        <input type="hidden" name="idAula" value="<?= $idAula?>"/>

        <div class="card">
            <div class="card-body">
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
                        <?php if($agendamentoAula['regraLiberacao']=='L'):?>
                            <div class="card bg-success text-light text-center">
                                <div class="card-body">
                                    <b>L -  Liberação Imediata</b><br/>
                                    <small>A aula estará disponível para o aluno assim que ele acessa-la</small>
                                </div>
                            </div>
                        <?php elseif($agendamentoAula['regraLiberacao']=='D'):?>
                            <div class="card bg-warning text-dark text-center">
                                <div class="card-body">
                                    <b>D -  <?= $agendamentoAula['diasLiberacao']?> Dias após a compra</b>
                                    <small>A aula será liberada <?= $agendamentoAula['diasLiberacao']?> após a data de compra</small>
                                </div>
                            </div>
                        <?php elseif($agendamentoAula['regraLiberacao']=='F'):?>
                            <div class="card bg-danger text-light text-center">
                                <div class="card-body">
                                    <b>F - Data fixada</b>
                                    <small>A aula estará disponível apenas após <?= date('d/m/Y', strtotime($agendamentoAula['dataLiberacao']))?>!</small>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 text-right"> 
            <div class="btn btn-outline-secondary" data-dismiss="modal">
                Fechar
            </div>                      
            <div class="btn btn-success" onClick="salvarRegraAula('<?= $idAula ?>')">
                <i class="fas fa-save"></i> Salvar
            </div>
        </div>
    </div>
</div>
 