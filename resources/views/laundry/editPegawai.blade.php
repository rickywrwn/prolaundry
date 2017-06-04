<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Pegawai</title>
    @include('layouts.head')
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  </head>

  <body class="skin-blue fixed sidebar-mini" style="height: auto;">

    @include('layouts.nav')

    <div class="content-wrapper">
      <?php
        foreach ($dataPegawai as $arr ){
          $idPegawai= $arr->ID_PEGAWAI;
          $namaPegawai= $arr->NAMA_PEGAWAI;
          $idKantor= $arr->ID_KANTOR;
          $namaPegawai= $arr->NAMA_PEGAWAI;
          $alamatPegawai= $arr->ALAMAT_PEGAWAI;
          $telpPegawai= $arr->TELP_PEGAWAI;
          $keterangan= $arr->KET_PEGAWAI;
          $status= $arr->STATUS_PEGAWAI;
        }
      ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Pegawai</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
              <div class="col-xs-5">
                <?php
                  echo Form::open(['url' => '/pegawai/'.$idPegawai, 'method' => 'put']);
                    echo csrf_field() ;
                    echo Form::hidden('idPegawai', $idPegawai);
                    echo '<label>Nama Pegawai</label>'   . Form::text('namaPegawai',$namaPegawai,['class' => 'form-control', 'placeholder' => 'Nama Pegawai ','required'=>'required'] );
                    echo' <label>Cabang Bekerja</label>  <select class="form-control select2" name="idKantor" style="width: 100%;">';
                    foreach ($dataKantor as $arr ){
                      if ($idKantor==$arr->ID_KANTOR) {
                        echo '<option value="'. $arr->ID_KANTOR.'" selected="selected">'. $arr->NAMA_KANTOR.'</option>';
                      }else{
                        echo '<option value="'. $arr->ID_KANTOR.'">'. $arr->NAMA_KANTOR.'</option>';
                      }
                    }
                    echo '</select>';
                    echo '<label>Alamat</label>'   . Form::text('alamatPegawai',$alamatPegawai,['class' => 'form-control', 'placeholder' => 'Alamat ','required'=>'required'] );
                    echo '<label>No Telp</label>'   . Form::number('telpPegawai',$telpPegawai,['class' => 'form-control', 'placeholder' => 'No Telp ','required'=>'required'] );
                    echo '<label>Keterangan</label>'   . Form::text('ketPegawai',$keterangan,['class' => 'form-control', 'placeholder' => 'Keterangan '] );
                    echo '<label>Status</label>'   . Form::number('statusPegawai',$status,['class' => 'form-control', 'placeholder' => 'Status ','required'=>'required'] );
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
  <!-- Select2 -->
  <script src="../../plugins/select2/select2.full.min.js"></script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();
    });

  </script>
</html>
