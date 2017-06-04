<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pegawaiModel extends Model
{
  protected $table ='pegawai';
  public $timestamps =false;
  protected $fillable =['ID_PEGAWAI','ID_KANTOR','NAMA_PEGAWAI','ALAMAT_PEGAWAI','TELP_PEGAWAI','KET_PEGAWAI','STATUS_PEGAWAI'];


}
