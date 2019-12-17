<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected  $primaryKey = 'task_id';

    protected $fillable = [
       "task_date" , "task_time" , "task_detail" 
        ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
