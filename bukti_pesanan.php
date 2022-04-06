<?php
  include "includes/koneksi.php";
  include "includes/timezone.php";
  $id      = $_GET['id'];
  $jkamar  = $_GET['jk'];
  $nama    = $_GET['nama']; 
  $email   = $_GET['email'];
  $checkin= $_GET['tm'];
  $checkout= $_GET['tk'];

  $sql = "SELECT no_kamar FROM kamar WHERE id_kamar=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $nama_kamar= $row["no_kamar"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo "Hotel Pandu - ".$nama; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="" />
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
  <link href="css/style_bukti_pesan.css" rel="stylesheet">
</head>
<body>

<body>
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <a href="index.php?" class="btn btn-warning"><i class="fa fa-print"></i>Kembali</a>
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Print as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="">
                        <img src="hotel.png" class="rounded-circle" alt="" width="100" height="100">
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="">
                            HARRIS Hotel Sentraland Semarang
                            </a>
                        </h2>
                        <div>Semarang Tengah, Kota Semarang, Jawa Tengah 50136</div>
                        <div>+622476530000</div>
                        <div>harris-sentraland@tauzia.com.</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <h2 class="to"> <?php echo $nama; ?> </h2>
                        <div class="address">Semarang Tengah, Kota Semarang, Jawa Tengah 50136</div>
                        <div class="email"><a href="mailto:<?php echo $email ?> "><?php echo $email ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Pemesanan</h1>
                        <div class="date">Date: <?php echo date("F j, Y, g:i a"); ?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left"> KAMAR</th>
                            <th class="text-center">CHEECK IN</th>
                            <th class="text-center">CHECK OUT</th>
                            <th class="text-center">JUMLAH KAMAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left"><h2>
                                <?php echo $nama_kamar; ?>
                                </a>
                                </h2>
                               
                                   Sangat nyaman
                               </a> 
                               untuk istirahat beberapa hari kedepan serta membuat anda dapat berpikir </br>untuk rencana kedepan.
                            </td>
                            <td class="unit text-center"><?php echo $checkin ?></td>
                            <td class="qty text-center"><?php echo $checkout ?></td>
                            <td class="total text-center"> <?php echo $jkamar;?> </td>
                        </tr>                    
                    </tfoot>
                </table>
                <div class="mt-4 mb-2">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Pastikan berada di hotel kami 30 menit sebelum check in.</div>
                </div>
            </main>
            <footer>
                Bukti pemesanan kamar  HARRIS Hotel Sentraland Semarang
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

<!-- PANGGIL FILE JAVASCRIPT DARI FOLDER js -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap5.0.1.bundle.min.js"></script>

<script>
$(document).ready(function(){
  $('#printInvoice').click(function(){
    window.print();
        }); 
    });   
</script>

</body>
</html>

