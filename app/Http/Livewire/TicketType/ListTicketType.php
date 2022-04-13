<?php

namespace App\Http\Livewire\TicketType;

use App\Http\Traits\WithSorting;
use App\Models\Event;
use App\Models\TicketType;
use Livewire\Component;
use Livewire\WithPagination;

class ListTicketType extends Component
{
    use WithPagination;
    use WithSorting;
    public $label = 'Boleto';
    public $label_plural = 'Boletos';
    public $event_id;

    protected $listeners = [
        'renderListTicketType' => 'render',
        'resetListTicketType' => 'resetList'
    ];

    public function mount(Event $event)
    {       
        $this->event=$event;
    }
    

    public function render()
    {    
        
        $ticket_types=$this->event->ticket_types()->paginate(20);
        return view('livewire.ticket-type.list-ticket-type', [            
            'data' => $ticket_types,            
                      
        ]);
    }
}
