<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gudangModel;
use App\Models\supplierModel;
use App\Models\barangModel;
use App\Models\kantorModel;
use App\Models\pegawaiModel;
use App\Models\customerModel;
use App\Models\jasaModel;
use App\Models\hbeli;
use App\Models\dbeli;
use App\Models\hjual;
use App\Models\djual;
use App\Models\pemakaianBarangModel;
use App\Models\detailPemakaian;

class laporanController extends Controller
{
    public function pembelian()
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

      return view('laundry/laporan/laporanPembelian',['dataBarang'=>$dataBarang,'dataPembelian'=>$dataPembelian, 'dataGudang'=>$dataGudang ,'dataSupplier'=>$dataSupplier, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function showLaporanPembelian(Request $request)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

        $nota = 0;
        $gudang = 0;
        $supp = 0;

        if ($request->input('cbNota')) {
          $nota=1;
        }

        if ($request->input('cbGudang')) {
          $gudang = 1;
        }

        if ($request->input('cbSupplier')) {
          $supp = 1;
        }

        if ($nota == 1 && $gudang == 0 && $supp == 0) {
          $dataPembelian= hbeli::where([['ID_BELI','=',$request->input('noNota')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 1 && $gudang == 1 && $supp == 0) {
          $dataPembelian= hbeli::where([['ID_BELI','=',$request->input('noNota')],['ID_KANTOR','=',$request->input('idKantor')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 1 && $gudang == 1 && $supp == 1) {
          $dataPembelian= hbeli::where([['ID_BELI','=',$request->input('noNota')],['ID_KANTOR','=',$request->input('idKantor')],['ID_SUPPLIER','=',$request->input('idSupplier')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 0 && $gudang == 1 && $supp == 0) {
          $dataPembelian= hbeli::where([['ID_KANTOR','=',$request->input('idKantor')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 0 && $gudang == 1 && $supp == 1) {
          $dataPembelian= hbeli::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_SUPPLIER','=',$request->input('idSupplier')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 0 && $gudang == 0 && $supp == 1) {
          $dataPembelian= hbeli::where([['ID_SUPPLIER','=',$request->input('idSupplier')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 1 && $gudang == 0 && $supp == 1) {
          $dataPembelian= hbeli::where([['ID_BELI','=',$request->input('noNota')],['ID_SUPPLIER','=',$request->input('idSupplier')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();
        }else{
          $dataPembelian= hbeli::where([['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();

        }

        $dataSupplier= supplierModel::all();
        $dataGudang= kantorModel::all();
        $dataCustomer =customerModel::all();
        $dataBarang = barangModel::all();
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
        $detail = dbeli::all();

      return view('laundry/laporan/showLaporanPembelian',['dataBarang'=>$dataBarang,'dataSupplier'=>$dataSupplier,'dataGudang'=>$dataGudang,'dataCustomer'=>$dataCustomer,'detail'=>$detail,'dataPembelian'=>$dataPembelian,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }


    public function penjualan()
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      $dataPenjualan= hjual::all();
      $dataPegawai= pegawaiModel::all();
      $dataGudang= kantorModel::all();
      $dataCustomer =customerModel::all();
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

      return view('laundry/laporan/laporanPenjualan',['dataPegawai'=>$dataPegawai,'dataPenjualan'=>$dataPenjualan, 'dataGudang'=>$dataGudang ,'dataCustomer'=>$dataCustomer, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function showLaporanPenjualan(Request $request)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

      $nota = 0;
      $gudang = 0;
      $pegawai = 0;
      $customer = 0;

      if ($request->input('cbNota')) {
        $nota=1;
      }

      if ($request->input('cbGudang')) {
        $gudang = 1;
      }

      if ($request->input('cbPegawai')) {
        $pegawai = 1;
      }

      if ($request->input('cbCustomer')) {
        $customer = 1;
      }

      // ['ID_NOTA','=',$request->input('noNota')],
      // ['ID_GUDANG','=',$request->input('idKantor')],
      // ['ID_PEGAWAI','=',$request->input('idPegawai')],
      // ['ID_CUSTOMER','=',$request->input('idCustomer')],

      if ($nota == 1 && $gudang == 0 && $pegawai == 0 && $customer == 0) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota == 0 && $gudang == 0 && $pegawai == 0 && $customer == 1) {
          $dataPenjualan= hjual::where([['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota == 0 && $gudang == 0 && $pegawai == 1 && $customer == 0) {
          $dataPenjualan= hjual::where([['ID_PEGAWAI','=',$request->input('idPegawai')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==0  && $gudang ==1  && $pegawai ==0  && $customer ==0 ) {
          $dataPenjualan= hjual::where([['ID_KANTOR','=',$request->input('idKantor')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==0  && $gudang == 0 && $pegawai ==1  && $customer ==1 ) {
          $dataPenjualan= hjual::where([['ID_PEGAWAI','=',$request->input('idPegawai')],['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==0  && $gudang ==1  && $pegawai ==1  && $customer ==0 ) {
          $dataPenjualan= hjual::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_PEGAWAI','=',$request->input('idPegawai')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota == 1 && $gudang ==1  && $pegawai == 0 && $customer == 0) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['ID_KANTOR','=',$request->input('idKantor')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota == 1 && $gudang == 0 && $pegawai == 0 && $customer == 1) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota == 0 && $gudang == 1 && $pegawai == 0 && $customer ==1 ) {
          $dataPenjualan= hjual::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==1  && $gudang == 0 && $pegawai == 1 && $customer == 0) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['ID_PEGAWAI','=',$request->input('idPegawai')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota == 0 && $gudang == 1 && $pegawai == 1 && $customer ==1 ) {
          $dataPenjualan= hjual::where([['ID_KANTOR','=',$request->input('idKantor')],['ID_PEGAWAI','=',$request->input('idPegawai')],['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==1  && $gudang ==1  && $pegawai ==1  && $customer ==0 ) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['ID_KANTOR','=',$request->input('idKantor')],['ID_PEGAWAI','=',$request->input('idPegawai')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==1  && $gudang ==1  && $pegawai ==0  && $customer ==1 ) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['ID_KANTOR','=',$request->input('idKantor')],['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==1  && $gudang ==0  && $pegawai ==1  && $customer ==1 ) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['ID_PEGAWAI','=',$request->input('idPegawai')],['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else if ($nota ==1  && $gudang ==1  && $pegawai ==1  && $customer ==1 ) {
          $dataPenjualan= hjual::where([['ID_NOTA','=',$request->input('noNota')],['ID_KANTOR','=',$request->input('idKantor')],['ID_PEGAWAI','=',$request->input('idPegawai')],['ID_CUSTOMER','=',$request->input('idCustomer')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }
      else{
        $dataPenjualan= hjual::where([['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
      }

      $dataPegawai= pegawaiModel::all();
      $dataGudang= kantorModel::all();
      $dataCustomer =customerModel::all();
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
      $detail = djual::all();
      $dataJasa = jasaModel::all();
      return view('laundry/laporan/showLaporanPenjualan',['dataJasa'=>$dataJasa,'dataPegawai'=>$dataPegawai,'dataGudang'=>$dataGudang,'dataCustomer'=>$dataCustomer,'detail'=>$detail,'dataPenjualan'=>$dataPenjualan,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }


    public function pemakaian()
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      $dataPemakaian= pemakaianBarangModel::all();
      $dataGudang= kantorModel::all();
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

      return view('laundry/laporan/laporanPemakaian',['dataPemakaian'=>$dataPemakaian, 'dataGudang'=>$dataGudang, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function showLaporanPemakaian(Request $request)
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

        $nota = 0;
        $gudang = 0;

        if ($request->input('cbNota')) {
          $nota=1;
        }

        if ($request->input('cbGudang')) {
          $gudang = 1;
        }

        if ($nota == 1 && $gudang == 0) {
          $dataPemakaian= pemakaianBarangModel::where([['ID_PEMAKAIAN','=',$request->input('noNota')],['TANGGAL','>=',$request->input('awal')],['TANGGAL','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 1 && $gudang == 1 ) {
          $dataPemakaian= pemakaianBarangModel::where([['ID_PEMAKAIAN','=',$request->input('noNota')],['ID_KANTOR','=',$request->input('idKantor')],['TANGGAL','>=',$request->input('awal')],['TANGGAL','<=',$request->input('akhir')]])->get();
        }
        else if ($nota == 0 && $gudang == 1 ) {
          $dataPemakaian= pemakaianBarangModel::where([['ID_KANTOR','=',$request->input('idKantor')],['TANGGAL','>=',$request->input('awal')],['TANGGAL','<=',$request->input('akhir')]])->get();
        }else{
          $dataPemakaian= pemakaianBarangModel::where([['TANGGAL','>=',$request->input('awal')],['TANGGAL','<=',$request->input('akhir')]])->get();

        }


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
        $detail = detailPemakaian::all();
        $dataPegawai= pegawaiModel::all();
        $dataGudang= kantorModel::all();
        $dataBarang = barangModel::all();

      return view('laundry/laporan/showLaporanPemakaian',['dataBarang'=>$dataBarang,'dataPegawai'=>$dataPegawai,'dataGudang'=>$dataGudang,'detail'=>$detail,'dataPemakaian'=>$dataPemakaian,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }

    public function jurnal()
    {
      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }
      $dataPenjualan = hjual::all();
      $dataPembelian = hbeli::all();
      $dataGudang= kantorModel::all();

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

      return view('laundry/laporan/laporanJurnal',[ 'dataPenjualan'=>$dataPembelian, 'dataPenjualan'=>$dataPenjualan, 'dataGudang'=>$dataGudang, 'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);
    }

    public function showJurnal(Request $request)
    {

      $userNow = session('user');
      if (!$userNow) {
        return redirect('/masuk/');
      }

        $gudang = 0;
        $tglAwal = $request->input('awal');
        $tglAkhir = $request->input('akhir');

        if ($request->input('cbGudang')) {
          $gudang = 1;
        }

      if ($gudang == 1 ) {
          $dataPenjualan= hjual::where([['ID_KANTOR','=',$request->input('idKantor')],['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();

          $dataPembelian=hbeli::where([['ID_KANTOR','=',$request->input('idKantor')],['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();

        }else{
          $dataPenjualan= hjual::where([['TGL_JUAL','>=',$request->input('awal')],['TGL_JUAL','<=',$request->input('akhir')]])->get();
          $dataPembelian= hbeli::where([['TGL_BELI','>=',$request->input('awal')],['TGL_BELI','<=',$request->input('akhir')]])->get();

        }


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
        $detail = detailPemakaian::all();
        $dataPegawai= pegawaiModel::all();
        $dataGudang= kantorModel::all();
        $dataBarang = barangModel::all();

      return view('laundry/laporan/showJurnal',['tglAwal'=>$tglAwal,'tglAkhir'=>$tglAkhir,'dataPenjualan'=>$dataPenjualan,'dataPembelian'=>$dataPembelian,'gudangAmb'=>$gudangAmb, 'gudangEc'=>$gudangEc, 'gudangInt'=> $gudangInt, 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

    }
}
