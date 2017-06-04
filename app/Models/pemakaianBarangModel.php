<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemakaianBarangModel extends Model
{
  protected $table ='pemakaian_barang';
  public $timestamps = false;
  protected $fillable =['ID_PEMAKAIAN','ID_PEGAWAI','TANGGAL','JAM','KETERANGAN','ID_KANTOR'];


}
