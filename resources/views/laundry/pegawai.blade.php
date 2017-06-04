<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pegawai</title>
    @include('layouts.head')
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  </head>

  <body class="skin-blue fixed sidebar-mini" style="height: auto;">

    @include('layouts.nav');

    <div class="content-wrapper">

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Pegawai</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Pegawai</th>
                    <th>ID Cabang</th>
                    <th>Nama Pegawai</th>
                    <th>No Telp</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  foreach ($dataPegawai as $arr ){

                       echo'<tr>
                              <td>'.$arr->ID_PEGAWAI.'</td>
                              <td>'.$arr->ID_KANTOR.'</td>
                              <td>'.$arr->NAMA_PEGAWAI.'</td>
                              <td>'.$arr->TELP_PEGAWAI.'</td>
                              <td>'.$arr->KET_PEGAWAI.'</td>
                              <td>'.$arr->STATUS_PEGAWAI.'</td>
                              <td> <a class="btn btn-info " href=/pegawai/editPegawai/'.$arr->ID_PEGAWAI.'> Edit</a>
                              <a class="btn btn-info"href=/pegawai/deletePegawai/'.$arr->ID_PEGAWAI.'> Delete</a> </td>
                            </tr>';
                  }

                  ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID Pegawai</th>
                      <th>ID Cabang</th>
                      <th>Nama Pegawai</th>
                      <th>No Telp</th>
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
          <h3 class="box-title">Insert Pegawai</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
              <div class="col-xs-5">
                <?php

                  echo Form::open(['url' => '/pegawai/', 'method' => 'post']);
                    echo csrf_field() ;
                    echo '
                      <label for="lblNamaPegawai">Nama Pegawai</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-child"></i>
                        </div>
                        '.Form::text('namaPegawai','',['class' => 'form-control', 'placeholder' => 'Nama Pegawai ','required'=>'required'] ).'
                      </div>';

                    echo' <label>Cabang Bekerja</label>  <select class="form-control select2" name="idKantor" style="width: 100%;">';
                    foreach ($dataKantor as $arr ){
                      echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                    }
                    echo '</select>';


                    echo '
                      <label for="lblAlamatPegawai">Alamat Pegawai</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-home"></i>
                        </div>
                        '.Form::text('alamatPegawai','',['class' => 'form-control', 'placeholder' => 'Alamat ','required'=>'required'] ).'
                      </div>';

                    echo '
                      <label for="lblTelpPegawai">Nomor Telepon</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        '.Form::number('telpPegawai','',['class' => 'form-control', 'placeholder' => 'No Telp ','required'=>'required'] ).'
                      </div>';

                    echo '
                      <label for="lblKetPegawai">Keterangan</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-plus"></i>
                        </div>
                        '.Form::text('ketPegawai','',['class' => 'form-control', 'placeholder' => 'Keterangan '] ).'
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
  <!-- Select2 -->
  <script src="../../plugins/select2/select2.full.min.js"></script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();
    });

  </script>
</html>
