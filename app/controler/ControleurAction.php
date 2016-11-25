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
        echo $this->twig->render('index.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
    }

    public function ActionRelancer(){
        $infotour=$this->game->Jouer();
        echo $this->twig->render('ajax/results.html.twig', array('pts' => $infotour['pts'], 'des'=>$infotour['des']));
    }
}