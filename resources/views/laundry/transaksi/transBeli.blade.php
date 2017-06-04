<!DOCTYPE html>
<html>
<head>
  <title>Transaksi Pembelian</title>
  @include('layouts.head')
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
            <div class="col-xs-5">
              <?php
                  echo Form::open(['url' => '/jasa/', 'method' => 'post']);
                    echo csrf_field() ;
                    echo '<label for="lblId">ID Jasa</label>'  . Form::text('idJasa','',['class' => 'form-control', 'placeholder' => 'ID Jasa'] );
                    echo '<label for="lblNama">Nama Jasa</label>' . Form::text('namaJasa','',['class' => 'form-control', 'placeholder' => 'Nama Kasa '] );
                    echo '<label for="lblAlamat">Harga Dry Clean</label>'   . Form::text('hargaDry','',['class' => 'form-control', 'placeholder' => 'Harga Dry Clean '] );
                    echo '<label for="lblTelp">Harga Wet Clean Lengkap</label>' . Form::text('hargaWet','',['class' => 'form-control', 'placeholder' => 'Nomor Wet Clean  '] );
                    echo '<label for="namaCP">Harga Pressing</label>'   . Form::text('hargaPressing','',['class' => 'form-control', 'placeholder' => 'Harga Pressing '] );
                    echo '<label for="telpCP">Harga Wet Clean Saja</label>' . Form::text('hargaWetSaja','',['class' => 'form-control', 'placeholder' => 'Harga Wet Clean '] );
                    echo '<label for="lblket">Harga Setrika Saja</label>'   . Form::text('hargaSetrika','',['class' => 'form-control', 'placeholder' => 'Harga Setrika Saja '] );
                    echo '<label for="lblket">Keterangan</label>'   . Form::text('ketJasa','',['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                    echo '<br> <br>';
                    echo Form::submit('Insert',['class' => 'btn btn-info pull-right']);
                  echo Form::close();
              ?>
          </div>
        </div>
          <!-- /.box-body -->
      </div>
    </div><!-- content wrapper -->

  </div>


</body>

@include('layouts.footer')
<script>
  $(function () {
    $("#table1").DataTable();
  });
</script>
</html>
