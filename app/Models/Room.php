<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'max_students',
        'floor_number'
    ];

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    public function halls()
    {
        return $this->belongsToMany(Hall::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
