<?php
namespace app\classes;
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 14/11/16
 * Time: 15:05
 */



class Lancer{

    private $nb_des;
    private $de=array();

    public function __construct($nb_des=5){                                                                             // Le nombre de dés à lancer est défini à 5 de base mais l'utilisateur peut le modifier à la création de l'objet
        $this->nb_des=$nb_des;
    }

    #Méthode de lancement de dés
    public function LancerDes(){
        $count=0;                                                                                                       // Un compteur est initialisé à 0
        while($count<$this->nb_des){                                                                                    // Tant que le compteur est inférieur au nombre de dés à lancer
            $this->de[$count]=new Des();                                                                                // L'attribut '$de' s'initialise avec pour index la valeur de $count et créé un objet dés
            $this->de[$count]->LancerDe();                                                                              // L'attribut '$de' utilise la méthode de l'objet 'Des' pour lancer un dé
            $count++;                                                                                                   // La variable $count est incrémentée
        }
        return;                                                                                                         // On fait un return de la méthode à la fin de la boucle
    }

    #Méthode permettant de récupérer la valeur de chaque objet dé créé pour chaque lancé
    public function GetDes(){
        $count=0;                                                                                                       // Initialisation d'un compteur à 0
        foreach($this->de as $numdee=>$objetdee){                                                                       // Pour chaque dés contenus dans le tableau
            $val_de[$count]=$objetdee->getValeur();                                                                     // On initialise la variable avec la valeur du compteur. La variable est égale à la valeur du getter de chaque objet dés
            $count++;                                                                                                   // On incrémente le compteur

        }

        return $val_de;                                                                                                 // La variable avec les valeurs de tous les dés est retournée
    }

    
}