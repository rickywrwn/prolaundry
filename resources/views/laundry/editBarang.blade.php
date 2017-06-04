
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
                    echo '<label for="lblId">ID Barang</label>'  . Form::text('idBarang',$idBarang,['class' => 'form-control', 'placeholder' => 'ID Barang','required'=>'required'] );
                    echo '<label for="lblNama">Nama Barang</label>' . Form::text('namaBarang',$namaBarang,['class' => 'form-control', 'placeholder' => 'Nama Barang ','required'=>'required'] );
                    echo '<label for="lblKet">Keterangan</label>'   . Form::text('ketBarang',$ket,['class' => 'form-control', 'placeholder' => 'Keterangan ','required'=>'required'] );
                    echo '<label for="lblStatus">Status</label>'   . Form::number('statusBarang',$status,['class' => 'form-control', 'placeholder' => 'Status ','required'=>'required'] );
                    echo '<br>';
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
