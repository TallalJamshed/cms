<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primerykey = 'invoice_id';
    protected $fillable = ["fk_case_id" , "fk_client_id" , "invoice_id" , "status" ,"due_amount" , "paid_amount"];

    public function cases()
    {
        return $this->belongsTo('App\Lawcase');
    }
}
