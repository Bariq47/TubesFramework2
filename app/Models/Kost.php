<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'description','image'
    ];



    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
