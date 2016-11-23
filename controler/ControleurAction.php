<?php

/**
 * Created by IntelliJ IDEA.
 * User: lionel
 * Date: 23/11/16
 * Time: 15:53
 */
class ControleurAction{

    private $game;


    public function __construct(ControlleurJeu $game){
        $this->game=$game;
    }



    public function ActionJouer(){

        $this->game->Jouer();

    }
}