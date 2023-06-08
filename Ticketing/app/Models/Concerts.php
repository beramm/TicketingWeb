<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concerts extends Model
{
    use HasFactory;
    protected $table = 'concerts';
    protected $primaryKey = 'idKonser';
    public function Vendors(){
        return $this->belongsTo(Vendors::class, 'idVendor', 'idVendor');
    }
    public function Categories(){
        return $this->belongsTo(Categories::class, 'idKategori', 'idKategori');
    }
}
