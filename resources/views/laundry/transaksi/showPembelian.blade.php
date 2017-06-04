<!DOCTYPE html>
<html>
<head>
  <title>Detail Pembelian</title>
  @include('layouts.head')
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
</head>

<body class="skin-blue fixed sidebar-mini" style="height: auto;">
  @include('layouts.nav')
  <div class="content-wrapper">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Transaksi Pembelian</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">
            <div class="col-xs-12 " >
              <?php

                  foreach ($dataPembelian as $arr ){
                    $nota= $arr->ID_BELI;
                    $kantor= $arr->ID_KANTOR;
                    $supp= $arr->ID_SUPPLIER;
                    $tgl= $arr->TGL_BELI;
                    $hrg = $arr->HARGA_BELI_TOTAL;
                  }
                  echo Form::open(['url' => 'transaksi/backPembelian/', 'method' => 'post']);
                    echo csrf_field() ;

                    echo "<div class='col-xs-2'>";
                    echo "<br>";
                    echo Form::submit('Kembali',['class' => 'btn btn-info pull-left']);
                    echo "</div>";
                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Nomor Nota</label>' . Form::text('noNota',$nota,['class' => 'form-control', 'placeholder' => 'Nomor Nota', 'disabled'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Tanggal</label>' . Form::text('noNota',$tgl,['class' => 'form-control', 'placeholder' => 'Nomor Nota', 'disabled'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Gudang Penyimpanan</label>' . Form::text('noNota',$kantor,['class' => 'form-control', 'placeholder' => 'Nomor Nota', 'disabled'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Supplier</label>' . Form::text('noNota',$supp,['class' => 'form-control', 'placeholder' => 'Nomor Nota', 'disabled'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '<label for="hrg">Harga Total</label>'   . Form::text('hargaTotal',$hrg,['class' => 'form-control', 'placeholder' => 'Harga Total ','disabled'] );
                    echo "</div>";
                    echo '<br> <br>';

                  echo Form::close();
              ?>
          </div>
        </div>
          <!-- /.box-body -->
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Harga Beli</th>
                  <th>QTY</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($detail as $arr ){
                     echo'<tr>
                            <td>'.$arr->ID_BARANG.'</td>
                            <td>'.$arr->HARGA_BELI.'</td>
                            <td>'.$arr->QTY.'</td>
                            <td>'.$arr->SUBTOTAL_BELI.'</td>
                          </tr>';
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Barang</th>
                    <th>Harga Beli</th>
                    <th>QTY</th>
                    <th>Subtotal</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

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

<script>
  $(function () {
    $("#table1").DataTable();
  });

    });
</script>
</html>
