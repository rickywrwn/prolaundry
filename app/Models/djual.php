<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class djual extends Model
{
  protected $table ='d_jual';
  public $timestamps =false;
  protected $fillable =['ID_NOTA','ID_JASA','HARGA_JUAL','SUBTOTAL_JUAL','QTY_JUAL'];
  public function header()
  {
    return $this->belongsTo('App\Models\hjual','ID_NOTA','ID_NOTA');
  }
}
