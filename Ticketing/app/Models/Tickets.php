<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $primaryKey = 'idTiket';
    public function Tickets(){
        return $this->belongsTo(Tickets::class, 'idKonser', 'idTiket');
    }
}
