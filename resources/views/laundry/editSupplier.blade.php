
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Supplier</title>
    @include('layouts.head');
  </head>
  <body class="skin-blue fixed sidebar-mini" style="height: auto;">
    <div class="content-wrapper">
      @include('layouts.nav')
      <?php
        foreach ($dataSupplier as $arr ){
          $idSupplier= $arr->ID_SUPPLIER;
          $namaSupplier= $arr->NAMA_SUPPLIER;
          $alamatSupplier= $arr->ALAMAT_SUPPLIER;
          $telpSupplier= $arr->TELP_SUPPLIER;
          $namaCP= $arr->NAMA_CP;
          $telpCP= $arr->TELP_CP;
          $ketSupplier= $arr->KETERANGAN_SUPPLIER;
          $statusSupplier= $arr->STATUS_SUPPLIER;
        }
      ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Supplier</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
              <div class="col-xs-5">
                <?php
                  echo Form::open(['url' => '/supplier/'.$idSupplier, 'method' => 'put']);
                    echo csrf_field() ;
                    echo '<label for="lblId">ID Supplier</label>'  . Form::text('idSupplier',$idSupplier,['class' => 'form-control', 'placeholder' => 'ID Supplier','required'=>'required'] );
                    echo '<label for="lblNama">Nama Supplier</label>' . Form::text('namaSupplier',$namaSupplier,['class' => 'form-control', 'placeholder' => 'Nama Supplier ','required'=>'required'] );
                    echo '<label for="lblAlamat">Alama Suppliert</label>'   . Form::text('alamatSupplier',$alamatSupplier,['class' => 'form-control', 'placeholder' => 'Alamat Supplier ','required'=>'required'] );
                    echo '<label for="lblTelp">Nomor Telepon</label>'   . Form::number('telpSupplier',$telpSupplier,['class' => 'form-control', 'placeholder' => 'Nomor Telepon ','required'=>'required'] );
                    echo '<label for="lblKet">Nama CP </label>'   . Form::text('namaCP',$namaCP,['class' => 'form-control', 'placeholder' => 'Nama Contact Person ','required'=>'required'] );
                    echo '<label for="lblStatus">No Telp CP </label>'   . Form::number('telpCP',$telpCP,['class' => 'form-control', 'placeholder' => 'No Telp Contact Person ','required'=>'required'] );
                    echo '<label for="lblKet">Keterangan</label>'   . Form::text('ketSupplier',$ketSupplier,['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                    echo '<label for="lblStatus">Status</label>'   . Form::number('statusSupplier',$statusSupplier,['class' => 'form-control', 'placeholder' => 'Status ','required'=>'required'] );
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
  @include('layouts.footer');
</html>
