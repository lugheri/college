<i class="fas fa-low-vision"></i> Visibilidade da aula
<div class="btn-group btn-block">
    <?php if($visibilidade==1):?>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-eye"></i> Publicada
        </button>
    <?php else:?>
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-eye-slash"></i> Privada
        </button>
    <?php endif;?>                           
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#" onClick="setVisibilidadeAula('<?= $idAula?>',1)"><i class="far fa-eye"></i> Pública</a>
        <a class="dropdown-item" href="#" onClick="setVisibilidadeAula('<?= $idAula?>',0)"><i class="far fa-eye-slash"></i> Privada</a>
    </div>
</div>