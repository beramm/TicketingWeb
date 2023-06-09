<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concerts extends Model
{
    use HasFactory;
    protected $table = 'concerts';

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query,$category){
            return $query->whereHas('Categories',function($query) use ($category){
                $query->where('slug',$category);
            });
        });
    }
    public function Vendors()
    {
        return $this->belongsTo(Vendors::class);
    }
    public function Categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function Tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}
