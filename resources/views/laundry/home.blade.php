<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  @include('layouts.head')
</head>

<body class="skin-blue fixed sidebar-mini" style="height: auto;">
  @include('layouts.nav')
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Laundry Yang Sedang Diproses</h3>
            </div>
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nota</th>
                  <th>Nama Customer</th>
                  <th>Tgl Trans</th>
                  <th>Tgl Ambil</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataPenjualan as $arr ){
                     echo'<tr>
                           <td><a href=/transaksi/showPenjualan/'.$arr->ID_NOTA.'> '.$arr->ID_NOTA.'</a></td>
                            <td>'.$arr->ID_CUSTOMER.'</td>
                            <td>'.$arr->TGL_JUAL.'</td>
                            <td>'.$arr->TGL_AMBIL.'</td>
                            <td>'.$arr->STATUS.'</td>
                            <td><a class="btn btn-info " href=/homepage/selesai/'.$arr->ID_NOTA.'> Selesai</a></td>
                          </tr>';
                }

                ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-4">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Stok Barang Dibawah 5</h3>
            </div>
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataGudang as $arr ){

                     echo'<tr>
                            <td>'.$arr->ID_BARANG.'</td>
                            <td>'.$arr->STOK_BARANG.'</td>
                          </tr>';
                }

                ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Color & Time Picker</h3>
            </div>
            <div class="box-body">
              <!-- Color Picker -->
              <div class="form-group">
                <label>Color picker:</label>
                <input type="text" class="form-control my-colorpicker1">
              </div>
              <!-- /.form group -->

              <!-- Color Picker -->
              <div class="form-group">
                <label>Color picker with addon:</label>

                <div class="input-group my-colorpicker2">
                  <input type="text" class="form-control">

                  <div class="input-group-addon">
                    <i></i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Time picker:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
      </div>
      <!-- /.row -->
    </section>
  </div>


</body>

@include('layouts.footer')
<script>
  $(function () {
    $("#table1").DataTable();
  });
</script>
</html>
