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

//Estatisticas do curso
function estatisticasCurso(idCurso){
    $.ajax({
        type: "POST",
        data:{idCurso},
        url:RAIZ+"cursos/estatisticasCurso",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog').addClass('modal-lg');

            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('show');
        }
    })
}

//Editar Informações do Curso
function editarInfoCurso(idCurso){
    $.ajax({
        type: "POST",
        data:{idCurso},
        url:RAIZ+"cursos/editarInfoCurso",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog').addClass('modal-lg');

            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('show');
        }
    })
}

//Salvar as alterações do curso
function salvarAlteracoesCursos(){
    $('#form_editarCurso').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form_editarCurso')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
            url:RAIZ+"cursos/salvarAlteracoesCursos",
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

//Remover curso
function removerCurso(idCurso,acao){
    $.ajax({
        type: "POST",
        data:{idCurso,acao},
        url:RAIZ+"cursos/removerCurso",
        dataType:"html",
        success:function(result){
            $('#content-modal-add').html('');
            $('#content-modal-add').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog-add').removeClass('modal-sm');//Pequeno
			$('.modal-dialog-add').removeClass('modal-lg');//Grande
            $('.modal-dialog-add').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog-add').addClass('modal-sm');

            $('#modal-add').modal({
				backdrop: 'static'
			})

            $('#modal-add').modal('show');
        }
    })
}

//Criar Módulo Curso
function novoModulo(idCurso,tipo){
    $.ajax({
        type: "POST",
        data:{idCurso,tipo},
        url:RAIZ+"cursos/novoModulo",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('show');
        }
    })
}

//Criar novo Modulo
function criarModulo(){
    $('#form_novoModulo').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form_novoModulo')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
            url:RAIZ+"cursos/criarModulo",
			dataType: "html",			
            success:function(result){
				$('#conteudo').html('');	
				$('#conteudo').append(result);
        	}			
		})
	});
}

//Editar Módulo
function editarModulo(idModulo){
    $.ajax({
        type: "POST",
        data:{idModulo},
        url:RAIZ+"cursos/editarModulo",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('show');
        }
    })
}

//Remover Modulo
function removerModulo(idModulo,acao){
    $.ajax({
        type: "POST",
        data:{idModulo,acao},
        url:RAIZ+"cursos/removerModulo",
        dataType:"html",
        success:function(result){
            $('#content-modal-add').html('');
            $('#content-modal-add').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog-add').removeClass('modal-sm');//Pequeno
			$('.modal-dialog-add').removeClass('modal-lg');//Grande
            $('.modal-dialog-add').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog-add').addClass('modal-sm');

            $('#modal-add').modal({
				backdrop: 'static'
			})

            $('#modal-add').modal('show');
        }
    })
}

