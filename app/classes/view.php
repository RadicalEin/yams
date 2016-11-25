<?php
namespace app\classes;
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 14/11/16
 * Time: 12:32
 */
class view{

    public function __construct(){

    }

    public function SelectNbJoueurs(){
        ?>
        <h3>Sélectionnez le nombre de joueurs : </h3>
        <form action="index.php?action=nb_player" method="post">
            <select name="nb_player">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <input type="submit" value="envoyer"/>
        </form>
        <?php
    }

    public function InsertPlayerInput($nb_player){
        $player_count=0;
        echo "<form action='index3.php?action=play' method='post'>";
        while($player_count<$nb_player){
            $player_count++;
            echo "<input type='text' name='player".$player_count."' placeholder='Joueur ".$player_count."'/><br />";
        }
        echo "<input type='submit' value='jouer'/>";
        echo "</form>";
    }

    public function CreerTableauxJoueurs($player_name){                                                                                         //TODO : Ajouter les résultats à la méthode.
        foreach ($player_name as $id_player=>$name_player){
            echo "<table width='500px'>";
                echo "<tr>";
                echo "<td colspan='5'><h4>".$name_player."</h4></td><td colspan='2'></td>";                                                     //TODO : Faire apparaître le bouton dynamiquement lorsque c'est le tour du personnage
                echo "</tr>";
                echo "<tr>";
                echo "<th>Dé 1</th><th>Dé 2</th><th>Dé 3</th><th>Dé 4</th><th>Dé 5</th><th>Résultat</th><th>Score</th>";
                echo "</tr>";
                //TODO : utiliser les scores en session pour les afficher
            echo "</table>";
        }
    }

    public function AfficherDes($des){
        foreach ($des as $id=>$result){
            echo "<img src='images/".$result.".jpg' width='50' height='50' alt='".$result."'/>";
        }
    }

}