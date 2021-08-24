<?php

    //Define the constant for the probability for RUN and HIT
    //$RUN_PROBABILITY = 6;
    //$HIT_PROBABILITY = 9;
    define("RUN_PROBABILITY",6);
    define("HIT_PROBABILITY",9);

    /*
    * Store the following information for all three monsters, use an indexed array
    * Monster Type: Beast, Dragon, Elemental
    * Monster Health: 75, 100, 150
    * Monster status (dead/alive)
    */
    
    $monsterList = array(
        array("Beast",75,true),
        array("Dragon",100,true),
        array("Elemental",150,true)
    );

    /*
    * Store all the information in an array called $player, use an associative array
    * Name
    * Health
    */
    
    $player = array(
        "name" => "Gustavo Freitas",
        "health" => 100
    );