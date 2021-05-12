<?php namespace Controllers;
use Core\Controller;
use Models\Cursos;
use Models\Professores;

class cursosController extends Controller{

    public function __construct(){
        $this->modulo_ativo = 'cursos';
    }

    public function index(){

    }

    public function catalogo(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo';


        $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);
    }

    public function filtraCatalogo(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo';
        $this->loadView($this->modulo_ativo.'/'.$data['telaAtual'],$_POST);
    }

    //Lista de curso por status
    public function listarCursos($status){
        $c = new Cursos();
        return $c->listarCursos($status);
    }

    public function totalAlunos_curso($idCurso){
        $c = new Cursos();
        return $c->totalAlunos_curso($idCurso);
    }
    
    public function avaliacao_curso($idCurso){
        $c = new Cursos();
        return $c->avaliacao_curso($idCurso);
    }

    public function criarCurso(){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo_criarCurso';

        //Fases do Cadastro
        $data['fases'] = array(
            '<i class="fas fa-info"></i> Informações',
            '<i class="fas fa-wrench"></i> Pré Configuração',
            '<i class="fas fa-camera"></i> Imagem de Capa',
            '<i class="fas fa-check"></i> Confirmação');
        
        if(empty($_POST)){    
            //Fase atual
            $data['faseAtual']=0;
            $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);
        }else{
            $c = new Cursos();
            $data['faseAtual']=$_POST['faseAtual']+1;
            $data['idCurso']=$c->criarCurso($_POST);

            $this->loadView($this->modulo_ativo.'/'.$data['telaAtual'],$data);
        }        
    }

    public function infoCurso($idCurso){
        $c = new Cursos();
        return $c->infoCurso($idCurso);
    }

    public function nomeCurso($idCurso){
        $c = new Cursos();
        return $c->nomeCurso($idCurso);
    }

    public function nomeModulo($idModulo){
        $c = new Cursos();
        return $c->nomeModulo($idModulo);
    }
    
    public function nomeAula($idAula){
        $c = new Cursos();
        return $c->nomeAula($idAula);
    }

    public function nomeProfessor($idProfessor){
        $p = new Professores();
        return $p->nomeProfessor($idProfessor);
    }

    public function editar($idCurso){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo_abrirCurso';

        $c = new Cursos();
        $idCurso = explode(':',base64_decode($idCurso));
        $data['infoCurso']=$c->infoCurso($idCurso[0]);

        $data['modulosCurso']=$c->modulosCurso($idCurso[0]);

        $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);

    }

    public function estatisticasCurso(){
        $c = new Cursos();
        $data['infoCurso']=$c->infoCurso($_POST['idCurso']);
        $data['media']=$c->avaliacao_curso($_POST['idCurso']);

        //Aula Melhor Avaliada
        $data['melhorAula']=$c->aulaMelhorAvaliada($_POST['idCurso']);
        //Melhor Professor
        $data['melhorProfessor']=$c->melhorProfessor($_POST['idCurso']);
        //Qtd de Avaliacoes por alunos
        $data['qtdAvaliacoes_porAluno']=$c->qtdAvaliacoesPorAlunos($_POST['idCurso']);
        //Qtd de Avaliacoes do curso
        $data['qtdAvaliacoes']=$c->qtdAvaliacoes($_POST['idCurso']);

        //Total de alunos
        $data['alunosCurso']=$c->totalAlunosCurso($_POST['idCurso']);
        //Total de professores
        $data['professoresCurso']=$c->totalProfessoresCurso($_POST['idCurso']);
        //Total de modulos
        $data['modulosCurso']=$c->totalModulosCurso($_POST['idCurso']);
        //Total de aulas
        $data['aulasCurso']=$c->totalAulasCurso($_POST['idCurso']);



        $this->loadView($this->modulo_ativo.'/catalogo_estatisticasCurso',$data);
    }

    public function editarInfoCurso(){
        $c = new Cursos();

        $data['infoCurso']=$c->infoCurso($_POST['idCurso']);

        $this->loadView($this->modulo_ativo.'/catalogo_editarInfoCurso',$data);
    }

    public function removerCurso(){
        $c = new Cursos();
        if($_POST['acao']=="perguntar"){
            $data['infoCurso']=$c->infoCurso($_POST['idCurso']);
            $this->loadView($this->modulo_ativo.'/catalogo_removerCurso',$data);
            
        }else if($_POST['acao']=="remover"){           
            $c->removerCurso($_POST['idCurso']);
            echo "<script>window.location.href='".BASE_URL."cursos/catalogo'</script>";
        }
    }

    public function salvarAlteracoesCursos(){
        $c = new Cursos();
        $c->salvarAlteracoesCurso($_POST);

        $linkCurso = base64_encode($_POST['idCurso'].':curso');
        echo "<script>window.location.href='".BASE_URL."cursos/editar/".$linkCurso."'</script>";
    }

    public function novoModulo(){
        $data['idCurso']=$_POST['idCurso'];
        $data['tipo']=$_POST['tipo'];
        
        $this->loadView($this->modulo_ativo.'/catalogo_novoModulo',$data);        
    }

    public function criarModulo(){
        $c = new Cursos();

        $idModulo=$c->criarModulo($_POST);
        $linkModulo= base64_encode($idModulo.':modulo'); 
        echo "<script>window.location.href='".BASE_URL."cursos/modulo/".$linkModulo."'</script>";
    }

    public function totalAulasModulo($idModulo){
        $c = new Cursos();

        return $c->totalAulasModulo($idModulo);
    }

    public function modulo($idModulo){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo_abrirModulo';

        $c = new Cursos();

        $idModulo = explode(':',base64_decode($idModulo));
        $data['infoModulo']=$c->infoModulo($idModulo[0]);

        $data['aulasModulo']=$c->aulasModulo($idModulo[0]);

        $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);
    }

    public function editarModulo(){
        $c = new Cursos();

        $data['infoModulo']=$c->infoModulo($_POST['idModulo']);
        $this->loadView($this->modulo_ativo.'/catalogo_editarModulo',$data); 
    }

    public function removerModulo(){
        $c = new Cursos();
        if($_POST['acao']=="perguntar"){
            $data['infoModulo']=$c->infoModulo($_POST['idModulo']);
            $this->loadView($this->modulo_ativo.'/catalogo_removerModulo',$data);
            
        }else if($_POST['acao']=="remover"){   
            $infoModulo=$c->infoModulo($_POST['idModulo']);     
            $c->removerModulo($_POST['idModulo']);
            $linkCurso = base64_encode($infoModulo['idCurso'].':curso');
            echo "<script>window.location.href='".BASE_URL."cursos/editar/".$linkCurso."'</script>";
        }
    }

    
    public function salvarAlteracoesModulo(){
        $c = new Cursos();
        $c->salvarAlteracoesModulo($_POST);

        $linkModulo = base64_encode($_POST['idModulo'].':modulo');
        echo "<script>window.location.href='".BASE_URL."cursos/modulo/".$linkModulo."'</script>";
    }

    public function reordenaAula(){
        $c = new Cursos();
        $ordem=$_POST['ordem'];
        $ordemModulo=$_POST['ordemModulo']*100;
        $idCurso=$_POST['idCurso'];
        $idModulo=$_POST['idModulo'];

        $i=0;
        foreach ($ordem as $idAula):
            $ordem=$ordemModulo+$i;
            $c->atualizaOrdem($idAula,$ordem);
            $i++;
        endforeach;
       
        $data['infoModulo']=$c->infoModulo($idModulo);
        $data['aulasModulo']=$c->aulasModulo($idModulo);

        $this->loadView($this->modulo_ativo.'/listaAulas_modulo',$data);

        
    }

    //dados da programacao
    public function dadosProgramacao($idLive){
        $c = new Cursos();
        return $c->dadosProgramacao($idLive);
    }

    

    public function criarAula($idModulo = ""){
        $p = new Professores();
        $c = new Cursos();
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo_criarAula';
        $idM=explode(':',base64_decode($idModulo));
        $data['idModulo']=$idM[0];

        

        //Fases do Cadastro
        $data['fases'] = array(
            '<i class="fas fa-info"></i> Informações',
            '<i class="fas fa-video"></i> Conteúdo',
            '<i class="fas fa-file-alt"></i> Descrição',
            '<i class="fas fa-paperclip"></i> Material de Apoio/anexos',
            '<i class="fas fa-calendar-check"></i> Agendamento',
            '<i class="fas fa-check"></i> Confirmação');
        
        if(empty($_POST)){    
            //Fase atual
            $data['faseAtual']=0;
            $data['professores'] = $p->listarProfessores(1);
            $data['idCurso'] = $c->idCurso_byModulo($idM[0]);
            $data['ordem'] = $c->ordemPxAula($idM[0]);
            $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);
        }else{
           
            $data['faseAtual']=$_POST['faseAtual']+1;
            $data['idAula']=$c->criarAula($_POST);

            $this->loadView($this->modulo_ativo.'/'.$data['telaAtual'],$data);
        }        
    }

    public function abrirAula($idAula){
        $data['moduloAtivo']=$this->modulo_ativo;
        $data['telaAtual']='catalogo_abrirAula';

        $c = new Cursos();
        $idA=explode(':',base64_decode($idAula));
        $data['infoAula']=$c->infoAula($idA[0]);

        $this->loadTemplate($this->modulo_ativo.'/'.$data['telaAtual'],$data);  
    }
}