<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concerts extends Model
{
    use HasFactory;
    protected $table = 'concerts';
    public function Vendors(){
        return $this->belongsTo(Vendors::class);
    }
    public function Categories(){
        return $this->belongsTo(Categories::class);
    }
    public function Tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}
