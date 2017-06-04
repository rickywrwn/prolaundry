
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Customer</title>
    @include('layouts.head');
  </head>
  <body class="skin-blue fixed sidebar-mini" style="height: auto;">
    <div class="content-wrapper">
      @include('layouts.nav')
      <?php
          foreach ($dataCustomer as $arr ){
            $idCustomer= $arr->ID_CUSTOMER;
            $jenis= $arr->JENIS_CUSTOMER;
            $nama= $arr->NAMA_CUSTOMER;
            $alamat= $arr->ALAMAT_CUSTOMER;
            $telp= $arr->TELP_CUSTOMER;
            $ket= $arr->KETERANGAN_CUSTOMER;
            $status= $arr->STATUS_CUSTOMER;
        }
      ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Customer</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
              <div class="col-xs-5">
                <?php
                  echo Form::open(['url' => '/customer/'.$idCustomer, 'method' => 'put']);
                    echo csrf_field() ;
                    echo '<label for="lblId">ID Customer</label>'  . Form::text('idCustomer',$idCustomer,['class' => 'form-control', 'placeholder' => 'ID Barang','required'=>'required'] );
                    $pribadi = "";
                    $perusahaan = "";
                    if ($jenis == "Pribadi") {
                      $pribadi = "checked";
                    }else{
                      $perusahaan = "checked";
                    }
                    echo '
                      <label for="lbl">Jenis Customer</label>
                        <div class="form-group">
                          <label>
                            <input type="radio" name="jenis" class="minimal" value="Pribadi" '.$pribadi .'>&nbsp Pribadi &nbsp&nbsp&nbsp&nbsp
                          </label>
                          <label>
                            <input type="radio" name="jenis" class="minimal" value="Perusahaan" '.$perusahaan.'>&nbsp Perusahaan
                          </label>
                        </div>';
                    echo '<label for="lblNama">Nama Customer</label>' . Form::text('namaCustomer',$nama,['class' => 'form-control', 'placeholder' => 'Nama Barang ','required'=>'required'] );
                    echo '<label for="lblAlamat">Alamat</label>'   . Form::text('alamatCustomer',$alamat,['class' => 'form-control', 'placeholder' => 'Keterangan ','required'=>'required'] );
                    echo '<label for="lblTelp">Nomor Telepon</label>'   . Form::number('telpCustomer',$telp,['class' => 'form-control', 'placeholder' => 'Status ','required'=>'required'] );
                    echo '<label for="lblKet">Keterangan</label>'   . Form::text('ketCustomer',$ket,['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                    echo '<label for="lblStatus">Status</label>'   . Form::number('statusCustomer',$status,['class' => 'form-control', 'placeholder' => 'Status ','required'=>'required'] );
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
