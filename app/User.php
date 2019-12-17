<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected  $primaryKey = 'user_id';
    protected $fillable = [
        "name","lawfirmname","lawfirmaddress","phone_no", "email", "password", "file_path",
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function associates()
    {
        return $this->hasMany('App\associates');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
