<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Bought()
    {
        return $this->hasMany(Bought::class);
    }
}
