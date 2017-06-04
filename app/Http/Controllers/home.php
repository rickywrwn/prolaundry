<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Carbon\Carbon;
use App\Models\barangModel;
use App\Models\gudangModel;
use App\Models\kantorModel;
use App\Models\hjual;
use App\Models\hbeli;

class home extends Controller
{
    public function index()
    {
      $userNow = session('user');
      $kantor = session('kantor');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      if ($kantor != 'admin') {
        $dataGudang = gudangModel::where([['ID_KANTOR','=',$kantor],['STOK_BARANG','<=','5']])->get();
        $dataPenjualan = hjual::where([['STATUS','=','Diproses'],['ID_KANTOR','=',$kantor]])->get();
      }else{
        $dataGudang = gudangModel::where('STOK_BARANG','<=','5')->get();
        $dataPenjualan = hjual::where('STATUS','=','Diproses')->get();
      }
      $dataBarang = barangModel::all();
      $kelasJasa ='class="inactive"';
      $kelasBarang='class="active"';
      $kelasSupplier='class="inactive"';
      $gudang='class="inactive"';
      $kelasPegawai='class="inactive"';
      $kelasKantor='class="inactive"';
      $kelasCustomer='class="inactive"';
      $gudangAmb='class="inactive"';
      $gudangEc='class="inactive"';
      $gudangInt='class="inactive"';

      return view('laundry/home',['dataPenjualan'=>$dataPenjualan, 'dataGudang'=>$dataGudang ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }

    public function transSelesai($id)
    {
      Carbon::setLocale('id');
      hjual::where('ID_NOTA','=',$id)->update([
        'TGL_SELESAI'=>Carbon::now('Asia/Jakarta')->toDateString(),
        'STATUS'=>'Selesai'
    ]);
    //belum ada session sukses
    return redirect('homepage');
    }
}
