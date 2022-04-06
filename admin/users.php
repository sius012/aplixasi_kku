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
              <a href="index.php" class="nav-link">DASHBOARD</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">KAMAR</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">FASILITAS KAMAR</a>
            </li>
            <li class="nav-item">
              <a href="galeri.php" class="nav-link">GALERI</a>
            </li>
            <li class="nav-item">
              <a href="users.php" class="nav-link">USERS</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">LOGOUT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">FASILITAS KAMAR</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">TAMBAH</button>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>NAMA</th>
                      <th>USERNAME</th>
                      <th>LEVEL</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from users");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td>
                          <?php if ($d['level'] == 1) { ?>
                            <span class="badge bg-success">ADMIN</span>
                          <?php } else { ?>
                            <span class="badge bg-primary">RESEPSIONIS</span>
                          <?php } ?>

                        </td>
                        <td>
                          <a href="edit_users.php?id=<?php echo $d['id']; ?>" class="btn btn btn-warning">EDIT</a>
                          <a href="hapus_users.php?id=<?php echo $d['id']; ?>" class="btn btn btn-danger">HAPUS</a>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
       
      </div>
      <!-- Default to the left -->
      <center><strong>Copyright &copy; Merbabu Gunung Hotel</strong></center> 
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

  <div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">TAMBAH DATA USER</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="tambah_users.php" method="POST">
            <div class="form-group">
              <label>NAMA</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Users">
            </div>
            <div class="form-group">
              <label>USERNAME</label>
              <input type="text" class="form-control" name="username" placeholder="Username Users">
            </div>
            <div class="form-group">
              <label>PASSWORD</label>
              <input type="password" class="form-control" name="password" placeholder="Password Users">
            </div>
            <div class="form-group">
              <label>LEVEL USERS</label>
              <select name="level" class="form-control" required>
                <option value="">--- PILIH LEVEL ---</option>
                <option value="1">ADMIN</option>
                <option value="2">RESEPSIONIS</option>                
              </select>
            </div>         
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</body>
</html>