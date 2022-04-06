<?php
 //print_r($_POST);
 include "../koneksi.php";

          $id  = isset($_GET['id']) ? $_GET['id'] : NULL;
          $sql="SELECT * FROM kamar WHERE id_kamar= $id";
          $result= $conn->query($sql);
          $row = $result->fetch_assoc();
          $no_kamar= $row["no_kamar"];

?>
 <table class="table table-striped" style="width:100%">

  <tbody>
     <tr>
       <td>Nama Kamar </td>
       <td>: <?php echo $namakamar; ?> </td>
     </tr>
     <tr>
       <td>Total Kamar </td>
       <td>: <?php echo $total_kamar; ?> </td>
     </tr>
  </tbody>

 </table>

