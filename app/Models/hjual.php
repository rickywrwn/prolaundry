<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hjual extends Model
{
  protected $table ='h_jual';
  public $timestamps =false;
  protected $fillable =['ID_NOTA','ID_PEGAWAI','ID_CUSTOMER','ID_KANTOR','TGL_JUAL','TGL_SELESAI','TGL_AMBIL','JAM','JAM_SELESAI','JAM_AMBIL','KETERANGAN_JUAL','HARGA_TOTAL_JUAL','STATUS'];
  public function details()
  {
    return $this->hasMany('App\Models\djual','ID_NOTA','ID_NOTA');
  }
}
