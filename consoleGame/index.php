<?php

    //Add all the required files, make sure you have the right order!
    require_once("inc/config.inc.php");
    require_once("inc/monster.inc.php");
    require_once("inc/player.inc.php");
    require_once("inc/logic.inc.php");

    $leave = false;
    
    //Variable to hold the current monster
    $monster = getCurrentMonster_gfr_91();
    //Drop the user into the loop
    do { 
        //Make sure you have a current monster selected
        echo "Would you like to (f)ight, (r)un or (q)uit?\n";
        $decision = strtolower(stream_get_line(STDIN,1024,PHP_EOL));
        
        //Proccess the commands using a switch statement (we've dont this before)
        switch ($decision) {
            //Fight
            case "f":
                fight_gfr_91($monster);
                $leave = false;
                break;
            //Run!
            case "r":
                run_gfr_91();
                $leave = false;
                break;       
            //Quit!
            case "q":
                echo "\n\nYou quit the game! Try again later!\n";
                echo "Thank you!\n";
                printf("%'=50s","\n\n\n");
                $leave = true;
                exit();
                //break;
            //Do the right thing!
            deafult:
                echo "Invalid entry! Please, try again!";
                $leave = false;
        }
    } while (!$leave);
    
?>