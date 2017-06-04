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
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">

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

                  echo Form::open(['url' => 'transaksi/pembelian/', 'method' => 'post']);
                    echo csrf_field() ;

                    echo "<div class='col-xs-2'>";
                    echo '<label for="lblId">Nomor Nota</label>' . Form::text('noNota',$nota,['class' => 'form-control', 'placeholder' => 'Nomor Nota','readonly'] );
                    echo "</div>";

                    echo "<div class='col-xs-3'>";
                    echo' <label>Gudang Tujuan</label>  <select class="form-control select2" name="idKantor" style="width: 100%;">';
                    foreach ($dataGudang as $arr ){
                      echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo "<div class='col-xs-3'>";
                    echo' <label>Supplier</label>  <select class="form-control select2" name="idSupplier" style="width: 100%;">';
                    foreach ($dataSupplier as $arr ){
                      echo '<option value="'. $arr->ID_SUPPLIER.'">'. $arr->NAMA_SUPPLIER.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo '
                    <div class="form-group col-xs-3">
                      <label for="hrg">Harga Total</label>
                      <div class="input-group">
                      <span class="input-group-addon"  id="txtSatuan">Rp. </span>
                        '.Form::text('hargaTotal','',['class' => 'form-control', 'placeholder' => 'Harga Total ','id'=>'hargaTot'] ).'
                      </div>
                    </div>
                      ';
                      echo "<div class='col-xs-4'>";
                      echo '<label for="lblId">Keterangan Tambahan</label>' . Form::text('keterangan','',['class' => 'form-control'] );
                      echo "</div>";
                    echo '<br> <br>';

                    echo '<div class="form-group">
                            <div class="col-xs-12" style="border-bottom:1px solid blue ;margin-bottom:2px; padding-bottom:5px;" >
                              <div class="col-xs-3">
                                <label>Nama Barang</label>
                                <select class="form-control select2" id="barang" style="width: 100%;">';
                                foreach($dataBarang as $arr ){  echo '<option value="'. $arr->ID_BARANG.'">'. $arr->NAMA_BARANG.'</option>';}
                                echo '</select>
                                </div>

                                <div class="form-group col-xs-3">
                                  <label>Harga Beli</label><br>
                                  <div class="input-group">
                                  <span class="input-group-addon"  id="txtSatuan">Rp. </span>
                                    <input type="text" class="form-control" id="harga">
                                  </div>
                                </div>

                                <div class="form-group col-xs-3">
                                  <label>QTY</label><br>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="qty">

                                    <span class="input-group-addon"  id="txtSatuan"> </span>
                                  </div>
                                </div>


                            </div>
                          </div><br><br>' ;

                    echo '<div id="detail" class="col-xs-12">';
                    // bagian detail


                    echo '</div>';

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
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataPembelian as $arrr ){
                     echo'<tr>
                            <td><a href=/transaksi/showPembelian/'.$arrr->ID_BELI.'> '.$arrr->ID_BELI.'</a></td>

                            ';
                            $kantor = $arrr->ID_KANTOR;
                            $supplier = $arrr->ID_SUPPLIER;
                            foreach ($dataGudang as $arr ){
                              if ($kantor == $arr->ID_KANTOR) {
                                echo '<td>'.$arr->NAMA_KANTOR.'</td>';
                              }
                            }

                            foreach ($dataSupplier as $arr ){
                              if ($supplier == $arr->ID_SUPPLIER) {
                                echo '<td>'.$arr->NAMA_SUPPLIER.'</td>';
                              }
                            }

                            echo '
                            <td>'.$arrr->TGL_BELI.'</td>
                            <td>'.$arrr->HARGA_BELI_TOTAL.'</td>
                          </tr>
                      ';
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
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- uang -->
<script src="{{asset('js/jquery.number.min.js')}}" type="text/javascript"></script>

<script>

  $(function() {
      $('#hargaTot').val(0);
      $('#hargaTot').number(true,0,',','.');
      $('#harga').number(true,0,',','.');
      $('#qty').number(true,0,',','.');
  });

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
      var idx = 0;

    $("#tambah").click(function(){
      var barang = $("#barang").prop('selectedIndex');
      var harga = $('#harga').val();
      var qty = $('#qty').val();
      var subtotal = qty*harga;
      var total=0;

      var newdiv ='<div class="form-group" > <div class="col-xs-12" id="det'+idx+'" style="border-bottom:1px solid blue;margin-bottom:2px;padding-bottom:5px;" > <div class="col-xs-3"> <label>Nama Barang</label> <select class="form-control select2" name="idBarang[]" id=brg'+idx+'  style="width: 100%;"> <?php echo ''; $i = 0 ; foreach($dataBarang as $arr ){  echo '<option value="'. $arr->ID_BARANG.'">'. $arr->NAMA_BARANG;  echo '</option>';}?></select> </div> <div class="col-xs-3"><label>Harga Beli</label><br> <input type="text" name="harga[]" id=hrg'+idx + ' onkeyup="hrgGanti('+idx+')" class="form-control hrgbarang" > </div> <div class="col-xs-1"><label>QTY</label><br> <input type="text" name="quantity[]" id=qty'+idx+' onkeyup="qtyGanti('+idx+')" class="form-control qty"></div>  <div class="col-xs-3"><label>Subtotal</label><br> <input type="text" id=subt'+idx+' name="subtotal[]" class="form-control subt"></div>  <div class="col-xs-1"><label>Hapus</label> <div class="hapus" onclick="hapus('+idx+')" style="width:20px;height:100%; background-color:red; text-align:center;">X</div><br></div> </div></div>';

      $("#detail").append(newdiv );

      $('#hrg'+idx).number(true,0,',','.');
      $('#qty'+idx).number(true,0,',','.');
      $('#subt'+idx).number(true,0,',','.');
      $("#brg"+idx).prop('selectedIndex', barang);
      $("#hrg"+idx).val(harga);
      $("#qty"+idx).val(qty);
      $("#subt"+idx).val(subtotal);


      for (i = 0; i <= idx; i++) {
        if( $('#subt'+i).length )         // use this if you are using id to check
        {
          var tempSub =  parseInt($("#subt"+i).val());

          total = (total + tempSub);
          $("#hargaTot").val(total);
        }
      }
            idx++;
    });

  });
</script>
</html>
