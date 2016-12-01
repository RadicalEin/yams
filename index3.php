<!doctype html>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 14/11/16
 * Time: 12:28
 */

function __autoload($class_name) {
    $file='class/'.$class_name . '.php';
    if (file_exists($file)==false){
        $file='controler/'.$class_name . '.php';
    }
    include ($file);
}

if (isset($_SESSION['controll'])){
    $controll=unserialize($_SESSION['controll']);
}else{
    $controll=new ControlleurJeu($_POST);
}

################Fonctionnement routeur ############################
//Créer le controleur
if (isset($_GET['control'])){
    $nom_controleur="Controleur".$_GET['control'];
    $controleur=new $nom_controleur($controll);
    //Appel la bonne methode
    $method="Action".$_GET['method'];
    $controleur->$method();
}



/*
$controll->AfficherLance();


if (isset($_POST['nb_player'])){
    $controll->AfficherInputJoueurs($_POST['nb_player']);
}else{
    $controll->AfficherNbJoueur();
}
    if(isset($_POST['player1'])){
        $joueur=$_POST;
        $test_joueur=strlen($joueur['player1']);
        if($test_joueur>0){
            $controll->AfficherTableauJoueur($_POST);
        }else{
            echo 'Veuillez inscrire le nom des joueurs.';
            echo "<a href='index3.php' title='Retour'>retour</a>";
        }
    }*/


$_SESSION['controll']=serialize($controll);



