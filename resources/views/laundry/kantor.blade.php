<!DOCTYPE html>
<html>
<head>
  <title>Cabang</title>
  @include('layouts.head')
</head>

<body class="skin-blue fixed sidebar-mini" style="height: auto;">
<!-- top -->
@include ('layouts.nav');
<!-- content -->
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Cabang</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="table1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID Kantor</th>
                <th>Nama Cabang</th>
                <th>Alamat Cabang</th>
                <th>Telp Cabang</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php
              foreach ($dataCabang as $arr ){

                   echo'<tr>
                          <td>'.$arr->ID_KANTOR.'</td>
                          <td>'.$arr->NAMA_KANTOR.'</td>
                          <td>'.$arr->ALAMAT_KANTOR.'</td>
                          <td>'.$arr->TELP_KANTOR.'</td>
                          <td>'.$arr->KETERANGAN_KANTOR.'</td>
                          <td> <a class="btn btn-info " href=/kantor/editKantor/'.$arr->ID_KANTOR.'> Edit</a>
                          <a class="btn btn-info" href=/kantor/deleteKantor/'.$arr->ID_KANTOR.'> Delete</a> </td>
                        </tr>';

              }
              ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>ID Kantor</th>
                  <th>Nama Cabang</th>
                  <th>Alamat Cabang</th>
                  <th>Telp Cabang</th>
                  <th>Keterangan</th>
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
      <h3 class="box-title">Insert Cabang</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
      <div class="form-group">
          <div class="col-xs-5">
            <?php
                echo Form::open(['url' => '/kantor/', 'method' => 'post']);
                  echo csrf_field() ;
                  echo '
                    <label for="lblNamaKantor">Nama Cabang</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-building"></i>
                      </div>
                      '.Form::text('namaKantor','',['class' => 'form-control', 'placeholder' => 'Nama Cabang ','required'=>'required'] ).'
                    </div>';
                  echo '
                    <label for="lblALamatKantor">Alamat Cabang</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                      </div>
                      '.Form::text('alamatKantor','',['class' => 'form-control', 'placeholder' => 'Alamat ','required'=>'required'] ).'
                    </div>';
                  echo '
                    <label for="lblTelpKantor">Nomor Telepon</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      '.Form::number('telpKantor','',['class' => 'form-control', 'placeholder' => 'Nomor Telepon ','required'=>'required'] ).'
                    </div>';
                  echo '
                    <label for="lblKetKantor">Keterangan Tambahan</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-plus"></i>
                      </div>
                      '.Form::text('ketKantor','',['class' => 'form-control', 'placeholder' => 'Keterangan '] ).'
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


</body>

@include('layouts/footer')
<!-- page script -->
<script>
  $(function () {
    $("#table1").DataTable();
  });
</script>
</html>
