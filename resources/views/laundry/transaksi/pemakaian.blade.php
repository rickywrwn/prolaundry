<!DOCTYPE html>
<html>
<head>
  <title>Pemakaian Barang</title>
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
        <h3 class="box-title">Pemakaian Barang</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">
            <div class="col-xs-12 " >
              <?php

                  echo Form::open(['url' => 'transaksi/pemakaian/', 'method' => 'post' ]);
                    echo csrf_field() ;

                    echo "<div class='col-xs-3'>";
                    echo' <label>Gudang Pengambilan</label>  <select class="form-control select2" id="gudang" name="idGudang" onchange="gudangChanged(this.selectedIndex)" style="width: 100%;">';
                    foreach ($dataGudang as $arr ){
                      echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                    }echo '</select>';
                    echo "</div>";

                    echo "<div class='col-xs-3'>";
                    echo' <label>Karyawan Pengambil</label>  <select class="form-control select2" id="pegawai" name="idPegawai" style="width: 100%;">';
                    foreach ($dataPegawai as $arr ){
                      echo '<option value="'. $arr->ID_PEGAWAI.'">'. $arr->NAMA_PEGAWAI.'</option>';
                    }echo '</select>';
                    echo "</div>";


                    echo '
                    <div class="form-group col-xs-3">
                      <label for="hrg">Keterangan</label>
                      <div class="input-group">
                        '.Form::text('keterangan','',['class' => 'form-control', 'placeholder' => 'Keterangan ','id'=>'keterangan'] ).'
                      </div>
                    </div>
                      ';
                    echo '<br> <br>';

                    echo '<div class="form-group">
                            <div class="col-xs-12" style="border-bottom:1px solid blue ;margin-bottom:2px; padding-bottom:5px;" >
                              <div class="col-xs-3">
                                <label>Nama Barang</label>
                                <select class="form-control select2" id="barang" style="width: 100%;">';
                                foreach($dataStok as $arrr ){  echo '<option value="'. $arr->ID_BARANG.'">';

                                  $barang = $arrr->ID_BARANG;
                                  foreach($dataBarang as $arr ){
                                    if ($barang == $arr->ID_BARANG ) {
                                      echo $arr->NAMA_BARANG;
                                    }
                                  }

                                echo '</option>'

                                ;}
                                echo '</select>
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

                    echo Form::submit('Insert',['class' => 'btn btn-info pull-right','onclick' => 'return confirm("Apakah Anda Yakin?");']);
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
              <h3 class="box-title">Data Pemakaian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Pemakaian</th>
                  <th>ID Gudang</th>
                  <th>Tanggal Pembelian</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>

                <?php

                $kantorr="";
                foreach ($dataPemakaian as $arrr ){
                     echo'<tr>
                            <td><a href=/transaksi/showPemakaian/'.$arrr->ID_PEMAKAIAN.'> '.$arrr->ID_PEMAKAIAN.'</a></td>

                            ';
                            $kantor = $arrr->ID_KANTOR;
                            $barang = $arrr->ID_BARANG;


                            foreach ($dataBarang as $arr ){
                              if ($barang == $arr->ID_BARANG) {
                                echo '<td>'.$arr->NAMA_BARANG.'</td>';
                              }
                            }

                            foreach ($dataGudang as $arr ){
                              if ($kantor == $arr->ID_KANTOR) {
                                echo '<td>'.$arr->NAMA_KANTOR.'</td>';
                                $kantorr = $arr->ID_KANTOR;
                              }
                            }

                            echo '<td>'.$arrr->TANGGAL.'</td>';
                            echo '<td>'.$arrr->KETERANGAN.'</td>';
                          echo '</tr>';

                }
                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Pemakaian</th>
                    <th>ID Gudang</th>
                    <th>Tanggal Pembelian</th>
                    <th>Keterangan</th>
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

  $(function () {
    $("#table1").DataTable();
    $(".select2").select2();
    $('#qty').number(true,0,',','.');
  });

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true, format: 'dd/MM/yyyy'
  });


  function gudangChanged(i){
    $("#isiGudang").val($("#gudang").val());
  }

  function hapus(i) {
    document.getElementById("det"+i).remove();
  }


  $(document).ready(function(){
      var idx = 0;

    $("#tambah").click(function(){
      var barang = $("#barang").prop('selectedIndex');
      var qty = $('#qty').val();
      var satuan = $('#txtSatuan').val();

      var newdiv ='<div class="form-group" > <div class="col-xs-12" id="det'+idx+'" style="border-bottom:1px solid blue;margin-bottom:2px;padding-bottom:5px;" > <div class="col-xs-3"> <label>Nama Barang</label> <select class="form-control select2" name="idBarang[]" id=brg'+idx+'  style="width: 100%;"> <?php echo ''; $i = 0 ; foreach($dataBarang as $arr ){  echo '<option value="'. $arr->ID_BARANG.'">'. $arr->NAMA_BARANG;  echo '</option>';}?></select> </div>  <div class="col-xs-2"><label>QTY</label><br> <div class="input-group"> <input type="text" name="quantity[]" id=qty'+idx+' class="form-control qty"> <span class="input-group-addon"  id="satuan"></span> </div></div>  <div class="col-xs-1"><label>Hapus</label> <div class="hapus" onclick="hapus('+idx+')" style="width:20px;height:100%; background-color:red; text-align:center;">X</div><br></div> </div></div>';

      $("#detail").append(newdiv );

      $('#qty'+idx).number(true,0,',','.');
      $("#brg"+idx).prop('selectedIndex', barang);
      $("#qty"+idx).val(qty);

      idx++;
    });
  });
</script>
</html>
