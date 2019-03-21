<?php

namespace App\Empanadas;

use BotMan\BotMan\BotMan;

/**
 * Copyright INP.
 * User: ivanmreys
 * Date: 9/25/18
 * Time: 2:36 PM
 * @property BotMan bot
 */

class DespachadorEmpanadas{

    protected $quienDa;
    protected $quienesReciben;

    /**
     * @param $quienDa string
     * @param $quienesReciben string[]
     * @param $bot BotMan
     */
    public function __construct($quienDa, $quienesReciben, $bot){

        $this->quienDa = $quienDa;
        $this->quienesReciben  = $quienesReciben;
        $this->bot = $bot;

        $this->storage = $this->bot->userStorage()->find($quienDa);
    }

    public function darEmpanadas($cuantasPorPersona){

        if($cuantasPorPersona == 0)
            return;



    }
}