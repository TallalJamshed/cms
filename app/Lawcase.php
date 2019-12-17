<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Lawcase extends Model
{
    // use SoftDeletes;
    protected $table = 'cases';
    protected  $primaryKey = 'case_id';
    protected $fillable = [
        "case_title", "case_nature" , "court_name" , "reference" , "previous_date" ,
        "next_date" , "case_status" , "amount" , "fk_client_id" 
        ];

    public function client()
    {
        return $this->belongsTo('App\client');
    }

    public function dates()
    {
        return $this->hasMany('App\Dates');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
}
// , "fk_user_id"