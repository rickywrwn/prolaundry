<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
  protected $table ='master_barang';
  public $timestamps =false;
  protected $fillable =['ID_BARANG','NAMA_BARANG','SATUAN_BARANG','KETERANGAN_BARANG','STATUS_BARANG'];
}
