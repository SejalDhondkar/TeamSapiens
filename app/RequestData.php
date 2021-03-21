<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestData extends Model
{
    protected $table = 'request';
    protected $fillable = ['id','hosp_id','name','age','contact','addr','diabetes','pulse','covid','status'];
    protected $primaryKey = 'id';

}
