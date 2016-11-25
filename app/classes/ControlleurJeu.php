<?php
namespace app\classes;
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 14/11/16
 * Time: 12:33
 */


class ControlleurJeu{

    private $joueurs=array();
    private $lancer;                                                                                                    // Objet de lancé qui contient les dés
    private $quijoue;
    private $nb_tour;                                                                                                   // Donne le nombre de tour passés
    private $tour_max;                                                                                                  // Nombre de tour que la partie va durer
    private $result;
    private $view;

    public function __construct($joueurs, $tour_max=10){
        $this->lancer=new Lancer();
        $this->CreerJoueur($joueurs);
        $this->view=new view($joueurs);
    }

    public function AfficherNbJoueur(){
        $this->view->SelectNbJoueurs();
    }

    public function AfficherInputJoueurs($nb_player){
        $this->view->InsertPlayerInput($nb_player);
    }

    public function AfficherTableauJoueur($player_name){
        $this->view->CreerTableauxJoueurs($player_name);
    }

    private function CreerJoueur(){
        $count=0;
        foreach ($this->joueurs as $id_joueur=>$nom_joueur){
            $this->joueur[$count]=new Joueur($nom_joueur);
        }
    }

    public function Jouer(){

        $des=$this->lancer->LancerDes();
        $verif=new VerifResults();

        $pts=$verif->CheckResults($this->lancer->GetDes());
        return array("pts"=>$pts,"des"=>$this->lancer->GetDes());
    }

    public function AfficherLance(){
        $this->view->AfficherDes($this->lancer->GetDes());
    }
}