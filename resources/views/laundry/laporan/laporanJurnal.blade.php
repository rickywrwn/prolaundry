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

    <div class="col-md-10">
    <div class="box box-primary" style="margin-top:3%;">
      <div class="box-header with-border">
        <h3 class="box-title">Jurnal</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">
              <?php

                  echo Form::open(['url' => 'laporan/jurnal/', 'method' => 'post']);
                    echo csrf_field() ;
                    echo ' <input type="checkbox" name="cbGudang">'; echo' <label>Gudang Tujuan</label> ';
                    echo '<div class="input-group">';
                    echo ' <select class="form-control select2" name="idKantor" style="width: 100%;">';
                    foreach ($dataGudang as $arr ){
                      echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                    }echo '</select>';

                      echo'
                      <div class="form-group">
                        <label>Date range button:</label>

                        <div class="input-group">
                          <button type="button" class="btn btn-default pull-right" id="daterange-btn" >

                            <span> Pilih Tanggal </span>
                            <i class="fa fa-caret-down"></i>
                          </button>
                        </div>
                      </div>
                      ';

                    echo "</div>";

                    echo Form::hidden('awal','',['id' => 'tglAwal'] );
                    echo Form::hidden('akhir','',['id' => 'tglAkhir'] );


                    echo '<div id="detail" class="col-xs-12">';
                    // bagian detail


                    echo '</div>';

                    echo Form::submit('Insert',['class' => 'btn btn-info pull-right']);
                  echo Form::close();
              ?>
        </div>
          <!-- /.box-body -->
      </div>
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

//Date range picker
$('#reservation').daterangepicker();


//Date range as a button
$('#daterange-btn').daterangepicker(
    {
      ranges: {
        'Hari Ini': [moment(), moment()],
        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
        '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(7, 'days'),
      endDate: moment(),
      opens: 'right'
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('D MMMM , YYYY') + ' - ' + end.format('D MMMM, YYYY'));
      $('#tglAwal').val(start.format('YYYY-MM-DD'));
      $('#tglAkhir').val(end.format('YYYY-MM-DD'));
    }
);
</script>
</html>
