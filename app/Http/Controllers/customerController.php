<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\customerModel;

class customerController extends Controller
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
    $dataCustomer = customerModel::all();

    $kelasJasa ='class="inactive"';
    $kelasBarang='class="inactive"';
    $kelasSupplier='class="inactive"';
    $gudang='class="inactive"';
    $kelasPegawai='class="inactive"';
    $kelasKantor='class="inactive"';
    $kelasCustomer='class="active"';
    $gudangAmb='class="inactive"';
    $gudangEc='class="inactive"';
    $gudangInt='class="inactive"';

    return view('laundry/customer',['dataCustomer'=>$dataCustomer ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

  }

  public function insertCustomer(Request $request)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    $jum = customerModel::count();
    $temp = "CUST" . str_pad($jum+1,8,"0",STR_PAD_LEFT);
    customerModel::create([
      'ID_CUSTOMER'=>$temp,
      'JENIS_CUSTOMER' => $request->input('jenis'),
      'NAMA_CUSTOMER'=>$request->input('namaCustomer'),
      'ALAMAT_CUSTOMER'=>$request->input('alamatCustomer'),
      'TELP_CUSTOMER'=>$request->input('telpCustomer'),
      'KETERANGAN_CUSTOMER'=>$request->input('ketCustomer'),
      'STATUS_CUSTOMER'=>'1',
    ]);

      return redirect('customer');
  }

  public function editCustomer($id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    $dataCustomer = customerModel::where('ID_CUSTOMER','=',$id)->get();

      $kelasJasa ='class="inactive"';
      $kelasBarang='class="inactive"';
      $kelasSupplier='class="inactive"';
      $gudang='class="inactive"';
      $kelasPegawai='class="inactive"';
      $kelasKantor='class="inactive"';
      $kelasCustomer='class="active"';
      $gudangAmb='class="inactive"';
      $gudangEc='class="inactive"';
      $gudangInt='class="inactive"';


      return view('laundry/editCustomer',['dataCustomer'=>$dataCustomer ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
  }

  public function updateCustomer(Request $request,$id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
    customerModel::where('ID_CUSTOMER','=',$id)->update([
      'NAMA_CUSTOMER'=>$request->namaCustomer,
      'ALAMAT_CUSTOMER'=>$request->alamatCustomer,
      'TELP_CUSTOMER'=>$request->telpCustomer,
      'KETERANGAN_CUSTOMER'=>$request->ketCustomer,
      'STATUS_CUSTOMER'=>$request->statusCustomer
    ]);


    return redirect('customer');
  }

  public function deleteCustomer($id)
  {
    $userNow = session('user');
    $role = session()->get('role');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    if ( $role!='admin') {
      return redirect('/transaksi/penjualan');
    }
      customerModel::where('ID_CUSTOMER','=',$id)->delete();
      return redirect('customer');
  }

}
