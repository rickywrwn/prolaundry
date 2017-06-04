<!DOCTYPE html>
<html>
<head>
  <title>Jurnal</title>
  @include('layouts.head')
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">

<body class="skin-blue fixed sidebar-mini" style="height: auto;">

  @include('layouts.nav')
  <div class="content-wrapper">

    <div class="box box-primary" style="margin-top:3%;">
      <div class="box-header with-border">
        <h3 class="box-title">Jurnal</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <h2 class="title" style="magin-left:500px;text-align:center;color:navy;">Prolaundry</h3>
        <h3 class="title" style="magin-left:500px;text-align:center; margin-bottom:5%">Jurnal</h3>
        <?php

        $awal = new DateTime($tglAwal);
        $akhir = new DateTime($tglAkhir);
        $date1 = new DateTime($tglAwal);
        $date2 = new DateTime($tglAkhir);

        $diff = $date2->diff($date1)->format("%a");
        //echo $diff+1;
        //echo $awal->format('Y-m-d');


            echo '  <div class="col-xs-12 " >
            <table class="table table-bordered table-striped"">
              <thead>
              <tr>
                <td>Tanggal</td>
                <td>Masuk</td>
                <td>Keluar</td>
                <td>Saldo</td>
              </tr>
              </thead>
              <tbody> ';

              for ($i=0; $i <= $diff+1; $i++) {

                foreach ($dataPenjualan as $arr ){
                  $Tesawal = new DateTime($arr->TGL_JUAL);
                  if ($Tesawal == $awal) {
                  echo'
                  <tr>
                    <td>'.$arr->TGL_JUAL.'</td>
                    <td>'.$arr->HARGA_TOTAL_JUAL.'</td>
                    <td></td>
                    <td></td>
                  </tr>
                  ';
                  }
                }
                foreach ($dataPembelian as $arr ){
                  $beliAwal = new DateTime($arr->TGL_BELI);
                  if ($beliAwal == $awal) {
                  echo'
                    <tr>
                      <td>'.$arr->TGL_BELI.'</td>
                      <td></td>
                      <td>'.$arr->HARGA_BELI_TOTAL.'</td>
                      <td></td>
                    </tr>
                    ';
                  }
                }
                $awal->modify('+1 day');
              }

              echo "
              </tbody>
              </table>
              </div>";
              echo "</div>";
        ?>


          <!-- /.box-body -->
      </div>
  </div>

  </div>
</body>

@include('layouts.footer')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- uang -->
<script src="{{asset('js/jquery.number.min.js')}}" type="text/javascript"></script>

<script>


  $(function () {
    $("#table1").DataTable();
  });

  $(function () {
    //Initialize Select2 Elements
      $(".select2").select2();
  });

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true, format: 'dd/MM/yyyy'
  });
  function hapus(i) {
    var tempSub =  parseInt($("#subt"+i).val());
    var total =  parseInt($("#hargaTot").val());
    total = (total - tempSub);
    $("#hargaTot").val(total);
    document.getElementById("det"+i).remove();
  }

  function qtyGanti(b) {
    var harga = $("#hrg"+b).val();
    var qty = $("#qty"+b).val();
    $("#subt"+b).val(harga*qty);
  }

  function hrgGanti(b) {
      var harga = $("#hrg"+b).val();
      var qty = $("#qty"+b).val();
      $("#subt"+b).val(harga*qty);
  }

  $(document).ready(function(){


  });
</script>
</html>
