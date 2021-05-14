<div class="modal-content">
    <div class="modal-body" style="background:#f1f1f1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"><i class="fas fa-video"></i>  Alterar Vídeo</p>
        <br/>
        
        <input type="hidden" name="idAula" id="idAula" value="<?= $idAula?>"/>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label for="autor">Copie ou cole o link da vídeo aula</label>
                        <input type="text" name="link" id="link" required
                               placeholder="Insira o link do seu vídeo" 
                               class="form-control form-control-lg"
                               onInput="loadNovoVideo(this.value)">
                    </div>
                </div>
                <div id='loadVideo'>
                </div>
            </div>
        </div>
        <div class="col-12 text-right"> 
            <div class="btn btn-outline-secondary" data-dismiss="modal">
                Fechar
            </div>  
        </div>
    </div>
</div>
 