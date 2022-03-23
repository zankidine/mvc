<?php
session_start();
require_once 'include/configuration.php';

Autoloader::chargerClasses();

if (!isset($_SESSION['login'])) {
    $_REQUEST['gestion'] = 'authentification';
}elseif (!isset($_REQUEST['gestion'])){
    $_REQUEST['gestion'] = 'accueil';
}

//var_dump($_REQUEST);
//appel au routeur du module 'accueil'
//require_once 'mod_'.$_REQUEST['gestion'].'/'.$_REQUEST['gestion'].'.php';

$oRouteur = new $_REQUEST['gestion']($_REQUEST);
//var_dump($oRouteur);
$oRouteur->choixAction();

