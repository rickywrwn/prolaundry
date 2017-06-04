<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nota Penjualan</title>
   @include('layouts.head')
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  @include('layouts.nav')
  <div class="content-wrapper" id="printArea">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <?php
        foreach ($dataPenjualan as $arr ){
          $nomer = $arr->ID_NOTA;
          echo "<small>$nomer</small>";
        }
        ?>

      </h1>

    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> PROLaundry
            <medium class="pull-right">Date: <?php echo date("Y/m/d");?></medium>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <?php
            $tglA;
            $tglB;
            foreach ($dataPenjualan as $arr ){
              $customer = $arr->ID_CUSTOMER;
              $tgla= $arr->TGL_JUAL;
              $tglb = $arr->TGL_AMBIL;

              foreach ($dataCustomer as $arrC ){
                if ($customer == $arrC->ID_CUSTOMER) {

                  echo "
                    <strong>". $arrC->NAMA_CUSTOMER."</strong><br>
                    ". $arrC->ALAMAT_CUSTOMER."<br>
                    Phone: ". $arrC->TELP_CUSTOMER."
                  ";
                }
              }
            }
            ?>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Nomor Nota :   <?php
            foreach ($dataPenjualan as $arr ){
              $nomer = $arr->ID_NOTA;
              echo "<small>$nomer</small>";
            }
            ?>
          </b>
          <br>
          <b>Kasir:</b><?php
              foreach ($dataPenjualan as $arr ){
                $pegawai = $arr->ID_PEGAWAI;
                foreach ($dataPegawai as $arrC ){
                  if ($pegawai == $arrC->ID_PEGAWAI) {
                    echo " ". $arrC->NAMA_PEGAWAI;
                  }
                }
              }
              ?>  <br>
          <?php
          echo "  <b>Tanggal Transaksi:</b> $tgla<br>";
          echo "  <b>Tanggal Pengambilan:</b> $tglb<br>";
           ?>



        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Product</th>
              <th>Harga</th>
              <th>Qty </th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              <?php
              foreach ($detail as $arr ){
                $satuan = "";
                $nama = "";
                foreach ($dataJasa as $arrJ ){

                  if ($arr->ID_JASA == $arrJ->ID_JASA) {
                    $nama = $arrJ->NAMA_JASA;
                    $satuan = $arrJ->SATUAN_JASA;
                  }
                }
               echo'<tr>
                      <td>'.$nama.'</td>
                      <td> Rp. <nobr class="subt" >'.$arr->HARGA_JUAL.'</nobr>/'.$satuan.' </td>
                      <td> <nobr class="subt" >'.$arr->QTY_JUAL.'</nobr> '.$satuan.'</td>
                      <td> Rp. <nobr class="subt" >'.$arr->SUBTOTAL_JUAL.'</nobr> </td>
                    </tr>';
              }

              ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <!-- <p class="lead">Tanggal Penjualan  2/22/2014</p> -->

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" onclick="printDiv('printArea')" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

</body>
<!-- uang -->
<script src="{{asset('js/jquery.number.min.js')}}" type="text/javascript"></script>
<script>
    $('.subt').number(true,0,',','.');

    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</html>
