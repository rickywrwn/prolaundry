<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\gudangModel;
use App\Models\supplierModel;
use App\Models\barangModel;
use App\Models\kantorModel;
use App\Models\hbeli;
use App\Models\dbeli;
use Carbon\Carbon;

class beliController extends Controller
{
    public function index(  )
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      $dataPembelian= hbeli::all();
      $dataSupplier= supplierModel::all();
      $dataGudang= kantorModel::all();
      $dataBarang =barangModel::all();
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

      $jum = hbeli::count();
      $temp = "NOTA" . str_pad($jum,8,"0",STR_PAD_LEFT);

      return view('laundry/transaksi/pembelian',['nota'=>$temp,'dataBarang'=>$dataBarang,'dataPembelian'=>$dataPembelian, 'dataGudang'=>$dataGudang ,'dataSupplier'=>$dataSupplier, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function insertPembelian(Request $request)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      Carbon::setLocale('id');

      $hargatot = "";

      for ($i=0; $i < strlen($request->input('hargaTotal')); $i++) {
        if ( substr($request->input('hargaTotal'),$i,1)== '.' ) {

        }else{
        $hargatot = $hargatot.substr($request->input('hargaTotal'),$i,1);
        }
      }

      $jum = hbeli::count();
      $temp = "BELI" . str_pad($jum,8,"0",STR_PAD_LEFT);
      hbeli::create([
        'ID_BELI'=>$temp,
        'ID_KANTOR'=>$request->input('idKantor'),
        'ID_SUPPLIER'=>$request->input('idSupplier'),
        'TGL_BELI'=>Carbon::now('Asia/Jakarta')->toDateString(),
        'JAM'=>Carbon::now('Asia/Jakarta')->toTimeString(),
        'HARGA_BELI_TOTAL'=>$hargatot,
        'KETERANGAN'=>$request->input('keterangan')
      ]);

     $id = $request->input('idBarang');
     $harga= $request->input('harga');
     $qty = $request->input('quantity');
     $sub = $request->input('subtotal');
     $count = count($id);
      for($i = 0; $i < $count; $i++){

        $tempHarga = "";
        $tempSub = "";
        $tempQty="";

        for ($j=0; $j < strlen($harga[$i]); $j++) {
          if ( substr($harga[$i],$j,1)== '.' ) {

          }else{
          $tempHarga = $tempHarga.substr($harga[$i],$j,1);
          }
        }

        for ($j=0; $j < strlen($sub[$i]); $j++) {
          if ( substr($sub[$i],$j,1)== '.' ) {

          }else{
          $tempSub = $tempSub.substr($sub[$i],$j,1);
          }
        }

        for ($j=0; $j < strlen($qty[$i]); $j++) {
          if ( substr($qty[$i],$j,1)== '.' ) {

          }else{
          $tempQty = $tempQty.substr($qty[$i],$j,1);
          }
        }

        dbeli::create([
          'ID_BARANG'=>$id[$i],
          'ID_BELI'=>$temp,
          'QTY'=>$tempQty,
          'HARGA_BELI'=>$tempHarga,
          'SUBTOTAL_BELI'=>$tempSub
        ]);

          $check = gudangModel::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_BARANG','=',$id[$i]]])->count();
          if ($check<1) {
            gudangModel::create([
            'ID_KANTOR'=>$request->input('idKantor'),
            'ID_BARANG'=>$id[$i],
            'STOK_BARANG'=>$tempQty
            ]);
          }else{

            $jml = gudangModel::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_BARANG','=',$id[$i]]])->select('STOK_BARANG')->get();
            foreach ($jml as $arr ){
              $jumlah=$arr->STOK_BARANG;
            }
            $tot = $jumlah + $tempQty;;

            gudangModel::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_BARANG','=',$id[$i]]])->update([
              'ID_KANTOR'=>$request->input('idKantor'),
              'ID_BARANG'=>$id[$i],
              'STOK_BARANG'=>$tot
            ]);

          }
      }

      return redirect('transaksi/pembelian');
    }

    public function showPembelian($id)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      $dataPembelian= hbeli::where('ID_BELI','=',$id)->get();
      $detail = dbeli::where('ID_BELI','=',$id)->get();
      $dataSupplier= supplierModel::all();
      $dataGudang= kantorModel::all();
      $dataBarang =barangModel::all();
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

      return view('laundry/transaksi/showPembelian',['detail'=>$detail,'dataBarang'=>$dataBarang,'dataPembelian'=>$dataPembelian, 'dataGudang'=>$dataGudang ,'dataSupplier'=>$dataSupplier, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);



    }
    public function back()
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      return redirect('transaksi/pembelian');
    }

}
