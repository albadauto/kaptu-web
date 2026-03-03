<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'users_name',
        'users_email',
        'users_email_verified_at',
        'users_password',
        'users_plans_id',
        'remember_token'
    ];

    public function plans(){
        return $this->belongsTo(Plans::class);
    }
    public function premiumUsers(){
        return $this->hasOne(PremiumUsers::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
