<?php

use BotMan\BotMan\BotMan;

/**
 * @var $botman BotMan
 */
$botman = resolve('botman');

$botman->hears('Buenos días!+', function (BotMan $bot) use ($botman) {

    \Illuminate\Foundation\Inspiring::quote();
});

//**
$botman->hears('(.*):dumpling:(.*)', function (BotMan $bot) use ($botman) {

    $bot->startConversation(new \App\Conversations\EmpanadasConversation());


});