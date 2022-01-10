<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Fault extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'fault_name',
        'description',
        'is_common',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($fault) {
            $fault->slug = $fault->initSlug($fault->fault_name);
            $fault->save();
        });
    }

    private function initSlug($faultName)
    {
        if (static::whereSlug($slug = Str::slug($faultName))->exists()) {
            $max = static::whereName($faultName)->latest('id')->skip(1)->value('slug');
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
