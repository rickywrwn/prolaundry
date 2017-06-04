<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jasaModel extends Model
{
  protected $table ='master_jasa';
  public $timestamps =false;
  protected $fillable =['ID_JASA','NAMA_JASA','HARGA_JASA','SATUAN_JASA','KETERANGAN_JASA','STATUS_JASA'];
}
