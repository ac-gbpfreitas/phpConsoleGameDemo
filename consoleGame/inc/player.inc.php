<?php
    require_once("config.inc.php");

    //This function applies the the damage sustained to a player and determines if they are dead.
    function playerDamage_gfr_91($damage) {
        //Get the current health
        global $player;
        //Remove the damage from the player's health
        $player["health"] -= $damage;
        //Check if the player is dead, exit the game
        if ( $player["health"] <= 0 ) {
            youLose_gfr_91();
        } else {
            displayStatus_gfr_91();
        }
    }        
       
    //If the player won! display a message and exit.
    function youWin_gfr_91() {
        global $player;
        echo $player["name"]." won! There are no more monsters!\n\n";
        exit();
    }
    //If the player lost, display a message and exit.
    function youLose_gfr_91() {
        global $player;
        echo "\n\n".$player["name"]." died and lost!\n";
        echo "Try again another time!\n\n";
        exit();
    }

    //This function handles if the user tries to run
    //roll the dice and there is a 70% chance they can run,
    //if they can then add the dice roll back to their health, otherwise fight!
    function run_gfr_91() {
        //Make sure you can access the player
        global $player;
        global $monster;

        //Roll the dice
        $run = rollDice_gfr_91();
        //70% percent chance to succeed
        if ( $run > RUN_PROBABILITY ) {
            if ( ($player["health"] + $run) <= 100 ) {
                //Add the health back
                $player["health"] += $run;
                echo "You successfully ran away and got some health back!\n";
            }
            displayStatus_gfr_91();
        } else { //If they didnt make it, fight!
            $message = "";
            $message .= "You didn't manage to run,";
            $message .= " forcing you to fight the monster!\n";
            echo $message;
            fight_gfr_91($monster);
        }
    }