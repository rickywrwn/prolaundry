<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supplierModel extends Model
{
    protected $table ='supplier';
    public $timestamps =false;
    protected $fillable =['ID_SUPPLIER','NAMA_SUPPLIER','ALAMAT_SUPPLIER','TELP_SUPPLIER','NAMA_CP','TELP_CP','KETERANGAN_SUPPLIER','STATUS_SUPPLIER'];
}
