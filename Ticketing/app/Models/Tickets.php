<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    // protected $table = 'tickets';
    protected $guarded = ['id'];

    public function Concerts()
    {
        return $this->belongsTo(Concerts::class, 'concerts_id');
    }
    public function Bought()
    {
        return $this->hasMany(Bought::class);
    }
}
