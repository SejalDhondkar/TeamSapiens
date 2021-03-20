<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
  protected $fillable = ['doc_id','name','contact','addr','area'];
  protected $primaryKey = 'doc_id';
}
