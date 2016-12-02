<?php
namespace app\controler;
use app\classes;
/**
 * Created by IntelliJ IDEA.
 * User: lionel
 * Date: 23/11/16
 * Time: 15:53
 */
class ControleurAction{

    private $game;

    public function __construct(classes\ControlleurJeu $game){
        $this->game=$game;

        $loader = new \Twig_Loader_Filesystem('tpl');
        $this->twig = new \Twig_Environment($loader);
    }

    public function ActionJouer(){
        $infotour=$this->game->Jouer();
        echo '<pre>';
        print_r($infotour);
        echo '</pre>';
        echo $this->twig->render('plateau-jeu.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
    }

    public function ActionRelancer(){
        $infotour=$this->game->Jouer();
        echo $this->twig->render('ajax/results.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
    }
    
    public function ActionGarder(){
        
    }

    public function Racine(){
        $infojoueurs=$this->game->GetDataParty();
        if($infojoueurs==null){
            echo $this->twig->render('choix-joueur.html.twig');
        }
    }

    public function ActionNbjoueur(){
        $nb_player=$_GET['number'];
        echo $this->twig->render('inscription.html.twig', array('nb_player'=>$nb_player));
    }
    
    public function ActionDemarrerpartie(){
        $nomjoueurs=$_POST;
        /*echo '<pre>';
        print_r($nomjoueurs);
        echo '</pre>';*/
        echo $this->twig->render('plateau-jeu.html.twig', array('nomjoueurs'=>$nomjoueurs));
    }

    public function ActionDemarrertour(){

    }
}