<!-- //ini header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PRO</b>Laundry</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src=".../dist/img/user8-160x160.jpg" class="user-image" alt="User Image">
              -->
              <span class="hidden-xs"><?php
              $user = session('name');
              echo $user ;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                  Welcome ,
                  <?php
                  $user = session('name');
                  $kantor = session('namaKantor');
                  echo $user .'<br><br>';
                  echo $kantor;
                  ?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="http://localhost:8000/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<!-- header selesai -->
<!-- ini sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>  <?php
          $user = session('name');
          echo $user ;
          ?>
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i>
          <?php
          $kantor = session('namaKantor');
          echo $kantor;
          ?></a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>

      <li class="active treeview">
        <ul class="treeview-menu">
          <li <?php echo $kelasBarang ?> ><a href="/homepage/."><i class="fa fa-circle-o"></i>Home</a></li>          
        </ul>
      </li>

      <li class=" active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo $kelasBarang ?> ><a href="/barang/."><i class="fa fa-circle-o"></i>Barang</a></li>
          <li <?php echo $kelasCustomer ?> ><a href="/customer/"><i class="fa fa-circle-o"></i>Customer</a></li>
          <li <?php echo $kelasJasa ?> ><a href="/jasa/"><i class="fa fa-circle-o"></i>Jasa</a></li>
          <li <?php echo $kelasKantor ?> ><a href="/kantor/"><i class="fa fa-circle-o"></i>Kantor</a></li>
          <li <?php echo $kelasPegawai ?> ><a href="/pegawai/"><i class="fa fa-circle-o"></i>Pegawai</a></li>
          <li <?php echo $kelasSupplier ?> ><a href="/supplier/"><i class="fa fa-circle-o"></i>Supplier</a></li>
        </ul>
      </li>

      <li class="active treeview">
        <a href="#">
          <i class="fa fa-building-o"></i> <span>Gudang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo $gudangAmb ?> ><a href="/gudang/ambengan"><i class="fa fa-circle-o"></i>Gudang Ambengan</a></li>
          <li <?php echo $gudangEc ?> ><a href="/gudang/east"><i class="fa fa-circle-o"></i>Gudang East Coast</a></li>
          <li <?php echo $gudangInt ?> ><a href="/gudang/intiland"><i class="fa fa-circle-o"></i>Gudang Intiland</a></li>
        </ul>
      </li>

      <li class="active treeview">
        <a href="#">
          <i class="fa fa-money"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li  ><a href="/transaksi/pembelian"><i class="fa fa-circle-o"></i>Pembelian</a></li>
          <li  ><a href="/transaksi/penjualan"><i class="fa fa-circle-o"></i>Penjualan</a></li>
          <li  ><a href="/transaksi/pemakaian"><i class="fa fa-circle-o"></i>Pemakaian</a></li>
        </ul>
      </li>

      <li class="active treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li  ><a href="/laporan/pembelian"><i class="fa fa-circle-o"></i>Laporan Pembelian</a></li>
          <li  ><a href="/laporan/penjualan"><i class="fa fa-circle-o"></i>Laporan Penjualan</a></li>
          <li  ><a href="/laporan/pemakaian"><i class="fa fa-circle-o"></i>Laporan Pemakaian</a></li>
          <li  ><a href="/laporan/jurnal"><i class="fa fa-circle-o"></i>Laporan Jurnal</a></li>
        </ul><BR>
      </li>

  </section>
  <!-- /.sidebar -->
</aside>
<!-- sidebar selesai -->
