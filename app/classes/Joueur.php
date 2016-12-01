<?php
namespace app\classes;
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 17/11/16
 * Time: 10:38
 */
class Joueur{
    
    private $nom;
    private $score;
    private $nb_lancer=0;
    
    public function __construct($nom){
        $this->nom=$nom;
    }

    public function CompterPoints($score){

    }

    /**
     * @return mixed
     */
    public function getNbLancer()
    {
        return $this->nb_lancer;
    }

}