//Salva alteracoes modulo
function salvarAlteracoesModulo(){
    $('#form_editarModulo').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form_editarModulo')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
            url:RAIZ+"cursos/salvarAlteracoesModulo",
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

//Nova Aulas
function criarAula(){
    $('#form_novaAula').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form_novaAula')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
            url:RAIZ+"cursos/criarAula",
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

function loadVideo(linkVideo){
    $.ajax({
        type: "POST",
        data:{linkVideo},
        url:RAIZ+"cursos/loadVideo",
        dataType:"html",
        beforeSend:function(){
            $('#loadVideo').html('');	
            $('#loadVideo').append("<div class='modal-body text-center'><i class='h4 text-info fas fa-circle-notch fa-spin'></i><p>Carregando informações do vídeo</p> </div>");
        },
        success:function(result){
            $('#loadVideo').html('');
            $('#loadVideo').append(result);
        }
    })
}

function selRegraLiberacao(regra){
    $.ajax({
        type: "POST",
        data:{regra},
        url:RAIZ+"cursos/selRegraLiberacao",
        dataType:"html",       
        success:function(result){
            $('#regraSelecionada').html('');
            $('#regraSelecionada').append(result);
        }
    })
}


/*Tela de abrir curso */
function salvarNome(idAula){
    let nome = document.getElementById('nome').value
    $.ajax({
        type: "POST",
        data:{idAula,nome},
        url:RAIZ+"cursos/salvarNome",
        dataType:"html",       
        beforeSend:function(){
            $('#salvaNome').html('');	
            $('#salvaNome').append("<div class='modal-body text-center'><i class='h4 text-success fas fa-save'></i><p>Nome gravada</p></div>");
        },
        success:function(result){
            $('#salvaNome').html('');
            $('#salvaNome').append(result);
        }
    })

}
//Alterar Video
function alterarVideo(idAula){
    $.ajax({
        type: "POST",
        data:{idAula},
        url:RAIZ+"cursos/alterarVideo",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog').addClass('modal-lg');

            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('show');
        }
    })
}

function loadNovoVideo(linkVideo){
    $.ajax({
        type: "POST",
        data:{linkVideo},
        url:RAIZ+"cursos/loadNovoVideo",
        dataType:"html",
        beforeSend:function(){
            $('#loadVideo').html('');	
            $('#loadVideo').append("<div class='modal-body text-center'><i class='h4 text-info fas fa-circle-notch fa-spin'></i><p>Carregando informações do vídeo</p> </div>");
        },
        success:function(result){
            $('#loadVideo').html('');
            $('#loadVideo').append(result);
        }
    })
}

function salvarNovoVideo(idVideo,plataforma){
    let idAula = document.getElementById('idAula').value
    $.ajax({
        type: "POST",
        data:{idAula,idVideo,plataforma},
        url:RAIZ+"cursos/salvarNovoVideo",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog').addClass('modal-lg');

            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('hide');
        }
    })
}

//Regra Aula
function alterarRegraAula(idAula){
    $.ajax({
        type: "POST",
        data:{idAula},
        url:RAIZ+"cursos/alterarRegraAula",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog').addClass('modal-lg');

            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('show');
        }
    })
}

function salvarRegraAula(idAula){
    let regra = document.getElementById('regra').value
    if(regra=="L"){
        dias=""
        dataLiberacao=""
    }
    if(regra=="D"){
        dias=document.getElementById('dias').value
        dataLiberacao=""
    }
    if(regra=="F"){
        dias=""
        dataLiberacao=document.getElementById('dataLiberacao').value   
    }

    $.ajax({
        type: "POST",
        data:{idAula,regra,dias,dataLiberacao},
        url:RAIZ+"cursos/salvarRegraAula",
        dataType:"html",
        success:function(result){
            $('#content-modal').html('');
            $('#content-modal').append(result);

            //removendo outras possiveis classes de tamanho
			$('.modal-dialog').removeClass('modal-sm');//Pequeno
			$('.modal-dialog').removeClass('modal-lg');//Grande
            $('.modal-dialog').removeClass('modal-xl');//Muito Grande
            
            $('.modal-dialog').addClass('modal-lg');

            $('#modal').modal({
				backdrop: 'static'
			})

            $('#modal').modal('hide');
        }
    })
}

//Descricao
function salvarDescricao(idAula){
    let descricao = document.getElementById('texto_editor').value
    $.ajax({
        type: "POST",
        data:{idAula,descricao},
        url:RAIZ+"cursos/salvaDescricaoAula",
        dataType:"html",       
        beforeSend:function(){
            $('#descricao').html('');	
            $('#descricao').append("<div class='modal-body text-center'><i class='h4 text-success fas fa-save'></i><p>Descrição gravada</p></div>");
        },
        success:function(result){
            $('#descricao').html('');
            $('#descricao').append(result);
        }
    })
}

//Materiais

//Visibilidade
function setVisibilidadeAula(idAula,visibilidade){
    $.ajax({
        type: "POST",
        data:{idAula,visibilidade},
        url:RAIZ+"cursos/setVisibilidadeAula",
        dataType:"html",       
        success:function(result){
            $('#visibilidadeAula').html('');
            $('#visibilidadeAula').append(result);
        }
    })
}

