<?php

function GetCountArt() {
    try{
        $connections=mysql_connect('localhost','root','');

if (!$connections)
{
	die('Cannot Connect to the database');
}

$db_set = mysql_select_db("gestioncafe",$connections);

if(!$db_set)
{
	echo "Database Not Selected";
}
        
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
/*
function GetCountArt() {
    try {
        $PARAM_hote = 'localhost';
        $PARAM_port = '3306';
        $PARAM_nom_bd = 'gestioncafe';
        $PARAM_utilisateur = 'root';
        $PARAM_mot_passe = '';
        $connexion = new PDO('mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
        $req = $connexion->prepare("select sum(qt) from produits");
        $req->execute();
        return $req->fetchColumn();
        ;
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function GetCountClient() {
    try {
       $PARAM_hote = 'localhost';
        $PARAM_port = '3306';
        $PARAM_nom_bd = 'gestioncafe';
        $PARAM_utilisateur = 'root';
        $PARAM_mot_passe = '';
        $connexion = new PDO('mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
        $req = $connexion->prepare("select count(*) from clients");
        $req->execute();
        return $req->fetchColumn();
        ;
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


function GetCountFact() {
    try {
       $PARAM_hote = 'localhost';
        $PARAM_port = '3306';
        $PARAM_nom_bd = 'gestioncafe';
        $PARAM_utilisateur = 'root';
        $PARAM_mot_passe = '';
        $connexion = new PDO('mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
        $req = $connexion->prepare("select count(*) from facture");
        $req->execute();
        return $req->fetchColumn();
        ;
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
*/