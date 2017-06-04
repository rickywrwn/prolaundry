<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gudangModel extends Model
{
  protected $table ='gudang';
  public $timestamps =false;
  protected $fillable =['ID_KANTOR','ID_BARANG','STOK_BARANG'];

  public function kantor()
  {
    return $this->belongsTo('App\Models\kantorModel','ID_KANTOR','ID_KANTOR');
  }
}
