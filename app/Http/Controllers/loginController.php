<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\kantorModel;
use App\Models\userModel;
use App\Models\pegawaiModel;

class loginController extends Controller
{
    public function index()
    {
      return view('laundry/login');
      // $data = session()->all();
      //   dd($data);
    }

    public function login(Request $request)
    {
      $dataUser = userModel::all();
      $dataPegawai = pegawaiModel::all();
      $dataKantor = kantorModel::all();
      $cek = false;
      foreach ($dataUser as $arr ){
        if ($arr->username == $request->input("username") && $arr->password == $request->input("password") ) {
          $cek = true;
          session(['user' =>$arr->ID_PEGAWAI]);
          if ($arr->ROLE != '1') {
            session(['kantor' =>$arr->ID_KANTOR]);
            session(['role' => 'karyawan']);
            foreach ($dataPegawai as $arrPeg ){
              if ($arrPeg->ID_PEGAWAI == $arr->ID_PEGAWAI) {
                session(['name' => $arrPeg->NAMA_PEGAWAI]);
              }
            }
            foreach ($dataKantor as $arrKantor ){
              if ($arrKantor->ID_KANTOR == $arr->ID_KANTOR) {
                session(['namaKantor' => $arrKantor->NAMA_KANTOR]);
              }
            }
          }else{
              session(['kantor' => 'admin']);
              session(['role' => 'admin']);
              session(['name' => $arr->username]);
          }
        }
      }

      if ($cek == true) {
        return redirect('laundry/homepage');
      }else{
        return view('laundry/login');
      }

    }

    public function logout()
    {
      session()->flush();
        return redirect('/masuk/');
    }


}
