<?php
  include "includes/koneksi.php";
  $id = $_GET['idpemesanan'];
  $get = $conn->query("SELECT * FROM pesanan WHERE id_pesanan=$id");
  $result1 = $get->fetch_assoc();


  $id_kamar   = $result1['id_kamar'];
  $nama_tamu    = $result1['nama_tamu'];
  $email_pemesan   = $result1['email_pemesan'];
  $checkin= $result1['cek_in'];
  $checkout= $result1['cek_out'];
  $jml_kamar= $result1['jml_kamar'];
  $nama_pemesan= $result1['nama_pemesan'];
  $hp_pemesan= $result1['hp_pemesan'];

  $sql = "SELECT no_kamar FROM kamar WHERE id_kamar=$id_kamar";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $no_kamar= $row["no_kamar"];
//   $cek_in= $row["cek_in"];
//   $cek_out= $row["cek_out"];
//   $jml_kamar= $row["jml_kamar"];
//   $nama_pemesan= $row["nama_pemesan"];
//   $email_pemesan= $row["email_pe mesan"];
//   $hp_pemesan= $row["hp_pemesan"];
//   $nama_tamu= $row["nama_tamu"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo "Merbabu Gunung Hotel - ".$nama_tamu; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="hotel.png" />
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
  <link href="css/style_bukti_pesan.css" rel="stylesheet">
</head>
<body>

<body>
<div class="container" style="margin-top:100px;">
<div class="card text-center">
  <div class="card-header">
    Bukti Reservasi Kamar
  </div>
  <div class="card-body">
    <h5 class="card-title">Bukti Reservasi Kamar</h5>
   
    <ul class="list-group list-group-flush">
    <li class="list-group-item">Tanggal Check In :<?php echo $checkin?></li>
    <li class="list-group-item">Tanggal Check Out :<?php echo $checkout?></li>
    <li class="list-group-item">Jumlah Kamar :<?php echo $jml_kamar?></li>
    <li class="list-group-item">Nama Pemesan :<?php echo $nama_pemesan?></li>
    <li class="list-group-item">Email Pemesan :<?php echo $email_pemesan?></li>
    <li class="list-group-item">HP Pemesan :<?php echo $hp_pemesan?></li>
    <li class="list-group-item">Nama Tamu :<?php echo $nama_tamu?></li>
    <li class="list-group-item">No Kamar :<?php echo $no_kamar?></li>
  </ul>
  </div>
  <div class="card-footer text-muted">
    @HOTEL
  </div>
</div>
</div>

<!-- PANGGIL FILE JAVASCRIPT DARI FOLDER js -->

<script>
    window.print();

    window.onafterprint = function () {
        window.location.href = "index.php";
    }
</script>

</body>
</html>

