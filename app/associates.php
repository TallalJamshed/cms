<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class associates extends Model
{
    protected $table = 'associates';
    protected  $primaryKey = 'assoc_id';
    protected $fillable = [
        "assoc_name","assoc_email","fk_user_id"
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
