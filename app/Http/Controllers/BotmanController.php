<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function handle(Request $request)
    {
        // Obtenemos la instancia del bot
        $botman = app('botman');

        // Regla: si el usuario escribe "menu"
        $botman->hears('.*', function (BotMan $bot) {
            $question = Question::create("¿Qué opción querés elegir?")
                ->addButtons([
                    Button::create('Opción A')->value('a'),
                    Button::create('Opción B')->value('b'),
                    Button::create('Opción C')->value('c'),
                ]);
            
            
            $bot->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $opcion = $answer->getValue();
                    $this->say("Elegiste la opción: " . strtoupper($opcion));
                }
            });
            
            
        });

        // Escuchar y procesar los mensajes
        $botman->listen();
    }
}