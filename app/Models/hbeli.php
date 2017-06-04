<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hbeli extends Model
{
    protected $table ='h_beli';
    public $timestamps =false;
    protected $fillable =['ID_BELI','ID_KANTOR','ID_SUPPLIER','TGL_BELI','JAM','HARGA_BELI_TOTAL','KETERANGAN'];

    public function details()
    {
      return $this->hasMany('App\Models\dbeli','ID_BELI','ID_BELI');
    }
}
