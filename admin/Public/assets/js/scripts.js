//Side bar
function openSubSide(id){
    //Mudando icone de open para opened 
    let    icons = document.getElementsByClassName(`open`)
    let submenus = document.getElementsByClassName(`sub-side-nav`)

    for(let i=0; i<icons.length; i++){
        icons[i].style.transform='rotate(0deg)'
    }
    for(let i=0; i<icons.length; i++){
        submenus[i].style.height='0px'
    }

    let  icon = document.getElementById(`openIcon_${id}`);
         icon.style.transform='rotate(90deg)';
    let submenu = document.getElementById(`subSide_${id}`);
        submenu.style.height='auto'
}



/*Funcoes do Catálogo de cursos */
function filtraCatalogo(privacidade,modoView){
    $.ajax({
        type: "POST",
        data:{privacidade,modoView},
        url:RAIZ+"cursos/filtraCatalogo",
        dataType:"html",
        success:function(result){
            $('#conteudo').html('');
            $('#conteudo').append(result);
        }
    })
}

//Criar Curso
function criarCurso(){
    $('#form_novoCurso').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form_novoCurso')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
            url:RAIZ+"cursos/criarCurso",
			dataType: "html",
			beforeSend:function(){
				$('#conteudo').html('');	
				$('#conteudo').append("<div class='modal-body text-center'><i class='text-info fas fa-circle-notch fa-spin'></i><p>Cadastrando Curso</p> </div>");
			},
            success:function(result){
				$('#conteudo').html('');	
				$('#conteudo').append(result);
        	}
			
		})
	});
}
