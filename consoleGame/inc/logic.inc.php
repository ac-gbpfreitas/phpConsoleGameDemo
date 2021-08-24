 <?php
    require_once("config.inc.php");
    require_once("monster.inc.php");

    
    //This is the function to fight, it rolls the dice and determines
    function fight_gfr_91($monster) {
        //roll the dice and save it to a variable
        global $monster;
        global $player;

        //Calculate the hit probabililty 50/50
        $hit = rollDice_gfr_91();
        //Calculate the Damage
        $damage = (20 - rollDice_gfr_91())*5;
        /**
         * Roll the dice, if the percentage is greater than HIT_PROBABILITY 
         * then you hit (deice roll - 20) * 5 to determine hit points.
        */
        if ( $hit > HIT_PROBABILITY ) {
            //Notify the user of how much damage they inflicted
            echo "Hit! The $monster[0] lost ".$damage." health points.\n";
            //Remove the damage from the current Monster
            monsterDamage_gfr_91($damage,$monster);
        } else { //otherwise the oponent hits
            //Calculate the damage the player inflicted
            //Notify the player they missed
            $message = "";
            $message .= "You missed! ".$player["name"].", ";
            $message .= "the monster countered with $damage health points.\n";
            echo $message;
            //Remove the damage from the player
            playerDamage_gfr_91($damage);
        }
    }

    //This function handles rolling the dice.
    //It returns an integer which represents the result of rolling the dice.
    function rollDice_gfr_91() : int {
        //Return a dice roll between 1 and 20.
        return rand(1,20);
    }

    //This function displays the status of the player and the current monster
    function displayStatus_gfr_91() {
        //Make sure all the variables you need are in place.
        global $monster;
        global $player;
        /**
         * Display should be as follows:
         * 
         * Player Stats: Name: Sam Health: 20
         * Monster Stats: Type: Beast Health: 15
         */
        $message = "";
        $message .= "\n";
        $message .= sprintf("%'=50s","\n");
        $message .= "Player Stats - Name: ".$player["name"];
        $message .= " | Health: ".$player["health"]."\n";
        $message .= "Monster Stats - Type: $monster[0]";
        $message .= " | Health: $monster[1]\n";
        $message .= sprintf("%'=50s","\n");
        echo $message;
    }

?>