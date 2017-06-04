<!DOCTYPE html>
<html>
<head>
  <title>Barang</title>
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
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Satuan Barang</th>
                  <th>Keterangan Barang</th>
                  <th>Status Barang</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataBarang as $arr ){

                     echo'<tr>
                            <td>'.$arr->ID_BARANG.'</td>
                            <td>'.$arr->NAMA_BARANG.'</td>
                            <td>'.$arr->SATUAN_BARANG.'</td>
                            <td>'.$arr->KETERANGAN_BARANG.'</td>
                            <td>'.$arr->STATUS_BARANG.'</td>
                            <td> <a class="btn btn-info " href=/barang/editBarang/'.$arr->ID_BARANG.'> Edit</a>
                            <a class="btn btn-info"href=/barang/deleteBarang/'.$arr->ID_BARANG.'> Delete</a> </td>
                          </tr>';
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan Barang</th>
                    <th>Keterangan Barang</th>
                    <th>Status Barang</th>
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
                  echo Form::open(['url' => '/barang/', 'method' => 'post']);
                    echo csrf_field() ;
                    echo '
                    <label for="lblNamaBarang">Nama Barang</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-cube"></i>
                      </div>
                      '.Form::text('namaBarang','',['class' => 'form-control', 'placeholder' => 'Nama Barang ','required'] ).'
                    </div>';

                    echo '
                    <label for="lblNamaBarang">Satuan Barang</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-cube"></i>
                      </div>
                      '.Form::text('satuanBarang','',['class' => 'form-control', 'placeholder' => 'Satuan Barang ','required'] ).'
                    </div>';

                    echo '
                    <label for="lblKetBarang">Keterangan</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-plus"></i>
                      </div>
                      '.Form::text('ketBarang','',['class' => 'form-control', 'placeholder' => 'Keterangan '] ).'
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
