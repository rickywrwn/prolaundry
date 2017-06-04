<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests;
use App\Models\gudangModel;
use App\Models\kantorModel;
use App\Models\barangModel;
use App\Models\pegawaiModel;
use App\Models\pemakaianBarangModel;
use App\Models\detailPemakaian;

class pemakaianController extends Controller
{
    public function index()
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      $dataGudang= kantorModel::all();
      $dataBarang =barangModel::all();
      $dataPegawai = pegawaiModel::all();
      $dataStok = gudangModel::all();
      $dataPemakaian = pemakaianBarangModel::all();
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

      return view('laundry/transaksi/pemakaian',['dataPegawai'=>$dataPegawai,'dataStok'=>$dataStok,'dataPemakaian'=>$dataPemakaian,'dataBarang'=>$dataBarang, 'dataGudang'=>$dataGudang , 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function insertPemakaian(Request $request)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      Carbon::setLocale('id');

      $jum = pemakaianBarangModel::count();
      $temp = "PMKI" . str_pad($jum+1,8,"0",STR_PAD_LEFT);
      $mencukupi = 0;
      $arrStok = [];
      $id = $request->input('idBarang');
      $qty = $request->input('quantity');
      $count = count($id);
      $role = session()->get('role');

      if ( $role!='admin') {
        $kantor = session('kantor');
      }else{
        $kantor =$request->input('idGudang');
      }

      for($i = 0; $i < $count; $i++){

        $stok = gudangModel::where([['ID_KANTOR','=',$kantor],['ID_BARANG','=',$id[$i]]])->select('STOK_BARANG')->get();

        foreach ($stok as $arr_stok ){
          $stokbrg=$arr_stok->STOK_BARANG;
          $arrStok[$i] = $stokbrg;

        }
        if ($arrStok[$i] >= $qty[$i]) {
          $mencukupi++;
        }
      }

      if ($mencukupi == $count) {
        pemakaianBarangModel::create([
          'ID_PEMAKAIAN'=>$temp,
          'ID_PEGAWAI'=>$request->input('idPegawai'),
          'TANGGAL'=>Carbon::now('Asia/Jakarta')->toDateString(),
          'JAM'=>Carbon::now('Asia/Jakarta')->toTimeString(),
          'KETERANGAN'=>$request->input('keterangan'),
          'ID_KANTOR'=>"KNTR00000001"
        ]);

        // detail
        for($i = 0; $i < $count; $i++){

          detailPemakaian::create([
            'ID_PEMAKAIAN'=>$temp,
            'ID_BARANG'=>$id[$i],
            'QTY'=>$qty[$i]
          ]);
              $jml = gudangModel::where([['ID_KANTOR','=','KNTR00000001'],['ID_BARANG','=',$id[$i]]])->select('STOK_BARANG')->get();
              foreach ($jml as $arr ){
                $jumlah=$arr->STOK_BARANG;
              }
              $tot = $jumlah - $qty[$i];

              gudangModel::where([['ID_KANTOR','=','KNTR00000001'],['ID_BARANG','=',$id[$i]]])->update([
                'STOK_BARANG'=>$tot
              ]);

        }

          return redirect('transaksi/pemakaian');
      }
      else{
        echo "tstok tidak cukup";
      }

    }
    public function showPemakaian($id)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      $dataGudang= kantorModel::all();
      $dataBarang =barangModel::all();
      $dataStok = gudangModel::all();
      $dataPemakaian = pemakaianBarangModel::where('ID_PEMAKAIAN','=',$id)->get();
      $detail = detailPemakaian::where('ID_PEMAKAIAN','=',$id)->get();
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

      return view('laundry/transaksi/showPemakaian',['detail'=>$detail,'dataStok'=>$dataStok,'dataPemakaian'=>$dataPemakaian,'dataBarang'=>$dataBarang, 'dataGudang'=>$dataGudang , 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }
    public function back()
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      return redirect('transaksi/pemakaian');
    }

}
