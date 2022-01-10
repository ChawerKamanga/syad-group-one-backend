<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaultReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fault_id',
        'is_solved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fault()
    {
        return $this->belongsTo(Fault::class);
    }
}
