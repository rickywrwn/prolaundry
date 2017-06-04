<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\supplierModel;

class supplierController extends Controller
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
    $dataSupplier = supplierModel::all();
    $kelasJasa ='class="inactive"';
    $kelasBarang='class="inactive"';
    $kelasSupplier='class="active"';
    $gudang='class="inactive"';
    $kelasPegawai='class="inactive"';
    $kelasKantor='class="inactive"';
    $kelasCustomer='class="inactive"';
    $gudangAmb='class="inactive"';
    $gudangEc='class="inactive"';
    $gudangInt='class="inactive"';

    return view('laundry/supplier',['dataSupplier'=>$dataSupplier ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
  }

  public function insertSupplier(Request $request)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    $jum = supplierModel::count();
    $temp = "SUPP" . str_pad($jum+1,8,"0",STR_PAD_LEFT);

    supplierModel::create([
      'ID_SUPPLIER'=>$temp,
      'NAMA_SUPPLIER'=>$request->namaSupplier,
      'ALAMAT_SUPPLIER'=>$request->alamatSupplier,
      'TELP_SUPPLIER'=>$request->telpSupplier,
      'NAMA_CP'=>$request->namaCP,
      'TELP_CP'=>$request->telpCP,
      'KETERANGAN_SUPPLIER'=>$request->ketSupplier,
      'STATUS_SUPPLIER'=> '1'
    ]);

    return redirect('supplier');
  }

  public function editSupplier($id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    $dataSupplier=supplierModel::where('ID_SUPPLIER','=',$id)->get();
    $kelasJasa ='class="inactive"';
    $kelasBarang='class="inactive"';
    $kelasSupplier='class="active"';
    $gudang='class="inactive"';
    $kelasPegawai='class="inactive"';
    $kelasKantor='class="inactive"';
    $kelasCustomer='class="inactive"';
    $gudangAmb='class="inactive"';
    $gudangEc='class="inactive"';
    $gudangInt='class="inactive"';

    return view('laundry/editSupplier',['dataSupplier'=>$dataSupplier ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

  }

  public function updateSupplier(Request $request,$id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
      supplierModel::where('ID_SUPPLIER','=',$id)->update([
        'NAMA_SUPPLIER'=>$request->namaSupplier,
        'ALAMAT_SUPPLIER'=>$request->alamatSupplier,
        'TELP_SUPPLIER'=>$request->telpSupplier,
        'NAMA_CP'=>$request->namaCP,
        'TELP_CP'=>$request->telpCP,
        'KETERANGAN_SUPPLIER'=>$request->ketSupplier,
        'STATUS_SUPPLIER'=>$request->statusSupplier
    ]);
    //belum ada session sukses
    return redirect('supplier');
  }

  public function deleteSupplier($id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    supplierModel::where('ID_SUPPLIER','=',$id)->delete();
    return redirect('supplier');
  }

}
