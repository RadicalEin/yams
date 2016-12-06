<?php
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 23/11/16
 * Time: 17:05
 */

session_start();

use app\classes;
use app\controler;
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);


if (isset($_SESSION['controll'])){
    $controll=unserialize($_SESSION['controll']);
    echo '<pre>';
    print_r($controll);
    echo '</pre>';
}else{
    $controll=new classes\ControlleurJeu($_POST);
}

################ Fonctionnement routeur ############################

//Créer le controleur
if (isset($_GET['control'])){
    $nom_controleur="app\\controler\\Controleur".$_GET['control'];
    $controleur=new $nom_controleur($controll);
    //Appel la bonne methode
    $method="Action".$_GET['method'];
    $controleur->$method();
}else{
    $controleur=new controler\ControleurAction($controll);
    $controleur->Racine();
}
/*$controll->CreerJoueur(array('clement', 'lionel'));
$controll->GetDataParty();*/



################ Mise en session des informations ############################

$_SESSION['controll']=serialize($controleur->GetControleurJeu());



