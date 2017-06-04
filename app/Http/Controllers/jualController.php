<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\gudangModel;
use App\Models\supplierModel;
use App\Models\barangModel;
use App\Models\kantorModel;
use App\Models\pegawaiModel;
use App\Models\jasaModel;
use App\Models\pemakaianModel;
use App\Models\customerModel;
use App\Models\hjual;
use App\Models\djual;
use Carbon\Carbon;

class jualController extends Controller
{
    public function index( )
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

      $dataPenjualan= hjual::all();
      $dataJasa = jasaModel::all();
      $dataKantor= kantorModel::all();
      $dataBarang =barangModel::all();
      $dataPegawai = pegawaiModel::all();
      $dataCustomer = customerModel::all();
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

      $jum = hjual::count();
      $temp = "NOTA" . str_pad($jum+1,8,"0",STR_PAD_LEFT);

      return view('laundry/transaksi/penjualan',['nota'=>$temp,'dataCustomer'=>$dataCustomer,'dataPegawai'=>$dataPegawai,'dataJasa'=>$dataJasa,'dataBarang'=>$dataBarang,'dataPenjualan'=>$dataPenjualan, 'dataKantor'=>$dataKantor, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }


    public function insertPenjualan(Request $request)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

      Carbon::setLocale('id');
      $tz=  Carbon::setLocale('id');
      $hargatot = "";

      for ($i=0; $i < strlen($request->input('hargaTotal')); $i++) {
        if ( substr($request->input('hargaTotal'),$i,1)== '.' ) {

        }else{
        $hargatot = $hargatot.substr($request->input('hargaTotal'),$i,1);
        }
      }

      $jum = hjual::count();
      $temp = "NOTA" . str_pad($jum+1,8,"0",STR_PAD_LEFT);

      $tanggal = strtotime($request->input('tglAmbil'));
      $day=date("d",$tanggal);
      $month=date("m",$tanggal);
      $year=date("Y",$tanggal);
      hjual::create([
        'ID_NOTA'=>$temp,
        'ID_PEGAWAI'=>$request->input('idPegawai'),
        'ID_CUSTOMER'=>$request->input('idCustomer'),
        'ID_KANTOR'=>$request->input('idKantor'),
        'TGL_JUAL'=>Carbon::now('Asia/Jakarta')->toDateString(),
        'TGL_SELESAI'=>Carbon::createFromDate($year, $month, $day),
        'JAM'=>Carbon::now('Asia/Jakarta')->toTimeString(),
        'HARGA_TOTAL_JUAL'=>$hargatot,
        'KETERANGAN_JUAL'=>"",
        'STATUS'=>"Diproses"
      ]);

     $id = $request->input('idJasa');
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

        djual::create([
          'ID_NOTA'=>$temp,
          'ID_JASA'=>$id[$i],
          'HARGA_JUAL'=>$tempHarga,
          'SUBTOTAL_JUAL'=>$tempSub,
          'QTY_JUAL'=>$tempQty
        ]);
          // $check = gudangModel::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_BARANG','=',$id[$i]]])->count();
          // if ($check<1) {
          //   gudangModel::create([
          //   'ID_KANTOR'=>$request->input('idKantor'),
          //   'ID_BARANG'=>$id[$i],
          //   'STOK_BARANG'=>$qty[$i]
          //   ]);
          // }else{
          //
          //   $jml = gudangModel::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_BARANG','=',$id[$i]]])->select('STOK_BARANG')->get();
          //   foreach ($jml as $arr ){
          //     $jumlah=$arr->STOK_BARANG;
          //   }
          //   $tot = $jumlah + $qty[$i];
          //
          //   gudangModel::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_BARANG','=',$id[$i]]])->update([
          //     'ID_KANTOR'=>$request->input('idKantor'),
          //     'ID_BARANG'=>$id[$i],
          //     'STOK_BARANG'=>$tot
          //   ]);
          // }
      }

      return redirect('transaksi/showPenjualan/'.$temp);
    }

    public function showPenjualan($id)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

      $dataPenjualan= hjual::where('ID_NOTA','=',$id)->get();
      $detail = djual::where('ID_NOTA','=',$id)->get();
      $dataCustomer= customerModel::all();
      $dataKantor= kantorModel::all();
      $dataPegawai =pegawaiModel::all();
      $dataJasa =jasaModel::all();
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

      return view('laundry/transaksi/showPenjualan',['detail'=>$detail,'dataJasa'=>$dataJasa,'dataPenjualan'=>$dataPenjualan, 'dataKantor'=>$dataKantor ,'dataCustomer'=>$dataCustomer, 'dataPegawai'=>$dataPegawai,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }

    public function nota($id)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

      $dataPenjualan= hjual::where('ID_NOTA','=',$id)->get();
      $detail = djual::where('ID_NOTA','=',$id)->get();
      $dataCustomer= customerModel::all();
      $dataKantor= kantorModel::all();
      $dataPegawai =pegawaiModel::all();
      $dataJasa =jasaModel::all();
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

      return view('laundry/transaksi/nota/notaPenjualan',['detail'=>$detail,'dataJasa'=>$dataJasa,'dataPenjualan'=>$dataPenjualan, 'dataKantor'=>$dataKantor ,'dataCustomer'=>$dataCustomer, 'dataPegawai'=>$dataPegawai,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function back()
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

      return redirect('transaksi/penjualan');
    }

}
