<?php
namespace app\classes;
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 15/11/16
 * Time: 11:12
 */
class Des{

    private $face_min=1;
    private $face_max;
    private $valeur;

    public function __construct($face_max=6){                                                                           //La face max est définie à 6 de base mais peut avoir une valeur définie par l'utilisateur
        $this->face_max=$face_max;
    }

    #Méthode pour lancer un dé
    public function LancerDe(){
        $this->valeur=rand($this->face_min,$this->face_max);                                                            //L'attribut '$this->valeur' prend pour valeur un résultat aléatoire compris entre la valeur de '$face_min' (défini à 1) et '$face_max' (défini par l'utilisateur)
    }

    ############################################### Getters ############################################################

    #Getter retournant '$this->valeur' permettant l'utilisation de la valeur du dé dans d'autres objets
    /**
     * @return mixed
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @return int
     */
    public function getFaceMax()
    {
        return $this->face_max;
    }


}