<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemakaianModel extends Model
{

  protected $table ='pemakaian';
  public $timestamps =false;
  protected $fillable =['ID_NOTA','ID_GUDANG','ID_BARANG','QTY_PEMAKAIAN'];

}
