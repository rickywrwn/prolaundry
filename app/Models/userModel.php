<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
  protected $table ='user';
  public $timestamps =false;
  protected $fillable =['USERNAME','PASSWORD','ROLE','ID_PEGAWAI','ID_KANTOR','STATUS'];
}
