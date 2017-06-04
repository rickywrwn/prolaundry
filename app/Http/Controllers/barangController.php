<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\barangModel;
use App\Models\gudangModel;
use App\Models\kantorModel;

class barangController extends Controller
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

      return view('laundry/barang',['dataBarang'=>$dataBarang ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function insertBarang(Request $request)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }

      $jum = barangModel::count();
      $temp = "BRNG" . str_pad($jum+1,8,"0",STR_PAD_LEFT);
      barangModel::create([
      'ID_BARANG'=>$temp,
      'NAMA_BARANG'=>$request->input('namaBarang'),
      'SATUAN_BARANG'=>$request->input('satuanBarang'),
      'KETERANGAN_BARANG'=>$request->input('ketBarang'),
      'STATUS_BARANG'=>'1'
      ]);

      return redirect('barang');
    }

    public function editBarang($id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }

      $dataBarang=barangModel::where('ID_BARANG','=',$id)->get();
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

      return view('laundry/editBarang',['dataBarang'=>$dataBarang ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }

    public function updateBarang(Request $request,$id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }

        barangModel::where('ID_BARANG','=',$id)->update([
          'NAMA_BARANG'=>$request->namaBarang,
          'SATUAN_BARANG'=>$request-satuanBarang,
          'KETERANGAN_BARANG'=>$request->ketBarang,
          'STATUS_BARANG'=>$request->statusBarang
      ]);
      //belum ada session sukses
      return redirect('barang');
    }

    public function deleteBarang($id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      
      barangModel::where('ID_BARANG','=',$id)->delete();
      return redirect('barang');
    }

}
