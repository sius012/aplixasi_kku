<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Merbabu Gunung Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">


  <div class="wrapper">
  

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
       

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">DASHBOARD  </a>
            </li>
            <li class="nav-item">
              <a href="pesanan.php" class="nav-link">PESANAN</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link"  style="margin-left: 900px;" >LOGOUT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    

  
<br>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">SELAMAT DATANG, RESEPSIONIS</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      


<br><br>

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-body">



<center>  <form action="pesanan.php" method="get" class="d-flex">
            
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label"></label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="tgl">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">CARI</button>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="col-auto">
                    <input type="text" name="cari"class="form-control me-2" placeholder="NAMA TAMU" aria-label="Search">
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-primary" type="submit">CARI</button>
                </div>
            </div>
        </form>
</center>
















                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th>NAMA TAMU</th>
                      <th>TANGGAL CEK IN</th>
                      <th>TANGGAL CEK OUT</th>
                      <th>TIPE KAMAR</th>
                      <th>STATUS</th>
                      <th>AKSI</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>


                  <?php 
  include "../koneksi.php";

	if(isset($_GET['cari']) && $_GET['cari'] != '') {
		$cari = $_GET['cari'];
		$data = mysqli_query($koneksi,"SELECT * FROM `pesanan` WHERE `nama_tamu` LIKE '%".$cari."%'");				
	} else if(isset($_GET['tgl'])){
			$tgl = $_GET['tgl'];
			$data = mysqli_query($koneksi,"SELECT * FROM `pesanan` WHERE `cek_in` = '$tgl' ");				
		}else{
			$data = mysqli_query($koneksi,"select * from pesanan");
		}
	

	
	$no = 1;
	while($d = mysqli_fetch_assoc($data)){
		?>
	<tr>
  <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama_tamu']; ?></td>
		<td><?php echo $d['cek_in']; ?></td>
        <td><?php echo $d['cek_out']; ?></td>
        <td><?php
        if ( $d['id_kamar'] == 6 ) {
          echo "Deluxe";
        } else {
          echo "Superior";
        }
        ?></td>
        <td><?php
                          if ($d['status'] == 1) { ?>
                            <span class="badge bg-warning">BELUM DI KONFIRMASI</span>
                          <?php } else { ?>
                            <span class="badge bg-success">SUDAH DI KONFIRMASI</span>
                          <?php } ?></td>
		<td><form action="aksi_konfirmasi.php" method="POST">
                            <input type="hidden" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>">
                            <input type="hidden" name="status" value="2">
                            <button class="btn btn-sm btn-primary">KONFIRMASI</button>
                          </form>
                          
                          </td>

                          <td> <a href="aksi_hapus.php?id_pesanan=<?php echo $d['id_pesanan']; ?>" class="btn btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini...?')">HAPUS</a></td>
	</tr>
	<?php } ?>

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none">
        
      </div>
      <!-- Default to the left -->
     
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>