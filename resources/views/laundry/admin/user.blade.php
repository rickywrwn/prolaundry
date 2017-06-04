<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User</title>
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
                <h3 class="box-title">Data User</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama Pegawai</th>
                    <th>Cabang Terdaftar</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  foreach ($dataUser as $arr ){

                       echo'<tr>
                              <td>'.$arr->username.'</td>
                              <td>'.$arr->ID_KANTOR.'</td>
                              <td>'.$arr->ID_PEGAWAI.'</td>
                              <td>'.$arr->ROLE.'</td>
                              <td>'.$arr->STATUS.'</td>
                              <td> <a class="btn btn-info " href=/pegawai/editUser/'.$arr->username.'> Edit</a>
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

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Insert User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
              <div class="col-xs-5">
                <?php

                  echo Form::open(['url' => 'admin/user/', 'method' => 'post']);
                    echo csrf_field() ;
                    echo '
                      <label for="lblNamaPegawai">Username</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-child"></i>
                        </div>
                        '.Form::text('username','',['class' => 'form-control', 'placeholder' => 'Username ','required'=>'required'] ).'
                      </div>';

                      echo '
                        <label for="lblNamaPegawai">Password</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-child"></i>
                          </div>
                          '.Form::text('password','',['class' => 'form-control', 'placeholder' => 'Password ','required'=>'required'] ).'
                        </div>';
                        echo '<br>';
                        echo '
                            <div class="form-group">
                              <label for="lbl">Apakah User Ini Merupakan Admin?</label>
                              <div class="input-group">
                                <label>
                                  <input type="radio" name="admin" class="minimal" value="0" checked>&nbsp Tidak &nbsp&nbsp&nbsp&nbsp
                                </label>
                                <label>
                                  <input type="radio" name="admin" class="minimal" value="1">&nbsp Ya
                                </label>
                              </div>
                            </div>';

                    echo' <label>Cabang Bekerja</label>  <select class="form-control select2" name="idKantor" style="width: 100%;">';
                    foreach ($dataKantor as $arr ){
                      echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                    }
                    echo '</select>';

                    echo' <label>Milik Karyawan</label>  <select class="form-control select2" name="idPegawai" style="width: 100%;">';
                    foreach ($dataPegawai as $arr ){
                      echo '<option value="'. $arr->ID_PEGAWAI.'">'. $arr->NAMA_PEGAWAI.'</option>';
                    }
                    echo '</select>';

                    echo '<br>';echo '<br>';
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
