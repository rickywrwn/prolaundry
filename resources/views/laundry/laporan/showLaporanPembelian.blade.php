<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pembelian</title>
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
        <h3 class="box-title">Laporan Pembelian</h3>
      </div>

      <div class="box-body" style="">
      <h2 class="title" style="magin-left:500px;text-align:center;color:navy;">Prolaundry</h3>
      <h3 class="title" style="magin-left:500px;text-align:center; margin-bottom:5%">Laporan Pembelian</h3>

        <?php
          foreach ($dataPembelian as $arr ){

            foreach ($dataGudang as $arrC ){
              if($arrC->ID_KANTOR == $arr->ID_KANTOR ){
                $kantor = $arrC->NAMA_KANTOR;
              }
            }
            foreach ($dataSupplier as $arrC ){
              if($arrC->ID_SUPPLIER == $arr->ID_SUPPLIER ){
                $supp = $arrC->NAMA_SUPPLIER;
              }
            }
            echo "<div class='container' style='width:100%;height:10%;border-top:3px solid navy; margin-bottom:10px'>";;
            echo '
            <div class="col-xs-12 " >
              <div class="col-xs-3">
                <label for="">Tanggal Penjualan : '.$arr->TGL_BELI.' </label>
              </div>

              <div class="col-xs-3">
                <label for="">Jam  : '.$arr->JAM.' </label>
              </div>

              <div class="col-xs-3">
                <label for="">Supplier : '.$supp .' </label>
              </div>

              <div class="col-xs-3">
                <label for="">Harga Total: Rp. </label>
                <label for="hrg" class="hrg">'.$arr->HARGA_BELI_TOTAL.' </label>
              </div>
            </div>
            ';

            echo '
            <div class="col-xs-12 " >
              <div class="col-xs-3">
                <label for="">Nota : '.$arr->ID_BELI.' </label>
              </div>

              <div class="col-xs-3">

              </div>

              <div class="col-xs-3">
              <label for="">Gudang Tujuan : '.$kantor .' </label>
              </div>

              <div class="col-xs-3">
                <label for="">Keterangan: '.$arr->KETERANGAN.' </label>
              </div>
            </div>
            ';

            echo '  <div class="col-xs-12 " >
            <table class="table table-bordered table-striped"">
              <thead>
              <tr>
                <td>Nama Barang</td>
                <td>Harga</td>
                <td>Qty</td>
                <td>Subtotal</td>
              </tr>
              </thead>
              <tbody> ';
              foreach ($detail as $arrr ){

                foreach ($dataBarang as $arrC ){
                  if($arrr->ID_BARANG == $arrC->ID_BARANG ){
                    $barang = $arrC->NAMA_BARANG;
                  }
                }
                if ($arr->ID_BELI == $arrr->ID_BELI) {
                  echo ' <tr>
                      <td>'.$barang.'</td>
                      <td>'.$arrr->HARGA_BELI.'</td>
                      <td>'.$arrr->QTY.'</td>
                      <td>'.$arrr->SUBTOTAL_BELI.'</td>
                    </tr>';
                }
              };
              echo "
              </tbody>
              </table>
              </div>";
              echo "</div>";
          };
        ?>

          <!-- /.box-body -->
      </div>

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">

              <?php
                //
                // foreach ($dataPembelian as $arr ){
                //   echo '<div class="form-group">';
                //     echo '<div class="col-xs-12 " >';
                //
                //       echo "<div class='col-xs-2'>";
                //       echo '<label for="lblId">Tanggal</label>' . Form::text('noNota',$arr->TGL_BELI,['class' => 'form-control', 'readonly'] );
                //       echo "</div>";
                //
                //       echo "<div class='col-xs-2'>";
                //       echo '<label for="lblId">Supplier</label>' . Form::text('noNota',$arr->ID_SUPPLIER,['class' => 'form-control', 'readonly'] );
                //       echo "</div>";
                //
                //       echo "<div class='col-xs-2'>";
                //       echo '<label for="lblId">Gudang Tujuan</label>' . Form::text('noNota',$arr->ID_KANTOR,['class' => 'form-control', 'readonly'] );
                //       echo "</div>";
                //
                //       echo "<div class='col-xs-2'>";
                //       echo '<label for="lblId">Keterangan</label>' . Form::text('noNota',$arr->KETERANGAN,['class' => 'form-control', 'readonly'] );
                //       echo "</div>";
                //
                //     echo '</div>';
                //
                //     foreach ($detail as $arrr ){
                //
                //       if ($arr->ID_BELI == $arrr->ID_BELI) {
                //         echo '<div class="col-xs-12 " >';
                //         echo "<div class='col-xs-2'>";
                //         echo '<label for="lblId">ID Barang</label>' . Form::text('noNota',$arrr->ID_BARANG,['class' => 'form-control', 'readonly'] );
                //         echo "</div>";
                //
                //         echo "<div class='col-xs-2'>";
                //         echo '<label for="lblId">Harga Beli</label>' . Form::text('noNota',$arrr->HARGA_BELI,['class' => 'form-control', 'readonly'] );
                //         echo "</div>";
                //
                //         echo "<div class='col-xs-2'>";
                //         echo '<label for="lblId">Jumlah Barang</label>' . Form::text('noNota',$arrr->QTY,['class' => 'form-control', 'readonly'] );
                //         echo "</div>";
                //
                //         echo "<div class='col-xs-2'>";
                //         echo '<label for="lblId">Subtotal</label>' . Form::text('noNota',$arrr->SUBTOTAL_BELI,['class' => 'form-control', 'readonly'] );
                //         echo "</div>";
                //         echo '</div>';
                //       }
                //
                //     };
                //
                //   echo '</div>';
                //   echo 'batass';
                //
                // };
              ?>
        </div>
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
