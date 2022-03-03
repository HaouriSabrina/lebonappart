<?php

session_start(); 

//Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=eval_sabrina', "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

//-------------------------------------------------------------------------------------
//Définition d'une constante : 
define('URL', "http://localhost/php/eval_sabrina/");

//Definition des variables :
$content = ''; // variable prévue pour recevoir du contenu
$error = ''; // variable prévue pour recevoir les messages d'erreurs

//-------------------------------------------------------------------------------------

//Inclusion des fonctions
require_once "fonction.inc.php";
?>