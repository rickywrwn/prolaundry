<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\gudangModel;
use App\Models\kantorModel;
use App\Models\barangModel;

class gudangController extends Controller
{

  public function index($jenis)
  {
    $userNow = session('user');
    if (!$userNow) {
      return redirect('/masuk/');
    }
    $gudangAmb='class="inactive"';
    $gudangInt='class="inactive"';
    $gudangEc='class="inactive"';

    if ($jenis=="ambengan") {
      $dataGudang = gudangModel::where('ID_KANTOR','=','KNTR00000001')->get();
      $gudangAmb='class="active"';$lokasi="Ambengan";
    }elseif ($jenis=="intiland") {
      $dataGudang = gudangModel::where('ID_KANTOR','=','KNTR00000002')->get();
      $gudangInt='class="active"';$lokasi="Intiland";
    }elseif ($jenis=="east") {
      $dataGudang = gudangModel::where('ID_KANTOR','=','KNTR00000003')->get();
      $gudangEc='class="active"';$lokasi="East Coast";
    }

    $dataKantor=kantorModel::all();
    $dataBarang = barangModel::all();
    $kelasJasa ='class="inactive"';
    $kelasBarang='class="active"';
    $kelasSupplier='class="inactive"';
    $gudang='class="inactive"';
    $kelasPegawai='class="inactive"';
    $kelasKantor='class="inactive"';
    $kelasCustomer='class="inactive"';

    return view('laundry/gudang/stokGudang',['dataBarang'=>$dataBarang,'dataKantor'=>$dataKantor,'dataGudang'=>$dataGudang ,'lokasi'=>$lokasi, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

  }


}
