<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Raffle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'draw_date',
        'ticket_price',
        'total_tickets'];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    protected function casts(): array{  //Así, lo transforma automáticamente
        return [
            'draw_date' => 'datetime',
            'is_active' => 'boolean'
        ];
    }
}
