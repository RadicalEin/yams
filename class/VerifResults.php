<?php

/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 14/11/16
 * Time: 15:05
 */

//include 'Lancer.php';

class VerifResults{

    private $face_max;
    private $type_result=array(
        'paire'=>30,
        'double_paire'=>45,
        'brelan'=>60,
        'quinte'=>100,
        'carre'=>120
    );

    public function __construct($face_max=6){                                                                           //TODO : faire passer le nombre de faces max par l'objet Dés
       $this->face_max=$face_max;
    }

    #Méthode de vérification de résultats
    public function CheckResults($des){
        $tableau_verif=$this->CreerTableauVerif($des);
        $result['carre']=$this->CheckCarre($tableau_verif);
        $result['quinte']=$this->CheckQuinte($tableau_verif);
        $result['brelan']=$this->CheckBrelan($tableau_verif);
        $result['double_paire']=$this->CheckDoublePaire($tableau_verif);
        $result['paire']=$this->CheckPaire($tableau_verif);
        return $this->Checkscore($result);
    }

    private function Checkscore($result){
        foreach ($result as $result_name=>$result_return){
            if ($result_return!='bad'){
                $resultat['nom']=$result_name;
                $resultat['pts']=$this->type_result[$result_name];
                return $resultat;
            }
        }
    }

    #Méthode interne qui vérifier l'éxistence des paires
    private function CheckPaire($tableau_verif){
        $retour_result=$tableau_verif;
        foreach ($retour_result as $id_result=>$chiffre_result){
            if($chiffre_result==2){
                //echo 'Paire';
                return 'paire';
            }
        }
        return 'bad';
    }

    #Méthode interne qui va vérifier l'éxistence des brelans
    private function CheckBrelan($tableau_verif){
        $retour_result=$tableau_verif;
        foreach ($retour_result as $id_result=>$chiffre_result){
            if($chiffre_result==3){
                //echo 'Brelan';
                return 'brelan';
            }
        }
        return 'bad';
    }

    #Méthode interne qui va vérifier l'éxistence des doubles paires
    private function CheckDoublePaire($tableau_verif){
        $retour_result=$tableau_verif;
        $marqueur=0;
        foreach ($retour_result as $id_result=>$chiffre_result){
            if($chiffre_result==2){
                if ($marqueur==1){
                    //echo 'Double paire';
                    return 'double_paire';
                }
                $marqueur=1;
            }
        }
        return 'bad';
    }

    #Méthode interne qui va vérifier l'éxistence des carrés
    private function CheckCarre($tableau_verif){
        $retour_result=$tableau_verif;
        foreach ($retour_result as $id_result=>$chiffre_result){
            if($chiffre_result==4){
                //echo 'Carré';
                return 'carré';
            }
        }
        return 'bad';
    }

    #Méthode interne qui va vérifier l'éxistence des quintes
    private function CheckQuinte($tableau_verif){
        $retour_result=$tableau_verif;
        $marqueur=0;
        foreach ($retour_result as $id_result=>$chiffre_result){
            if ($chiffre_result>0){
                $marqueur++;
                if ($marqueur==5){  //TODO: ajouter le nombre de dés lancés en attributs à la place d'un chiffre en dur
                    //echo 'Quinte';
                    return 'quinte';
                }
                }else{
                $marqueur=0;
            }
        }
        return 'bad';
    }

    private function CreerTableauVerif($des){
        $nb_faces=0;
        while ($nb_faces<$this->face_max){
            $nb_faces++;
            $test_tab[$nb_faces]=0;
        }
        foreach ($des as $id_de=>$chiffre_de){
            $test_tab[$chiffre_de]++;
        }
        //$this->Printr($test_tab);
        return $test_tab;
    }

    private function Printr($vartab){
        echo '<pre>';
        print_r($vartab);
        echo '<pre>';
    }
}