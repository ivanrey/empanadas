<?php

namespace Tests\BotMan;

use Illuminate\Foundation\Inspiring;
use Tests\TestCase;

class EmpanadaTest extends TestCase
{
    /**
     * Prueba si se envía sólo a una persona
     *
     * @return void
     */
    public function testEnvioAUnaPersona()
    {

        $this->bot
            ->receives('@U4N0JB8FL :dumpling: por ser un buen amigo')
            ->assertReply('Le mandaste empanada a @U4N0JB8FL')
            ->assertReply('Tu user id es @1');
    }


    public function testEnvioADosPersonas()
    {

        $this->bot
            ->receives('@U4N0JB8FL @U4N0JB8FJ :dumpling: por ser un buen amigo')
            ->assertReply('Le mandaste empanada a @U4N0JB8FL')
            ->assertReply('Le mandaste empanada a @U4N0JB8FJ')
            ->assertReply('Tu user id es @1');
    }

    public function testEnvioSinPersona()
    {
        $this->bot
            ->receives(' :dumpling: por ser un buen amigo')
            ->assertReply('Debes nombrar a quien quieres darle tu empanada en el mismo mensaje');
    }


    public function testEnvioSinMensaje()
    {
        $this->bot
            ->receives(' :dumpling: @U4N0JB8FL ')
            ->assertReply('Le mandaste empanada a @U4N0JB8FL')
            ->assertReply('Tu user id es @1')
            ->assertReply('Debes enviar un mensaje con tu empanada');

        $this->bot
            ->receives(' @U4N0JB8FL :dumpling: @U4N0JB8FJ ')
            ->assertReply('Le mandaste empanada a @U4N0JB8FL')
            ->assertReply('Le mandaste empanada a @U4N0JB8FJ')
            ->assertReply('Tu user id es @1')
            ->assertReply('Debes enviar un mensaje con tu empanada');
    }

    /**
     * A conversation test example.
     *
     * @return void
     *
     * public function testConversationBasicTest()
     * {
     * $quotes = [
     * 'When there is no desire, all things are at peace. - Laozi',
     * 'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
     * 'Simplicity is the essence of happiness. - Cedric Bledsoe',
     * 'Smile, breathe, and go slowly. - Thich Nhat Hanh',
     * 'Simplicity is an acquired taste. - Katharine Gerould',
     * 'Well begun is half done. - Aristotle',
     * 'He who is contented is rich. - Laozi',
     * 'Very little is needed to make a happy life. - Marcus Antoninus',
     * 'It is quality rather than quantity that matters. - Lucius Annaeus Seneca',
     * 'Genius is one percent inspiration and ninety-nine percent perspiration. - Thomas Edison',
     * 'Computer science is no more about computers than astronomy is about telescopes. - Edsger Dijkstra',
     * ];
     *
     * $this->bot
     * ->receives('Start Conversation')
     * ->assertQuestion('Huh - you woke me up. What do you need?')
     * ->receivesInteractiveMessage('quote')
     * ->assertReplyIn($quotes);
     * }*/
}
