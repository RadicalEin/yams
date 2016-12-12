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
    private $quijoue=1;
    private $nb_tour;                                                                                                   // Donne le nombre de tour passés
    private $lancer_max;
    private $tour_max;                                                                                                  // Nombre de tour que la partie va durer
    private $result;
    private $view;

    public function __construct($joueurs, $tour_max=10, $lancer_max=3){
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

    public function CreerJoueur($data){
        $count=1;
        foreach ($data as $id_joueur=>$nom_joueur){
            $this->joueurs[$count]=new Joueur($nom_joueur);
            $count++;
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

    public function GetDataParty(){
        $count=1;
        $infojoueurs=array();
        foreach($this->joueurs as $id_joueur=>$nom_joueur){
            $infojoueurs['nomjoueur'.$count]=$nom_joueur;
            $count++;
        }
        /*echo '<pre>';
        print_r($this->joueurs);
        echo '</pre>';*/
        return $infojoueurs;
    }

    public function SwitchJoueur(){
        //si l'action garder existe
        if(isset($_GET['Action']) && $_GET['Action']=='Garder'){
            
            //j'incrémente l'id de joueur

        //Si le nombre de lancé et egal au maximum de lancé autorisé
        }/*elseif($lancer>$this->lancer_max){

            //j'incrémente l'id de joueur

        }*/

    }

    ######################################### GETTERS ##################################################################

    /**
     * @return mixed
     */
    public function getTourMax()
    {
        return $this->tour_max;
    }

    /**
     * @return mixed
     */
    public function getQuijoue()
    {
        return $this->quijoue;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return mixed
     */
    public function getLancerMax()
    {
        return $this->lancer_max;
    }

}