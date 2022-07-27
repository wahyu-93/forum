<?php

namespace App\Models;

use App\Models\Forum\Reply;
use App\Models\Forum\Thread;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hash',
        'username',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }   

    public function avatar($size = '200')
    {
        if($this->avatar){
            return 'storage/'.$this->avatar;
        }
        else{
            return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=mm&s=" . $size;
        };
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function usernameOrHash()
    {
        return $this->username ?: $this->hash;
    }
}
