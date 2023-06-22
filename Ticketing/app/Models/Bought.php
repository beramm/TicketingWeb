<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    use HasFactory;
    protected $table = 'bought';
    public $timestamps = true;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Tickets(){
        return $this->belongsTo(Tickets::class);
    }
    public function Visitors(){
        return $this->belongsTo(Visitors::class);
    }

    protected $guarded = [
        'id'
    ];
}
