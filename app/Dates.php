<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{
    protected $table = 'dates';
    protected $primerykey = 'prevdate_id';
    protected $fillable = ["fk_case_id" , "prev_date"];

    public function cases()
    {
        return $this->belongsTo('App\Lawcase');
    }
}
