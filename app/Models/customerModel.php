<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
  protected $table ='customer';
  public $timestamps =false;
  protected $fillable =['ID_CUSTOMER','JENIS_CUSTOMER','NAMA_CUSTOMER','ALAMAT_CUSTOMER','TELP_CUSTOMER','KETERANGAN_CUSTOMER','STATUS_CUSTOMER'];
}
