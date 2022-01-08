<?php

require_once('constants.php');

//----------------------------------------------------------------------------
//--- dbConnect --------------------------------------------------------------
//----------------------------------------------------------------------------
// Creation d'une connexion à la bdd
// Retourne faux et envoie un message d'erreur si la connexion échoue.

function dbConnect(){

    try{
        $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8',
        DB_USER, DB_PASSWORD);
    }

    catch (PDOException $exception){

        error_log('Connection error: '.$exception->getMessage());
        return false;
    }

    return $db;

}

//----------------------------------------------------------------------------
//--- dbRequestUser ----------------------------------------------------------
//----------------------------------------------------------------------------
// On récupère le nom et prenom des users

function dbRequestUser($db) {

    try {
        $query = $db->prepare('SELECT nom, prenom FROM user;');
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestRunners -------------------------------------------------------
//----------------------------------------------------------------------------
// On récupère le nom, prénom, num_licence, etc, des cyclistes

function dbRequestRunners($db) {
    
    try {
        $query = $db->prepare('SELECT mail, nom, prenom, num_licence, categorie, date_naissance, club, valide FROM cycliste;');
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestRun -----------------------------------------------------------
//----------------------------------------------------------------------------
// On récupère le nom et l'id, des courses 

function dbRequestRun($db) {

    try {
        $query = $db->prepare('SELECT id, libelle FROM course;');
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestRunner --------------------------------------------------------
//----------------------------------------------------------------------------
// On récupère le nom, prenom la place, le dossard, etc, des cyclistes qui font la course x

function dbRequestRunner($db, $course) {

    try {
        $query = $db->prepare('SELECT c.nom, c.prenom, p.place, p.dossart, p.point, p.temps FROM cycliste c JOIN participe p ON c.mail = p.mail JOIN course a ON p.id = a.id WHERE a.id = ?;');
        $query->execute(array($course));
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestUpdateRunner --------------------------------------------------
//----------------------------------------------------------------------------
// On récupère le mail, nom, prenom et num_licence, etc, des cyclistes qui ont le mail x

function dbRequestUpdateRunner($db, $mail) {

    try {
        $query = $db->prepare('SELECT mail, nom, prenom, num_licence, categorie, date_naissance, club, valide FROM cycliste WHERE mail=?;');
        $query->execute(array($mail));
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestSaveRunner --------------------------------------------------------
//----------------------------------------------------------------------------
// On met à jour les informations du cyscliste x

function dbRequestSaveRunner($db, $mail, $nom, $prenom, $date, $licence, $valide) {

    try {

        $query = $db->prepare('UPDATE cycliste SET nom=?, prenom=?, num_licence=?, date_naissance=?, valide=? WHERE mail=?;');
        $aaa = $query->execute(array($nom, $prenom, $licence, $date, $valide, $mail));

    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestRunnerRanking -------------------------------------------------
//----------------------------------------------------------------------------
// On récupère le nom, prenom et num_licence des cyclistes qui font la course x

function dbRequestRunnerRanking($db, $course) {
    try {
        $query = $db->prepare('SELECT c.nom, c.prenom, c.num_licence, c.club, c.categorie, c.categorie_categorie_valeur, p.place, p.dossart, p.point, p.temps, a.distance FROM cycliste c JOIN participe p ON c.mail = p.mail JOIN course a ON p.id = a.id WHERE a.id = ? ORDER BY p.place;');
        $query->execute(array($course));
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestRunnerNotPresent ----------------------------------------------
//----------------------------------------------------------------------------
// On récupère le nom, prenom et num_licence, etc, des cyclistes qui ne participe pas à la course x et qui sont valides

function dbRequestRunnerNotPresent($db, $course) {

    try {
        $query = $db->prepare('SELECT * FROM cycliste WHERE valide = 1 && mail NOT IN (SELECT mail FROM participe WHERE id = 1);');
        $query->execute(array($course));
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestRunnerNotPresent ----------------------------------------------
//----------------------------------------------------------------------------
// On récupère le chiffre des dossarts indisponibles

function dbRequestFlagPresent($db, $course) {

    try {
        $query = $db->prepare('SELECT dossart FROM participe WHERE id = ?;');
        $query->execute(array($course));
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}

//----------------------------------------------------------------------------
//--- dbRequestRunnerNotPresent ----------------------------------------------
//----------------------------------------------------------------------------
// On récupère le chiffre des dossarts indisponibles

function dbRequestSaveNewRenner($db, $course, $mail, $dossart) {

    try {
        $query = $db->prepare('INSERT INTO participe VALUES (?, ?, null, ?, null, null);');
        $query->execute(array($mail, $course, $dossart));
    }
    catch (PDOExecption $exception) {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
}