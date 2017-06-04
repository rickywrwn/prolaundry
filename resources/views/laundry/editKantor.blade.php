<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Cabang</title>
    @include('layouts.head')
      <style>
      </style>
  </head>
  <body class="skin-blue fixed sidebar-mini" style="height: auto;">
    @include('layouts.nav');

    <div class="content-wrapper">
      <section class="content">

        <?php
          foreach ($dataCabang as $arr ){
            $idKantor= $arr->ID_KANTOR;
            $namaKantor= $arr->NAMA_KANTOR;
            $alamatKantor= $arr->ALAMAT_KANTOR;
            $telpKantor= $arr->TELP_KANTOR;
            $ketKantor= $arr->KETERANGAN_KANTOR;
          }
        ?>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Update Cabang</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <div class="col-xs-5">
                  <?php
                      echo Form::open(['url' => '/kantor/'.$idKantor, 'method' => 'put']);
                        echo csrf_field() ;
                        echo '<label for="lblId">ID Cabang</label>'  . Form::text('idKantor',$idKantor,['class' => 'form-control', 'placeholder' => 'ID ','required'=>'required'] );
                        echo '<label for="lblNama">Nama Cabang</label>' . Form::text('namaKantor',$namaKantor,['class' => 'form-control', 'placeholder' => 'Nama Cabang ','required'=>'required'] );
                        echo '<label for="lblAlamat">Alamat</label>'   . Form::text('alamatKantor',$alamatKantor,['class' => 'form-control', 'placeholder' => 'Alamat ','required'=>'required'] );
                        echo '<label for="lblTelp">No Telp</label>' .Form::text('telpKantor',$telpKantor,['class' => 'form-control', 'placeholder' => 'No Telp ','required'=>'required'] );
                        echo '<label for="lblKet">Keterangan</label>' .Form::text('ketKantor',$ketKantor,['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                        echo '<br>';
                        echo Form::submit('Update',['class' => 'btn btn-info pull-right']);
                      echo Form::close();
                  ?>
              </div>
            </div>
            <!-- /.box-body -->
        </div>

      </div><!-- content wrapper -->

      </section>
    </div>
  </body>

  @include('layouts/footer')
</html>
