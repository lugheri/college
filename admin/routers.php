<?php 
global $routes;
$routes = array();

//HOME
//$routes['/rota/{parametro}] = '/rota/:parametro';

$routes['/home/index'] = '/home/:action';
$routes['/alunos/{nome}'] = '/alunos/buscar/:nome';



