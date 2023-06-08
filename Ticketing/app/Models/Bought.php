<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    use HasFactory;
    protected $table = 'bought';
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Categories(){
        return $this->belongsTo(Tickets::class);
    }
}
