<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kantorModel extends Model
{
      protected $table ='kantor';
      public $timestamps =false;
      protected $fillable =['ID_KANTOR','NAMA_KANTOR','ALAMAT_KANTOR','TELP_KANTOR','KETERANGAN_KANTOR','STATUS_KANTOR'];
      //$guarded blacklist

      public function gudang()
      {
        return $this->hasOne('App\Models\gudangModel','ID_KANTOR','ID_KANTOR');
      }
}
