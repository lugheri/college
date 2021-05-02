<?php
namespace Controllers;
use Core\Controller;

class alunosController extends Controller{
    public function buscar($aluno){
        echo 'Aluno buscado: '.$aluno;
    }
}