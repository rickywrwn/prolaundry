<!DOCTYPE html>
<html>
<head>
  <title>Jasa</title>
  @include('layouts.head')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
</head>

<body class="skin-blue fixed sidebar-mini" style="height: auto;">
  @include('layouts.nav')
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jasa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Jasa</th>
                  <th>Nama Jasa</th>
                  <th>Harga</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataJasa as $arr ){
                     echo'<tr>
                            <td>'.$arr->ID_JASA.'</td>
                            <td>'.$arr->NAMA_JASA.'</td>
                            <td>'.$arr->HARGA_JASA.'</td>
                            <td>'.$arr->SATUAN_JASA.'</td>
                            <td>'.$arr->KETERANGAN_JASA.'</td>
                            <td>'.$arr->STATUS_JASA.'</td>
                            <td> <a class="btn btn-info " href=/jasa/editJasa/'.$arr->ID_JASA.'> Edit</a>
                            <a class="btn btn-info"href=/jasa/deleteJasa/'.$arr->ID_JASA.'> Delete</a> </td>
                          </tr>';
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Jasa</th>
                    <th>Nama Jasa</th>
                    <th>Harga Jasa</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
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

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Insert Jasa</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">
            <div class="col-xs-5">
              <?php
                  echo Form::open(['url' => '/jasa/', 'method' => 'post']);
                    echo csrf_field() ;

                    echo '
                      <label for="lblNamaJasa">Nama Jasa</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-black-tie"></i>
                        </div>
                        '.Form::text('namaJasa','',['class' => 'form-control', 'placeholder' => 'Nama Jasa ','required'] ).'
                      </div>';

                    echo '
                      <label for="lblHargaDry">Harga Dry Clean</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-money"></i>
                        </div>
                        '.Form::number('hargaDry','',['class' => 'form-control', 'placeholder' => 'Harga  ','required'=>'required'] ).'
                      </div>';

                      echo '
                        <label for="lbl">Satuan</label>
                          <div class="form-group">
                            <label>
                              <input type="radio" name="satuan" class="minimal" value="Kg" checked>&nbsp Kg &nbsp&nbsp&nbsp&nbsp
                            </label>
                            <label>
                              <input type="radio" name="satuan" class="minimal" value="Pcs" >&nbsp Pcs
                            </label>
                          </div>';

                    echo '
                      <label for="lblKetJasa">Keterangan</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-plus"></i>
                        </div>
                        '.Form::text('ketJasa','',['class' => 'form-control', 'placeholder' => 'Keterangan '] ).'
                      </div>';

                    echo '<br>';
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
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $("#table1").DataTable();
    //iCheck for checkbox and radio inputs


  });


    $(document).ready(function(){
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });

    });
</script>
</html>
