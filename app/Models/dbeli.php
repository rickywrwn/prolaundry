<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dbeli extends Model
{
  protected $table ='d_beli';
  public $timestamps =false;
  protected $fillable =['ID_BARANG','ID_BELI','QTY','HARGA_BELI','SUBTOTAL_BELI'];

  public function header()
  {
    return $this->belongsTo('App\Models\hbeli','ID_BELI','ID_BELI');
  }
}
