<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\pegawaiModel;
use App\Models\kantorModel;
use App\Models\userModel;

class userController extends Controller
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
      $dataPegawai= pegawaiModel::all();
      $dataKantor= kantorModel::all();
      $dataUser= userModel::all();
      $gudangAmb='class="inactive"';
      $gudangInt='class="inactive"';
      $gudangEc='class="inactive"';
      $kelasJasa ='class="inactive"';
      $kelasBarang='class="active"';
      $kelasSupplier='class="inactive"';
      $gudang='class="inactive"';
      $kelasPegawai='class="inactive"';
      $kelasKantor='class="inactive"';
      $kelasCustomer='class="inactive"';

      return view('laundry/admin/user',['dataUser'=>$dataUser,'dataPegawai'=>$dataPegawai,'dataKantor'=>$dataKantor,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function insertUser(Request $request)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      userModel::create([
      'USERNAME'=>$request->input('username'),
      'PASSWORD'=>$request->input('password'),
      'ROLE'=>$request->input('admin'),
      'ID_KANTOR'=>$request->input('idKantor'),
      'ID_PEGAWAI'=>$request->input('idPegawai'),
      'STATUS'=>'1'
      ]);

      return redirect('admin/user');
    }

    public function editPegawai($id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      $dataPegawai=pegawaiModel::where('ID_PEGAWAI','=',$id)->get();
      $dataKantor = kantorModel::all();
      $kelasJasa ='class="inactive"';
      $kelasBarang='class="inactive"';
      $kelasSupplier='class="inactive"';
      $gudang='class="inactive"';
      $kelasPegawai='class="active"';
      $kelasKantor='class="inactive"';
      $kelasCustomer='class="inactive"';
      $gudangAmb='class="inactive"';
      $gudangEc='class="inactive"';
      $gudangInt='class="inactive"';

      return view('laundry/editPegawai',['dataKantor'=>$dataKantor,'dataPegawai'=>$dataPegawai , 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }

    public function updatePegawai(Request $request,$id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
        pegawaiModel::where('ID_PEGAWAI','=',$id)->update([
          'ID_KANTOR'=>$request->idKantor,
          'ALAMAT_PEGAWAI'=>$request->alamatPegawai,
          'NAMA_PEGAWAI'=>$request->namaPegawai,
          'TELP_PEGAWAI'=>$request->telpPegawai,
          'KET_PEGAWAI'=>$request->ketPegawai,
          'STATUS_PEGAWAI'=>$request->statusPegawai
      ]);
      //belum ada session sukses
      return redirect('pegawai');
    }
}
