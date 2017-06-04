<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\pegawaiModel;
use App\Models\kantorModel;

class pegawaiController extends Controller
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
      $dataPegawai = pegawaiModel::all();
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

      return view('laundry/pegawai',['dataKantor'=>$dataKantor,'dataPegawai'=>$dataPegawai ,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function insertPegawai(Request $request)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      $jum = pegawaiModel::count();
      $temp = "PEGW" . str_pad($jum+1,8,"0",STR_PAD_LEFT);

      pegawaiModel::create([
      'ID_PEGAWAI'=>$temp,
      'ID_KANTOR'=>$request->input('idKantor'),
      'NAMA_PEGAWAI'=>$request->input('namaPegawai'),
      'ALAMAT_PEGAWAI'=>$request->input('alamatPegawai'),
      'TELP_PEGAWAI'=>$request->input('telpPegawai'),
      'KET_PEGAWAI'=>$request->input('ketPegawai'),
      'STATUS_PEGAWAI'=>'1'
      ]);

      return redirect('pegawai');
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

    public function deletePegawai($id)
    {
      $userNow = session('user');
      $role = session()->get('role');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      if ( $role!='admin') {
        return redirect('/transaksi/penjualan');
      }
      pegawaiModel::where('ID_PEGAWAI','=',$id)->delete();
      return redirect('pegawai');
    }
}
