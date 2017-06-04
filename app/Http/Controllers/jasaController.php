<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\jasaModel;

class jasaController extends Controller
{
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
      $dataJasa= jasaModel::all();
      $kelasJasa ='class="active"';
      $kelasBarang='class="inactive"';
      $kelasSupplier='class="inactive"';
      $gudang='class="inactive"';
      $kelasPegawai='class="inactive"';
      $kelasKantor='class="inactive"';
      $kelasCustomer='class="inactive"';
      $gudangAmb='class="inactive"';
      $gudangEc='class="inactive"';
      $gudangInt='class="inactive"';

      return view('laundry/jasa',['dataJasa'=>$dataJasa , 'kelasKantor'=>$kelasKantor,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }

    public function insertJasa(Request $request)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      $id = $request->input('idJasa');
      $nama = $request->input('namaJasa');
      $dry = $request->input('hargaDry');
      $satuan = $request->input('satuan');
      $wet = $request->input('hargaWet');
      $pressing = $request->input('hargaPressing');
      $wetSaja = $request->input('hargaWetSaja');
      $setrika = $request->input('hargaSetrika');
      $ket = $request->input('ketJasa');

      $jum = jasaModel::count();
      $temp = "JASA" . str_pad($jum+1,8,"0",STR_PAD_LEFT);
      jasaModel::create([
      'ID_JASA'=>$temp,
      'NAMA_JASA'=>$nama,
      'HARGA_JASA'=>$dry,
      'SATUAN_JASA'=>$satuan,
      'KETERANGAN_JASA'=>$ket,
      'STATUS_JASA'=>'1'
      ]);

      return redirect('jasa');
    }

    public function editJasa($id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      $dataJasa=jasaModel::where('ID_JASA','=',$id)->get();
      $kelasJasa ='class="active"';
      $kelasBarang='class="inactive"';
      $kelasSupplier='class="inactive"';
      $gudang='class="inactive"';
      $kelasPegawai='class="inactive"';
      $kelasKantor='class="inactive"';
      $kelasCustomer='class="inactive"';
      $gudangAmb='class="inactive"';
      $gudangEc='class="inactive"';
      $gudangInt='class="inactive"';

      return view('laundry/editJasa',['dataJasa'=>$dataJasa , 'kelasKantor'=>$kelasKantor,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }

    public function updateJasa(Request $request,$id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
        jasaModel::where('ID_JASA','=',$id)->update([
          'NAMA_JASA'=>$request->namaJasa,
          'HARGA_JASA'=>$request->hargaDry,
          'SATUAN_JASA'=>$request->satuan,
          'KETERANGAN_JASA'=>$request->ketJasa,
          'STATUS_JASA'=>$request->statusJasa
      ]);
      //belum ada session sukses
      return redirect('jasa');
    }

    public function deleteJasa($id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      jasaModel::where('ID_JASA','=',$id)->delete();
      return redirect('jasa');
    }

}
