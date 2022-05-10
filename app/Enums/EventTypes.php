<?php

namespace App\Enums;


enum EventTypes: string
{
    case MOVIE = 'movie';
    case EVENT = 'event';
    case SPORT = 'sport';

    public function title(): string
    {

        return  match ($this) {
            EventTypes::MOVIE => 'Peliculas',
            EventTypes::EVENT => 'Eventos',
            EventTypes::SPORT => 'Deportes',
        };
    }
    
}
