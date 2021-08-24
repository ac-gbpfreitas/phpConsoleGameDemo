<?php
    require_once("config.inc.php");
    require_once("logic.inc.php");
    /* 
    * This function returns the current monster.
    * if there is no current monster one is chosen.  
    * If there are no more monsters and they are all dead youWin()!
    */

    function getCurrentMonster_gfr_91() {
        global $monsterList;
        //Make sure the current monster and all the monsters are in scope.
        global $monster;
        //See if the current Monster is set, or the current monster is dead
        //then select a new random one.
        //Check if all the monsters are dead, use a flag
        $aliveMonsters = aliveMonster_gfr_91();

        //If there is at least one monster alive...
        if ($aliveMonsters) {
            //There must be some alive monsters...
            //Picking a new random monster
            shuffle($monsterList);
            for ( $i = 0; $i < count($monsterList); $i++ ) {
                //If the new monster is alive, assign it as currMonsster
                if ( $monsterList[$i][2] ) {
                    $monster = $monsterList[$i];
                    echo "\n\nA new monster has Arrived! TYPE: $monster[0]";
                    displayStatus_gfr_91();
                    return $monster;
                    break;
                }
            }
        } else {
            youWin_gfr_91();            
        }
        return $monster;
    }

    function aliveMonster_gfr_91() {
        global $monsterList;
        $aliveMonsters = false;
        //Iterate through all the monsters
        for ( $i = 0; $i < count($monsterList); $i++ ) {
            //Check if any are alive
            if ( $monsterList[$i][2] ) {
                //Set the aliveMonsters flag
                $aliveMonsters = true;
                break;
            }
        }
        return $aliveMonsters;
    }

    //This function handles monster damage.
    function monsterDamage_gfr_91($damage,$monster) {
        global $monster;
        //Remote the damange from the current monsters health
        //Make sure the appropriate variable is available.
        $monster[1] -= $damage;
        //If the monster's health is less than or equal to 0, they are dead.
        if ( $monster[1] <= 0 ) {
            //Notify the player they are dead
            echo "The $monster[0] is DEAD!\n";
            //Set the monster status to dead!
            $monster[2] = false;
            $monster[1] = 0;
            displayStatus_gfr_91();
            updateMonsterList_gfr_91($monster);
            //Get a new Monster!
            $monster = getCurrentMonster_gfr_91();
        } else {
            displayStatus_gfr_91();
        }
    }
    
    //This function update the The Monster array with a dead mosnter
    function updateMonsterList_gfr_91($monster) {
        global $monster;
        global $monsterList;
        for ( $i = 0; $i < count($monsterList); $i++ ) {
            if ( $monsterList[$i][0] == $monster[0] ) {
                $monsterList[$i][2] = false;
                break;
            }
        }
    }
?>