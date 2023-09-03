<?php

namespace App\Enums;

enum EventStatus: string
{
    case DRAFT = 'draft';
    case INPROGRESS = 'in-progress';
    case FINALIZED = 'finalized';

    public function title(): string
    {
        return  match ($this) {
            EventStatus::DRAFT => 'Borrador',
            EventStatus::INPROGRESS => 'En Progreso',
            EventStatus::FINALIZED => 'Finalizado',
        };
    }

    public function color(): string
    {
        return  match ($this) {
            EventStatus::DRAFT => 'blue',
            EventStatus::INPROGRESS => 'green',
            EventStatus::FINALIZED => 'gray',
        };
    }
}
