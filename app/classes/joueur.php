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
    private $score=array();
    private $score_total;
    private $playing;

    public function __construct($nom){
        $this->nom=$nom;

    }

    private function CompterPoints($score){
        $this->score_total+=$score['pts'];
    }
    public function Joue(){
        $this->playing=true;
    }

    public function ConserverLance($des,$score){
        $this->score[]=new Resultat($des,$score );
        $this->CompterPoints($score);
        $this->playing=false;
    }



    /**
     * @return string
     */
    public function getPlaying()
    {

        return $this->playing;
    }

    
    
    /**
     * @return string
     */
    public function getNom()
    {

        return $this->nom;
    }

    /**
     * @return array
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function getScoreTotal()
    {
        return $this->score_total;
    }


}