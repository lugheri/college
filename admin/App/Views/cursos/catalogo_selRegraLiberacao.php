<?php if($regra=='L'):?>
    <div class="card bg-success text-light text-center">
        <div class="card-body">
            <b>L -  Liberação Imediata</b><br/>
            <small>A aula estará disponível para o aluno assim que ele acessa-la</small>
        </div>
    </div>
   
<?php elseif($regra=='D'):?>  
    <div class="card bg-warning text-dark text-center">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <b>D -  Dias após a compra</b>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    <label for="dias" class="text-dark">Quantidade de dias</label>
                    <input type="number" name="dias" id="dias" value='1' min="0" step="1" required class="form-control form-control-lg">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <small>A aula estará após a quantidade de dias informados a contar pela data de compra</small>
                </div>
            </div>
        </div>
    </div> 

<?php elseif($regra=='F'):?>   
    <div class="card bg-danger text-light text-center">
        <div class="card-body">
        <div class="row">
                <div class="col-12">
                    <b>F - Data fixada</b>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    <label for="dataLiberacao" class="text-light">Data de Liberação</label>
                    <input type="date" name="dataLiberacao" id="dataLiberacao" required class="form-control form-control-lg">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <small>A aula estará disponível apenas após a data informada!</small>
                </div>
            </div>
        </div>
    </div>
   
<?php endif;?>