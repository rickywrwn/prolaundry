<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Jasa</title>
    @include('layouts.head')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  </head>
  <body class="skin-blue fixed sidebar-mini" style="height: auto;">
    @include('layouts.nav');

    <div class="content-wrapper">
      <section class="content">

        <?php
          foreach ($dataJasa as $arr ){
            $idJasa= $arr->ID_JASA;
            $namaJasa= $arr->NAMA_JASA;
            $hargaDry= $arr->HARGA_JASA;
            $ket= $arr->KETERANGAN_JASA;
            $stat= $arr->STATUS_JASA;
          }
        ?>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Update Jasa</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <div class="col-xs-5">
                  <?php
                      echo Form::open(['url' => '/jasa/'.$idJasa, 'method' => 'put']);
                        echo csrf_field() ;
                        echo '<label for="lblId">ID Jasa</label>'  . Form::text('idJasa',$idJasa,['class' => 'form-control', 'placeholder' => 'ID Jasa ','required'=>'required'] );
                        echo '<label for="lblNama">Nama Jasa</label>' . Form::text('namaJasa',$namaJasa,['class' => 'form-control', 'placeholder' => 'Nama Jasa ','required'=>'required'] );
                        echo '<label for="lblDry">Harga </label>'   . Form::number('hargaDry',$hargaDry,['class' => 'form-control', 'placeholder' => 'Harga  ','required'=>'required'] );

                        echo '
                          <label for="lbl">Satuan</label>
                          <div class="form-group">
                            <label>
                              <input type="radio" name="satuan" class="minimal" value="Kg" checked>&nbsp Kg &nbsp&nbsp&nbsp&nbsp
                            </label>
                            <label>
                              <input type="radio" name="satuan" class="minimal" value="Pcs" >&nbsp Pcs
                            </label>
                          </div>';

                        echo '<label for="lblKet">Keterangan</label>' .Form::text('ketJasa',$ket,['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                        echo '<label for="lblStatus">Status</label>' .Form::number('statusJasa',$stat,['class' => 'form-control', 'placeholder' => 'Status ','required'=>'required'] );
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
    <!-- iCheck 1.0.1 -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
  <script>
    $(document).ready(function(){
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
    });
  </script>
</html>
