<!DOCTYPE html>
<html>
<head>
  <title>Gudang <?php echo $lokasi; ?></title>
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
              <h3 class="box-title">Stok Gudang <?php echo $lokasi ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Gudang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($dataGudang as $arrGudang ){
                  echo '<tr>';
                  $kantor=$arrGudang->ID_KANTOR;
                  $barang =$arrGudang->ID_BARANG;
                  foreach ($dataKantor as $arr ){
                    if ($kantor == $arr->ID_KANTOR) {
                      echo '<td>'.$arr->NAMA_KANTOR.'</td>';
                    }
                  }

                  foreach ($dataBarang as $arr ){
                    if ($barang == $arr->ID_BARANG) {
                      echo '<td>'.$arr->NAMA_BARANG.'</td>';
                    }
                  }

                   echo'
                          <td>'.$arrGudang->STOK_BARANG.'</td>
                        </tr>';
                }

                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Cabang</th>
                    <th>ID Barang</th>
                    <th>Jumlah Barang</th>
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

  </div>


</body>

@include('layouts.footer')
<script>
  $(function () {
    $("#table1").DataTable();
  });
</script>
</html>
