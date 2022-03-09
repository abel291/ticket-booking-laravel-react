<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class TicketTypeDate extends Model
{
    use HasFactory;
    
    public function payment()
    {
        return  $this->belongsTo(Payment::class);
    }
}
