<!DOCTYPE html>
<html>
<head>
  <title>Supplier</title>
  @include('layouts.head')
</head>

<body class="skin-blue fixed sidebar-mini" style="height: auto;">
  @include('layouts.nav')
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Supplier</th>
                  <th>Nama Supplier</th>
                  <th>Alamat Supplier</th>
                  <th>Telepon Supplier</th>
                  <th>Nama CP</th>
                  <th>Telp CP</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataSupplier as $arr ){
                     echo'<tr>
                            <td>'.$arr->ID_SUPPLIER.'</td>
                            <td>'.$arr->NAMA_SUPPLIER.'</td>
                            <td>'.$arr->ALAMAT_SUPPLIER.'</td>
                            <td>'.$arr->TELP_SUPPLIER.'</td>
                            <td>'.$arr->NAMA_CP.'</td>
                            <td>'.$arr->TELP_CP.'</td>
                            <td>'.$arr->KETERANGAN_SUPPLIER.'</td>
                            <td>'.$arr->STATUS_SUPPLIER.'</td>
                            <td> <a class="btn btn-info" href=/supplier/editSupplier/'.$arr->ID_SUPPLIER.'> Edit</a>
                            <a class="btn btn-info" href=/supplier/deleteSupplier/'.$arr->ID_SUPPLIER.'> Delete</a> </td>
                          </tr>';
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Telepon Supplier</th>
                    <th>Nama CP</th>
                    <th>Telp CP</th>
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
        <h3 class="box-title">Insert Barang</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group">
            <div class="col-xs-5">
              <?php
                  echo Form::open(['url' => '/supplier/', 'method' => 'post']);
                    echo csrf_field() ;
                      echo '
                    <label for="lblNamaSupplier">Nama Supplier</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-cubes"></i>
                      </div>
                      '.Form::text('namaSupplier','',['class' => 'form-control', 'placeholder' => 'Nama Supplier ','required'=>'required'] ).'
                    </div>';

                    echo '
                    <label for="lblAlamatSupplier">Alamat Supplier</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                      </div>
                      '.Form::text('alamatSupplier','',['class' => 'form-control', 'placeholder' => 'Alamat ','required'=>'required'] ).'
                    </div>';

                    echo '
                    <label for="lblTelpSupplier">Telepon Supplier</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      '.Form::number('telpSupplier','',['class' => 'form-control', 'placeholder' => 'Nomor Telepon  ','required'=>'required'] ).'
                    </div>';

                    echo '
                    <label for="lblNamaCP">Nama Contact Person</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-child"></i>
                      </div>
                      '.Form::text('namaCP','',['class' => 'form-control', 'placeholder' => 'Nama Contact Person ','required'=>'required'] ).'
                    </div>';

                    echo '
                    <label for="lblTelpCP">Telepon Contact Person</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      '.Form::number('telpCP','',['class' => 'form-control', 'placeholder' => 'Telepon Contact Person ','required'=>'required'] ).'
                    </div>';

                    echo '
                    <label for="lblKetSupplier">Keterangan</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-plus"></i>
                      </div>
                      '.Form::text('ketSupplier','',['class' => 'form-control', 'placeholder' => 'Keterangan '] ).'
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
<script>
  $(function () {
    $("#table1").DataTable();
  });
</script>
</html>
