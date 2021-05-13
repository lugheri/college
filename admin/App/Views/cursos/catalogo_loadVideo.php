<div class='row align-items-center'>
	<div class='col-6 offset-1 '>
		<?php
		if($plataforma=='youtube'):?>
			<iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $idVideo?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php endif;		

		if($plataforma=='vimeo'):?>
			<iframe src="https://player.vimeo.com/video/<?= $idVideo?>?color=ff9933&title=0&byline=0&portrait=0&badge=0" width="100%" height="300" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
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
        <input type="hidden" name="linkVideo" value="<?= $idVideo?>"/>
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