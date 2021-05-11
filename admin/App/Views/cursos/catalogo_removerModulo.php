<div class="modal-content">
    <div class="modal-body" style="background:#f1f1f1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"><i class="fas fa-trash-alt"></i>  Remover módulo</p>
        <br/>
        <div class="row align-items-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="h5">Confirmar remoção do módulo <?= $infoModulo['modulo']?>?</p>
                    </div>
                </div>               
            </div>
        </div>
        
        <div class="row">
            <div class="col text-right">
                <div class="btn btn-sm btn-outline-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Não
                </div>
                <div class="btn btn-sm btn-outline-danger" onClick="removerModulo('<?= $infoModulo['id']?>','remover')">
                    <i class="fas fa-trash"></i> Sim, remover
                </div>
            </div> 
        </div>
    </div>
</div>