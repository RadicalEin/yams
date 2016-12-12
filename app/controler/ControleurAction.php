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

    public function __construct(classes\ControlleurJeu $game){                                                          //Récupération du controleur de jeu
        $this->game=$game;

        $loader = new \Twig_Loader_Filesystem('tpl');
        $this->twig = new \Twig_Environment($loader);
    }

    public function ActionJouer(){
        $infotour=$this->game->Jouer();
        $infojoueurs=$this->game->GetDataParty();
        /*echo '<pre>';
        print_r($infojoueurs);
        echo '</pre>';*/
        echo $this->twig->render('plateau-jeu.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
        echo $this->twig->render('elements/tableau-score.html.twig', array('nomjoueurs'=>$infojoueurs));
    }

    public function ActionRelancer(){
        $infotour=$this->game->Jouer();
        $infojoueurs=$this->game->GetDataParty();
        echo '<pre>';
        print_r($infotour);
        echo '</pre>';
        
        echo $this->twig->render('plateau-jeu.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
        echo $this->twig->render('elements/tableau-score.html.twig', array('nomjoueurs'=>$infojoueurs));
    }
    
    public function ActionGarder(){
        $infotour=$this->game->Jouer();
        $infojoueurs=$this->game->GetDataParty();
        $this->game->SwitchJoueur();
        echo '<pre>';
        print_r($infotour);
        echo '</pre>';
        echo $this->twig->render('plateau-jeu.html.twig', array('pts'=> $infotour['pts'], 'des' => $infotour['des']));
        echo $this->twig->render('elements/tableau-score.html.twig', array('nomjoueurs'=>$infojoueurs));
    }

    public function Racine(){                                                                                           //Méthode pour utiliser les données des joueurs
        if (isset($_GET['nav']) and $_GET['nav']=='index'){
            session_destroy();
            unset($_SESSION);
        }
        $infojoueurs=$this->game->GetDataParty();
        if($infojoueurs==null){
            echo $this->twig->render('choix-joueur.html.twig');
        }
    }

    public function ActionNbjoueur(){                                                                                   //Définit le nombre de joueurs à créer
        $nb_player=$_GET['number'];
        echo $this->twig->render('inscription.html.twig', array('nb_player'=>$nb_player));                              //Donne le nombre de joueur au template d'inscription
    }
    
    public function ActionDemarrerpartie(){
        $nomjoueurs=$_POST;
        $infojoueurs=$this->game->GetDataParty();
        $this->CreerJoueurs($nomjoueurs);
        echo $this->twig->render('plateau-jeu.html.twig', array('nomjoueurs'=>$nomjoueurs));
        echo $this->twig->render('elements/tableau-score.html.twig', array('nomjoueurs'=>$infojoueurs));
    }

    private function CreerJoueurs($data){
        $this->game->CreerJoueur($data);
    }

    public function GetControleurJeu(){
        return $this->game;
    }

    private function Printr($tab){
        echo '<pre>';
        print_r($tab);
        echo '</pre>';
    }
}