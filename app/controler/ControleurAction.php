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
        $infojoueurs=$this->game->GetDataParty();
        /*echo '<pre>';
        print_r($infojoueur);
        echo '</pre>';*/
        echo $this->twig->render('plateau-jeu.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
        echo $this->twig->render('elements/tableau-score.html.twig', array('nomjoueurs'=>$infojoueurs));
    }

    public function ActionRelancer(){
        $infotour=$this->game->Jouer();
        /*echo '<pre>';
        print_r($infotour);
        echo '</pre>';*/
        echo $this->twig->render('plateau-jeu.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
    }
    
    public function ActionGarder(){
        /*$infotour=$this->game->Jouer();
        echo '<pre>';
        print_r($infotour);
        echo '</pre>';*/
        echo $this->twig->render('plateau-jeu.html.twig', array('pts'=> $infotour['pts'], 'des' => $infotour['des']));
    }

    public function Racine(){
        echo '<a href="index.php?nav=index" title="r.a.z" class="btn-danger">Casse moi tout là d\'dans</a> ';
        if (isset($_GET['nav']) and $_GET['nav']=='index'){
            session_destroy();
            unset($_SESSION);
        }
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
        $this->CreerJoueurs($nomjoueurs);
        echo $this->twig->render('plateau-jeu.html.twig', array('nomjoueurs'=>$nomjoueurs));
    }

    private function CreerJoueurs($data){
        $this->game->CreerJoueur($data);
    }

    public function ActionDemarrertour(){

    }

    public function GetControleurJeu(){
        return $this->game;
    }
}