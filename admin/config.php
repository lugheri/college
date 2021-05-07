<?php
date_default_timezone_set('America/Fortaleza');
require 'environment.php';

if(ENVIRONMENT == 'development')://Dados do ambiente de desenvolvimento
    //Versão
    $versao="v2";
    
    //Url Base
    
    define("BASE_URL","http://".$_SERVER["HTTP_HOST"].'/traderx/'.$versao.'/admin/');
    define("BASE_URL_ALUNO","http://".$_SERVER["HTTP_HOST"].'/traderx/'.$versao.'/aluno/');
    define("BIBLIOTECA","http://".$_SERVER["HTTP_HOST"].'/traderx/biblioteca/');
    
    //Configuracao de Cache
    define("NOCACHE",date("hms"));

    //Configuracao do banco de dados
    $config['dbname'] = 'traderx';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

elseif(ENVIRONMENT == "production"):
     //Url Base
     define("BASE_URL","https://".$_SERVER["HTTP_HOST"].'/admin/');
     define("BASE_URL_ALUNO","https://".$_SERVER["HTTP_HOST"].'/aluno/');
     define("BIBLIOTECA","https://".$_SERVER["HTTP_HOST"].'/biblioteca/');
     
     //Configuracao de cache
     define("NOCACHE",0);
     
     //Configuracao do banco de dados
     $config['dbname'] = 'otraderq_traderx';
     $config['host'] = 'localhost';
     $config['dbuser'] = 'otraderq_traderx';
     $config['dbpass'] = 'GhCs@IGC20201387#';
endif;

define("PUBLIC_PATH", BASE_URL."Public/assets/");

global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
    $db->exec("SET NAMES 'utf8'");
    $db->exec("SET character_set_connection=utf8");
    $db->exec("SET character_set_client=utf8");
    $db->exec("SET character_set_results=utf8");
}
catch (PDOException $e){
    echo "Erro ao conectar ao banco de dados ".$e->getMessage();
    exit();
}