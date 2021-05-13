    


<script type="text/javascript">

//editor de texto



function comando(comand,parametro){
  document.execCommand(comand,false,parametro);
  saidaTexto()
}

function saidaTexto(){
   let texto = document.getElementById('conteudo_editor').innerHTML;
   document.getElementById('texto_editor').value=texto
}

const link = () => document.execCommand('createlink', false, prompt('Informe a URL:', 'http://') )

</script>

  