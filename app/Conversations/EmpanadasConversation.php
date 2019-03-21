<?php

namespace App\Conversations;

use App\Empanadas\DespachadorEmpanadas;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class EmpanadasConversation extends Conversation
{
    /**
     * Process the empanada
     */
    private $receptores;

    private $userId;

    public function procesarEmpanada()
    {

        $mensaje = $this->bot->getMessage()->getText();

        if (preg_match_all('/@\w{1,9}/', $mensaje, $matches)) {
            $this->receptores = $matches[0];

            foreach ($this->receptores as $match)
                $this->bot->reply('Le mandaste empanada a ' . $match);

            $this->userId = '@' . $this->bot->getUser()->getId();
            $this->bot->reply('Tu user id es ' . $this->userId);

            if (in_array($this->userId, $matches))
                $this->bot->reply('No te puedes dar empanadas a ti mismo!');

            $empanadasYMensajes = array_merge($this->receptores, [':dumpling:']);
            $justificacion = trim(str_replace($empanadasYMensajes, '', $mensaje));

            if (!$justificacion)
                $this->bot->reply('Debes enviar un mensaje con tu empanada');

            $userInfo = $this->bot->userStorage()->find($this->userId);
            if (!$userInfo) {
                $this->bot->userStorage()->save([
                    'empanadas' => 0,
                ], $this->userId);
                $userInfo = $this->bot->userStorage()->find($this->userId);
            }

            preg_match_all('/:dumpling:/', $mensaje,$matchEmpanadas);

            $despachadorEmpanadas = new DespachadorEmpanadas($this->userId, $this->receptores, $this->bot);
            $despachadorEmpanadas->darEmpanadas(count($matchEmpanadas[0]));

        } else
            $this->bot->reply('Debes nombrar a quien quieres darle tu empanada en el mismo mensaje');

    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->procesarEmpanada();
    }
}
