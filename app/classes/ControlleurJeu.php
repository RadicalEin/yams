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
    private $quijoue=1;                                                                                                 //Identifie le joueur qui doit jouer
    private $nb_tour;                                                                                                   // Donne le nombre de tour passés
    private $tour_max;                                                                                                  // Nombre de tour que la partie va durer
    private $nb_lance;
    private $lancer_max;
    private $result;
    private $etatpartie="encour";
    

    public function __construct($joueurs, $tour_max=10, $lancer_max=3){
        $this->lancer=new Lancer();
        $this->CreerJoueur($joueurs);
        $this->lancer_max=$lancer_max;
        $this->tour_max=$tour_max;
    }

    public function CreerJoueur($data){
        $count=1;
        foreach ($data as $id_joueur=>$nom_joueur){
            $this->joueurs[$count]=new Joueur($nom_joueur);
            $count++;
        }
    }
    public function Garder(){
        $verif=new VerifResults();
        $des=$this->lancer->GetDes();
        $pts=$verif->CheckResults($des);

        $this->joueurs[$this->quijoue]->ConserverLance($des,$pts);
        $this->SwitchJoueur();
    }

    public function Jouer(){
        $this->joueurs[$this->quijoue]->joue();
        $des=$this->lancer->LancerDes();
        $verif=new VerifResults();
        $pts=$verif->CheckResults($this->lancer->GetDes());
        $this->nb_lance++;
        if ($this->nb_lance==$this->lancer_max){

           $this->Garder();
        }
        return array("pts"=>$pts,"des"=>$this->lancer->GetDes());
    }



    public function GetDataParty(){
        $count=1;
        $infojoueurs=array();
        foreach($this->joueurs as $id_joueur=>$nom_joueur){
            $infojoueurs['player']['nomjoueur'.$count]=$nom_joueur;
            $count++;
        }
        $infojoueurs['nb_lancer']=$this->nb_lance;
        $infojoueurs['nb_tour']=$this->nb_tour;
        $infojoueurs['etatpartie']=$this->etatpartie;
        return $infojoueurs;
    }

    private function SwitchJoueur(){
        $this->quijoue++;
        $this->nb_lance=0;
        if (!isset($this->joueurs[$this->quijoue])){
            $this->quijoue=1;
            $this->AddUnTour();
        }
    }

    private function AddUnTour(){
        $this->nb_tour++;
        if ($this->nb_tour>$this->tour_max){
            $this->etatpartie="fini";
        }
    }


    private function Printr($tab){
        echo '<pre>';
        print_r($tab);
        echo '</pre>';
    }

    /**
     * @return mixed
     */
    public function getNbTour()
    {
        return $this->nb_tour;
    }

    /**
     * @return string
     */
    public function getEtatpartie()
    {
        return $this->etatpartie;
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