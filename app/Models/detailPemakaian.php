<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailPemakaian extends Model
{
  protected $table ='detail_pemakaian';
  public $timestamps =false;
  protected $fillable =['ID_PEMAKAIAN','ID_BARANG','QTY'];
}
