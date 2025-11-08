<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Auth\Database\Factories\LoginAccessFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LoginAccess extends Authenticatable
{
   use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'admin_logins'; // Custom Table Name

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // protected static function newFactory(): LoginAccessFactory
    // {
    //     // return LoginAccessFactory::new();
    // }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
