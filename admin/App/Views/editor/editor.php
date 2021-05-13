<div class='menu-bar'>
    <div class="btn-group" role="group" aria-label="...">
	    <div class="btn-group" role="group" aria-label="...">
			<div onClick='comando("undo")' class="btn btn-default" title='Voltar Ação'><i class='fa fa-undo'></i></div>
			<div onClick='comando("redo")' class="btn btn-default" title='Refazer'><i class='fa fa-redo'></i></div>
		</div>
    	<div class="btn-group" role="group" aria-label="...">                                               
            <div class="btn btn-default" title='Cor da Fonte' style='position:relative' onClick="document.getElementById('colorPicker_fonte').click()">
		  		<i class="fas fa-fill-drip"></i>  <span class="caret">										  	
		    </div>
            <input type="color" style="position:absolute;top:5px;left:5px;z-index:-10; opacity:0" id="colorPicker_fonte" name="colorPicker_fonte" value="#000" onInput="comando('foreColor',this.value)">

			<div id='cor' style='position:relative'></div>
    		<div onClick='comando("bold")' class="btn btn-default" title='Negrito'><i class='fa fa-bold'></i></div>
    		<div onClick='comando("italic")' class="btn btn-default" title='Itálico'><i class='fa fa-italic'></i></div>
    		<div onClick='comando("strikeThrough")' class="btn btn-default" title='Riscado'><i class='fa fa-strikethrough'></i></div>
    		<div onClick='comando("underline")' class="btn btn-default" title='Sublinhado'><i class='fa fa-underline'></i></div>
        </div>
    </div>

    <div class="btn-group" role="group" aria-label="...">
        <div class="btn btn-default" title='Tamanho da Fonte'>
            <select name='font-size' id='font-size' onChange="comando('fontSize',this.value)">
                <option value=''>Tamanho</option>
                <option value='1'>9 pt</option>
                <option value='2'>10 pt</option>
                <option value='3'>12 pt</option>
                <option value='4'>14 pt</option>
                <option value='5'>15 pt</option>
                <option value='6'>16 pt</option>
                <option value='7'>18 pt</option>
            </select>
        </div>
        <div class="btn btn-default" title='Fonte'>
            <select name='fontName' id='fontName' onChange="comando('fontName',this.value)">
                <option value=''>Fonte</option>
                <?php $fontes=$this->listarFontes();
                foreach($fontes as $f):?>
                    <option value="<?= $f['fontFamily']?>">
                        <?= $f['nome']?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div onClick='link()' class="btn btn-default" title='Inserir Link'>			
            <i class="fas fa-link"></i>
		</div>
	<div class="btn-group" role="group" aria-label="...">
        
		<div onClick='comando("justifyLeft")' class="btn btn-default" title='Alinhar a Esquerda'>
			<i class='fa fa-align-left'></i>
		</div>
		<div onClick='comando("justifyCenter")' class="btn btn-default" title='Centralizado'>
		 	<i class='fa fa-align-center'></i>
    	</div>
		<div onClick='comando("justifyRight")' class="btn btn-default" title='Alinhar a Direita'>
		 	<i class='fa fa-align-right'></i>
		</div>
		<div onClick='comando("justifyFull")' class="btn btn-default" title='Justificado'>
		 	<i class='fa fa-align-justify'></i>
	   	</div>
	</div>

	<div class="btn-group" role="group" aria-label="...">
		<div onClick='comando("insertOrderedList")' class="btn btn-default" title='Inserir Lista Numerada'>
		  	<i class='fa fa-list-ol'></i>
	   	</div>
		<div onClick='comando("insertUnorderedList")' class="btn btn-default" title='Inserir Lista' >
		 	<i class='fa fa-list-ul'></i></span>
		</div>										 
	</div>

	<div class="btn-group" role="group" aria-label="...">
		<div onClick='comando("selectAll")' class="btn btn-default" title='Selecionar Tudo'>
		 	<i class='fas fa-file-alt'></i>
		</div>

		<div class="btn btn-default" title='Marcar' style='position:relative' onClick="document.getElementById('colorPicker_backColor').click()">
		  	<i class='fas fa-pencil-alt'></i>  <span class="caret">	
            <input type="color" style="position:absolute;top:5px;left:5px;z-index:-10; opacity:0" id="colorPicker_backColor" name="colorPicker_backColor" value="#000" onInput="comando('backColor',this.value)">
        </div>            

		

		<div onClick='comando("removeFormat")' class="btn btn-default" title='Remover Formatacao'>
		 	<i class='fas fa-eraser'></i>
		</div>																		 
	</div>
					
	<div class='container-box-txt'>
		<div class='box-editor' id="conteudo_editor" contenteditable="true" onInput="saidaTexto()">
			<?php if(!empty($editor_content)):
                echo $editor_content;
            endif; ?>			
		</div>
	</div>	
</div>

<input type="hidden" name="texto_editor" id="texto_editor"/>