<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected  $primaryKey = 'client_id';
    protected $fillable = [
        "client_name", "phone_number" , "email" , "fk_case_id" ,"fk_lawyers_id"
        ];

    public function cases()
    {
        return $this->hasMany('App\Lawcase');
    }
}
