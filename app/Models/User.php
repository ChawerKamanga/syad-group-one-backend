<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fullname',
        'email',
        'reg_number',
        'program_id',
        'year_of_study',
        'payment_photo',
        'phonenumber',
        'is_admin',
        'role_id',
        'gender',
        'has_disability',
        'password',
        'is_allocated',
        'profile_pic',
        'slug'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function allocation()
    {
        return $this->hasOne(Allocation::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);   
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->slug = $user->initSlug($user->fullname);
            $user->save();
        });
    }

    private function initSlug($fullname)
    {
        if (static::whereSlug($slug = Str::slug($fullname))->exists()) {
            $max = static::whereName($fullname)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-1";
        }

        return $slug;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shouldBeSearchable()
    {
        return $this->is_admin === 0;
    }    
}
