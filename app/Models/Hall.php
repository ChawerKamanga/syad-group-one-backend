<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_name',
        'max_students',
        'is_at_camp',
        'gender',
        'is_for_disability',
        'slug'
    ];

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($hall) {
            $hall->slug = $hall->initSlug($hall->hall_name);
            $hall->save();
        });
    }

    private function initSlug($hallName)
    {
        if (static::whereSlug($slug = Str::slug($hallName))->exists()) {
            $max = static::whereName($hallName)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-1";
        }

        return $slug;
    }
}
