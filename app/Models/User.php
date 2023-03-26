<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unique_id',
        'firstname',
        'lastname',
        'age',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'password',
        'api_token',
        'created_at',
        'updated_at',
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerUser(Array $user)
    {
        $result = $this->create([
                        'firstname' => $user['firstname'],
                        'unique_id' => Str::random(20),
                        'lastname' => $user['lastname'],
                        'age' => $user['age'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'password' => bcrypt($user['password']),
                    ]);

        if($result)
        {
            return true;
        }

        return false;
    }
}
