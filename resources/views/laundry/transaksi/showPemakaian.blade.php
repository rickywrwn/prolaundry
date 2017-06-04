<!DOCTYPE html>
<html>
<head>
  <title>Detail Pemakaian</title>
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

                  foreach ($dataPemakaian as $arr ){
                    $id= $arr->ID_PEMAKAIAN;
                    $kantor= $arr->ID_KANTOR;
                    $tgl= $arr->TANGGAL;
                    $keterangan = $arr->KETERANGAN;
                  }
                  echo Form::open(['url' => 'transaksi/backPemakaian/', 'method' => 'post']);
                    echo csrf_field() ;

                    echo "<div class='col-xs-2'>";
                    echo "<br>";
                    echo Form::submit('Kembali',['class' => 'btn btn-info pull-left']);
                    echo "</div>";
                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">ID Pemakaian</label>' . Form::text('noNota',$id,['class' => 'form-control', 'placeholder' => 'Nomor Nota', 'disabled'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Tanggal</label>' . Form::text('noNota',$tgl,['class' => 'form-control', 'placeholder' => 'Nomor Nota', 'disabled'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Gudang Pengambilan</label>' . Form::text('noNota',$kantor,['class' => 'form-control', 'placeholder' => 'Nomor Nota', 'disabled'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '<label for="hrg">Keterangan</label>'   . Form::text('hargaTotal',$keterangan,['class' => 'form-control', 'placeholder' => 'Harga Total ','disabled'] );
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
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pemakaian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>QTY</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($detail as $arr ){
                     echo'<tr>
                            <td>'.$arr->ID_BARANG.'</td>
                            <td>'.$arr->QTY.'</td>
                          </tr>';
                }
                ?>
                </tbody>
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
