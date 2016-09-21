<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;

class User extends CartalystsUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'permissions',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
// use Sentinel\Middleware\SentryAuth;
// use Sentinel\Middleware\SentryAdminAccess;
// use Sentinel\Middleware\SentryMember;
