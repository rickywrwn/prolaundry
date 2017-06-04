<!DOCTYPE html>
<html>
<head>
  <title>Transaksi Pembelian</title>
  @include('layouts.head')
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Mask Money -->
  <script src="../../plugins/maskmoney/dist/jquery.maskMoney.min.js" type="text/javascript"></script>
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
        <input type="text" id="currency" />
      <div class="box-body">
        <div class="form-group">
            <div class="col-xs-11 " >
              <?php

                  echo Form::open(['url' => 'transaksi/pembelian/', 'method' => 'post']);
                    echo csrf_field() ;

                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Nomor Nota</label>' . Form::text('noNota','',['class' => 'form-control', 'placeholder' => 'Nomor Nota'] );
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo' <label>Gudang Tujuan</label>  <select class="form-control select2" name="idKantor" style="width: 100%;">';
                    foreach ($dataGudang as $arr ){
                      echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo' <label>Supplier</label>  <select class="form-control select2" name="idSupplier" style="width: 100%;">';
                    foreach ($dataSupplier as $arr ){
                      echo '<option value="'. $arr->ID_SUPPLIER.'">'. $arr->NAMA_SUPPLIER.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo "<div class='col-xs-3'>";
                    echo '<label for="hrg">Harga Total</label>'   . Form::text('hargaTotal','',['class' => 'form-control', 'placeholder' => 'Harga Total ','id'=>'hargaTot'] );
                    echo "</div>";
                    echo '<br> <br>';

                    echo '<div id="detail" class="col-xs-13">
                    </div>';

                    echo Form::submit('Insert',['class' => 'btn btn-info pull-right']);
                  echo Form::close();
                  echo '<button id="tambah" class="btn btn-info pull-right"> Tambah Transaksi</button>';
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
              <h3 class="box-title">Data Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Beli</th>
                  <th>ID Kantor</th>
                  <th>ID Supplier</th>
                  <th>Tanggal Pembelian</th>
                  <th>Harga Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataPembelian as $arr ){
                     echo'<tr>
                            <td><a href=/transaksi/showPembelian/'.$arr->ID_BELI.'> '.$arr->ID_BELI.'</a></td>

                            <td>'.$arr->ID_KANTOR.'</td>
                            <td>'.$arr->ID_SUPPLIER.'</td>
                            <td>'.$arr->TGL_BELI.'</td>
                            <td>'.$arr->HARGA_BELI_TOTAL.'</td>
                            <td> <a class="btn btn-info " href=/transaksi/pembelian/'.$arr->ID_BELI.'> Edit</a>
                            <a class="btn btn-info"href=/transaksi/deleteJasa/'.$arr->ID_BELI.'> Delete</a> </td>
                          </tr>';
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Beli</th>
                    <th>ID Kantor</th>
                    <th>ID Supplier</th>
                    <th>Tanggal Pembelian</th>
                    <th>Harga Total</th>
                    <th>Action</th>
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
<!-- Mask Money -->
<script src="../../plugins/maskmoney/dist/jquery.maskMoney.min.js" type="text/javascript"></script>

<script>
  $(function () {
    $("#table1").DataTable();

  });

  //Date picker
    $('#datepicker').datepicker({
      autoclose: true, format: 'dd/MM/yyyy'
    });

    $(document).ready(function(){


      $('.qty').on('keyup change',function(){
        $('.subt').val($(this).val() * 1.50);
    });

        $("#tambah").click(function(){
            $("#detail").append('<?php echo '<div class="form-group"> <div class="col-xs-12" style="border-bottom:1px solid blue;margin-bottom:2px;padding-bottom:5px;" > <div class="col-xs-3"> <label>Nama Barang</label> <select class="form-control select2" name="idBarang[]" style="width: 100%;">'; foreach($dataBarang as $arr ){  echo '<option value="'. $arr->ID_BARANG.'">'. $arr->NAMA_BARANG.'</option>';} echo '</select> </div> <div class="col-xs-3"><label>Harga Beli</label><br> <input type="text" name="harga[]" class="form-control hrgbarang" > </div> <div class="col-xs-3"><label>QTY</label><br> <input type="number" name="quantity[]" class="form-control qty"></div>  <div class="col-xs-3"><label>Subtotal</label><br> <input type="number" name="subtotal[]" class="form-control subt"></div>  </div></div><br><br>' ?> ');
      });


    });
</script>
</html>
