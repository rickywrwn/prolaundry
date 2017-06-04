<!DOCTYPE html>
<html>
<head>
  <title>Transaksi Penjualan</title>
  @include('layouts.head')
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
</head>

<body class="skin-blue fixed sidebar-mini" style="height: auto;">

  @include('layouts.nav')
  <div class="content-wrapper">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Transaksi Penjualan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">
            <div class="col-xs-12 " >
               <small> <?php echo $nota; ?> </small>
              <?php
                  echo Form::open(['url' => 'transaksi/penjualan/', 'method' => 'post']);
                    echo csrf_field() ;

                    echo "<div class='col-xs-2'>";
                    echo' <label>Nama Pegawai</label>  <select class="form-control select2" name="idPegawai" style="width: 100%;">';
                    foreach ($dataPegawai as $arr ){
                      echo '<option value="'. $arr->ID_PEGAWAI.'">'. $arr->NAMA_PEGAWAI.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo' <label>Customer</label>  <select class="form-control select2" name="idCustomer" style="width: 100%;">';
                    foreach ($dataCustomer as $arr ){
                      echo '<option value="'. $arr->ID_CUSTOMER.'">'. $arr->NAMA_CUSTOMER.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo' <label>Kantor</label>  <select class="form-control select2" name="idKantor" style="width: 100%;">';
                    foreach ($dataKantor as $arr ){
                      echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo "<div class='col-xs-2'>";
                    echo '
                    <div class="form-group">
                      <label>Tanggal Selesai:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tglAmbil" class="form-control pull-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                    </div>
                    ';
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

                    echo '<br> <br>';

                    echo '

                            <div class="col-xs-8" style="border-bottom:1px solid blue ;margin-bottom:2px; padding-bottom:5px;" >
                              <div class="form-group col-xs-3">
                                <label>Nama Jasa</label>
                                <select class="form-control select2" id="jasa" style="width: 100%;" onchange="jasaChanged(this.selectedIndex)">';
                                foreach($dataJasa as $arr ){  echo '<option value="'. $arr->ID_JASA.'">'. $arr->NAMA_JASA.'</option>';}
                                echo '</select>
                              </div>

                              <div style="display:none;">
                                <select class="form-control" id="harga" style="width: 100%;" disabled>';
                                foreach($dataJasa as $arr ){  echo '<option value="'. $arr->HARGA_JASA.'"></option>';}
                                echo '</select>
                              </div>

                              <div style="display:none;">
                                <select class="form-control" id="satuan" style="width: 100%;" disabled>';
                                foreach($dataJasa as $arr ){  echo '<option value="'. $arr->SATUAN_JASA.'"></option>';}
                                echo '</select>
                              </div>

                              <div class="form-group col-xs-3">
                                <label>Harga</label><br>
                                <div class="input-group">
                                  <span class="input-group-addon"  id="txtSatuan">Rp. </span>
                                  <input disabled type="text" class="form-control" id="txtHarga" >
                                </div>
                              </div>

                              <div class="form-group col-xs-3">
                                <label>QTY</label><br>
                                <div class="input-group">
                                <input type="text" class="form-control" id="qty">
                                  <span class="input-group-addon"  id="txtSatuan1"> </span>
                                </div>
                              </div>

                            </div>
                      <br><br>' ;

                    echo '<div id="detail" class="col-xs-12">';
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
              <h3 class="box-title">Data Penjualan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor Nota</th>
                  <th>ID PEGAWAI</th>
                  <th>ID CUSTOMER</th>
                  <th>ID KANTOR</th>
                  <th>Harga Total</th>
                  <th>Tanggal PENJUALAN</th>
                  <th>KETERANGAN</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataPenjualan as $arrr ){
                     echo'<tr>
                            <td><a href=/transaksi/showPenjualan/'.$arrr->ID_NOTA.'> '.$arrr->ID_NOTA.'</a></td>

                            ';
                            $kantor = $arrr->ID_KANTOR;
                            $pegawai = $arrr->ID_PEGAWAI;
                            $customer = $arrr->ID_CUSTOMER;

                            foreach ($dataPegawai as $arr ){
                              if ($pegawai == $arr->ID_PEGAWAI) {
                                echo '<td>'.$arr->NAMA_PEGAWAI.'</td>';
                              }
                            }

                            foreach ($dataCustomer as $arr ){
                              if ($customer == $arr->ID_CUSTOMER) {
                                echo '<td>'.$arr->NAMA_CUSTOMER.'</td>';
                              }
                            }

                            foreach ($dataKantor as $arr ){
                              if ($kantor == $arr->ID_KANTOR) {
                                echo '<td>'.$arr->NAMA_KANTOR.'</td>';
                              }
                            }

                            echo '
                            <td>'.$arrr->HARGA_TOTAL_JUAL.'</td>
                            <td>'.$arrr->TGL_JUAL.'</td>
                            <td>'.$arrr->KETERANGAN_JUAL.'</td>
                          </tr>
                      ';
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
    autoclose: true, format: 'dd-mm-yyyy'
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

  function jasaChanged(i){
    $("#harga").prop('selectedIndex', i);
    $("#txtHarga").val($("#harga").val());
    $("#satuan").prop('selectedIndex', i);
    $("#txtSatuan1").html($("#satuan").val());
  }
  $(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});



  $(document).ready(function(){


    $("#harga").prop('selectedIndex', 0);
    $("#satuan").prop('selectedIndex', 0);
    $("#txtHarga").val($("#harga").val());
    $("#txtSatuan1").html($("#satuan").val());

    $('#hargaTot').number(true,0,',','.');
    $('#txtHarga').number(true,0,',','.');
    $('#qty').number(true,0,',','.');
    var idx = 0;
    $('.qty').on('keyup change',function(){
      $('.subt').val($(this).val() * 1.50);
    });

    $("#tambah").click(function(){
      var jasa = $("#jasa").prop('selectedIndex');
      var harga = $('#txtHarga').val();
      var satuan = $("#satuan").val();
      var qty = $('#qty').val();
      var subtotal = qty*harga;
      var total=0;

      var newdiv ='<div class="form-group" > <div class="col-xs-12" id="det'+idx+'" style="border-bottom:1px solid blue;margin-bottom:2px;padding-bottom:5px;" > <div class="col-xs-3"> <label>Nama Jasa</label> <select class="form-control select2" name="idJasa[]" id=jasa'+idx+'  style="width: 100%;"> <?php echo ''; $i = 0 ; foreach($dataJasa as $arr ){  echo '<option value="'. $arr->ID_JASA.'">'. $arr->NAMA_JASA;  echo '</option>';}?></select> </div> <div class="form-group  col-xs-2"  >  <label>Harga </label> <div class="input-group"> <span class="input-group-addon">Rp.</span> <input type="text" name="harga[]" id=hrg'+idx + ' onkeyup="hrgGanti('+idx+')" class="form-control" >  </div> </div> <div class="form-group  col-xs-2"  > <label>QTY</label> <br> <div class="input-group"> <input type="text" name="quantity[]" id=qty'+idx+' onkeyup="qtyGanti('+idx+')" class="form-control"> <span class="input-group-addon" name="satuan">'+satuan+'</span> </div> </div>  <div class="form-group  col-xs-3" ><label>Subtotal</label> <div class="input-group"> <span class="input-group-addon">Rp.</span><input  type="text" id=subt'+idx+' name="subtotal[]" class="form-control subt"></div></div>  <div class="col-xs-1"><label>Hapus</label> <div class="hapus" onclick="hapus('+idx+')" style="width:20px;height:100%; background-color:red; text-align:center;">X</div><br></div> </div></div>';

      $("#detail").append(newdiv );

      $('#hrg'+idx).number(true,0,',','.');
      $('#qty'+idx).number(true,0,',','.');
      $('#subt'+idx).number(true,0,',','.');

      $("#jasa"+idx).prop('selectedIndex', jasa);
      $("#hrg"+idx).val(harga);
      $("#qty"+idx).val(qty);
      $("#subt"+idx).val(subtotal);

      idx++;
      for (i = 0; i <= idx; i++) {
        if( $('#subt'+i).length )
        {
          var tempSub =  parseInt($("#subt"+i).val());
          total = (total + tempSub);
          $("#hargaTot").val(total);
          $('#hargaTot').number(true,0,',','.');
        }
      }
    });

  });
</script>
</html>
