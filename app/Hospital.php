<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitals';
  protected $fillable = ['hosp_id','user_id','name','contact','addr','area','total_beds','vacant_beds','total_vaccines','available_vaccines'];
  protected $primaryKey = 'hosp_id';
}
