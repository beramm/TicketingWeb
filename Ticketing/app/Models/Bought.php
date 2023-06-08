<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    use HasFactory;
    protected $table = 'bought';
    protected $primaryKey = 'idBought';
    public function Vendors(){
        return $this->belongsTo(Vendors::class, 'idUser', 'idUser');
    }
    public function Categories(){
        return $this->belongsTo(Tickets::class, 'idTiket', 'idTiket');
    }
}
