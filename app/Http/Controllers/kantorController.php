<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\kantorModel;

class kantorController extends Controller
{
  //kantor
  public function index()
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
   $dataCabang = kantorModel::all();

   $kelasJasa ='class="inactive"';
   $kelasBarang='class="inactive"';
   $kelasSupplier='class="inactive"';
   $gudang='class="inactive"';
   $kelasPegawai='class="inactive"';
   $kelasKantor='class="active"';
   $kelasCustomer='class="inactive"';
   $gudangAmb='class="inactive"';
   $gudangEc='class="inactive"';
   $gudangInt='class="inactive"';
   return view('laundry/kantor',['dataCabang'=>$dataCabang , 'kelasKantor'=>$kelasKantor, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt,'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
  }

  public function insertKantor(Request $request)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }

    $id = $request->input('idKantor');
    $nama = $request->input('namaKantor');
    $alamat = $request->input('alamatKantor');
    $telp = $request->input('telpKantor');
    $keterangan = $request->input('ketKantor');

    $jum = kantorModel::count();
    $temp = "KNTR" . str_pad($jum+1,8,"0",STR_PAD_LEFT);
    kantorModel::create([
    'ID_KANTOR'=>$temp,
    'NAMA_KANTOR'=>$nama,
    'ALAMAT_KANTOR'=>$alamat,
    'TELP_KANTOR'=>$telp,
    'KETERANGAN_KANTOR'=>$keterangan,
    'STATUS_KANTOR'=>'1'
    ]);

    return redirect('kantor');
  }

  public function editKantor($id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    $dataCabang=kantorModel::where('ID_KANTOR','=',$id)->get();

    $kelasJasa ='class="inactive"';
    $kelasBarang='class="inactive"';
    $kelasSupplier='class="inactive"';
    $gudang='class="inactive"';
    $kelasPegawai='class="inactive"';
    $kelasKantor='class="active"';
    $kelasCustomer='class="inactive"';
    $gudangAmb='class="inactive"';
    $gudangEc='class="inactive"';
    $gudangInt='class="inactive"';

    return view('laundry/editKantor',['dataCabang'=>$dataCabang , 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
}
  public function updateKantor(Request $request,$id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
      kantorModel::where('ID_KANTOR','=',$id)->update([
      'NAMA_KANTOR'   => $request->namaKantor,
      'ALAMAT_KANTOR' => $request->alamatKantor,
      'TELP_KANTOR' => $request->telpKantor,
      'KETERANGAN_KANTOR' => $request->ketKantor
    ]);
    //belum ada session sukses
    return redirect('kantor');
  }

  public function deleteKantor($id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    $mKantor= kantorModel::where('ID_KANTOR', '=' ,$id);
    $mKantor->delete();

    return redirect('kantor');
  }

}
