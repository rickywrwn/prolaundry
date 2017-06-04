//untuk datatable

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
              <th>Edit</th>
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
                        <a class="btn btn-info"href=/kantor/deleteKantor/'.$arr->ID_KANTOR.'> Delete</a> </td>
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
                <th>Edit</th>
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

<!-- table selesai -->



<?php
  //sidebarmenu
  $kelasJasa ='class="inactive"';
  $kelasBarang='class="inactive"';
  $kelasSupplier='class="inactive"';
  $gudang='class="inactive"';
  $kelasPegawai='class="inactive"';
  $kelasKantor='class="active"';
  $kelasCustomer='class="inactive"';

  return view('laundry/kantor',['dataCabang'=>$dataCabang , 'kelasKantor'=>$kelasKantor, 'kelasCustomer'=>$kelasCustomer, 'kelasJasa'=>$kelasJasa, 'kelasBarang'=>$kelasBarang, 'kelasSupplier'=>$kelasSupplier, 'gudang'=>$gudang, 'kelasPegawai'=>$kelasPegawai]);

?>


<!-- html untuk insert -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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
                      echo '<label for="lblId">ID Barang</label>'  . Form::text('idBarang','',['class' => 'form-control', 'placeholder' => 'ID Barang'] );
                      echo '<label for="lblNama">Nama Barang</label>' . Form::text('namaBarang','',['class' => 'form-control', 'placeholder' => 'Nama Barang '] );
                      echo '<label for="lblAlamat">Keterangan</label>'   . Form::text('ketBarang','',['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                      echo '<br> <br>';
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
</html>


<!-- EDIT FORM -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Barang</title>
    @include('layouts.head')
  </head>

  <body class="skin-blue fixed sidebar-mini" style="height: auto;">

    <div class="content-wrapper">
      @include('layouts.nav')
      <?php
        foreach ($dataBarang as $arr ){
          $idBarang= $arr->ID_BARANG;
          $namaBarang= $arr->NAMA_BARANG;
          $ket= $arr->KETERANGAN_BARANG;
          $status= $arr->STATUS_BARANG;
        }
      ?>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Barang</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
              <div class="col-xs-5">
                <?php
                  echo Form::open(['url' => '/barang/'.$idBarang, 'method' => 'put']);
                    echo csrf_field() ;
                    echo '<label for="lblId">ID Barang</label>'  . Form::text('idBarang',$idBarang,['class' => 'form-control', 'placeholder' => 'ID Barang'] );
                    echo '<label for="lblNama">Nama Barang</label>' . Form::text('namaBarang',$namaBarang,['class' => 'form-control', 'placeholder' => 'Nama Barang '] );
                    echo '<label for="lblKet">Keterangan</label>'   . Form::text('ketBarang',$ket,['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                    echo '<label for="lblStatus">Status</label>'   . Form::text('statusBarang',$status,['class' => 'form-control', 'placeholder' => 'Status '] );
                    echo '<br> <br>';
                    echo Form::submit('Update',['class' => 'btn btn-info pull-right']);
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
</html>
