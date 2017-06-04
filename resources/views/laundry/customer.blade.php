<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Customer</title>
    @include('layouts.head');
  </head>
  <body class="skin-blue fixed sidebar-mini" style="height: auto;">
    @include('layouts.nav');
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Customer</th>
                  <th>Jenis Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat Customer</th>
                  <th>Telepon Customer</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataCustomer as $arr ){
                     echo'<tr>
                            <td>'.$arr->ID_CUSTOMER.'</td>
                            <td>'.$arr->JENIS_CUSTOMER.'</td>
                            <td>'.$arr->NAMA_CUSTOMER.'</td>
                            <td>'.$arr->ALAMAT_CUSTOMER.'</td>
                            <td>'.$arr->TELP_CUSTOMER.'</td>
                            <td>'.$arr->KETERANGAN_CUSTOMER.'</td>
                            <td>'.$arr->STATUS_CUSTOMER.'</td>
                            <td> <a class="btn btn-info" href=/customer/editCustomer/'.$arr->ID_CUSTOMER.'> Edit </a>
                             <a class="btn btn-info"  href=/customer/deleteCustomer/'.$arr->ID_CUSTOMER.'> Delete</a> </td>
                          </tr>';
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Customer</th>
                    <th>Jenis Customer</th>
                    <th>Nama Customer</th>
                    <th>Alamat Customer</th>
                    <th>Telepon Customer</th>
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
        <h3 class="box-title">Insert Pelanggan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">
            <div class="col-xs-5">
              <?php
                  echo Form::open(['url' => '/customer/', 'method' => 'post']);
                    echo csrf_field() ;

                    echo '
                      <label for="lbl">Jenis Customer</label>
                        <div class="form-group">
                          <label>
                            <input type="radio" name="jenis" class="minimal" value="Pribadi" checked>&nbsp Pribadi &nbsp&nbsp&nbsp&nbsp
                          </label>
                          <label>
                            <input type="radio" name="jenis" class="minimal" value="Perusahaan" >&nbsp Perusahaan
                          </label>
                        </div>';

                    echo '
                      <label for="lblNamaPelanggan">Nama Pelanggan</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-child"></i>
                        </div>
                        '. Form::text('namaCustomer','',['class' => 'form-control', 'placeholder' => 'Nama Pelanggan','required'=>'required'] ).'
                      </div>';

                      echo '
                        <label for="lblAlamatPelanggan">Alamat Pelanggan</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                          </div>
                          '.Form::text('alamatCustomer','',['class' => 'form-control', 'placeholder' => 'Alamat','required'=>'required'] ).'
                        </div>';


                    echo '
                      <label for="lblTelpPelanggan">Telepon Pelanggan</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        '.Form::number('telpCustomer','',['class' => 'form-control', 'placeholder' => 'Nomor Telepon','required'=>'required'] ).'
                      </div>';

                      echo '
                        <label for="lblKetPelanggan">Keterangan</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-plus"></i>
                          </div>
                          '.Form::text('ketCustomer','',['class' => 'form-control', 'placeholder' => 'Keterangan '] ).'
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
  @include('layouts.footer');
  <script>
    $(function () {
      $("#table1").DataTable();
    });
  </script>
</html>
