<!DOCTYPE html>
 <head>
  <title<Login</title>
 </head>

<body>
 
<?php
   session_start();

   include "koneksi.php";

   if($_SESSION['loggedin'] != true){
     echo "YNTKTS";
   }
  ?>

  <h4>welcome, <?php echo $_SESSION['username']; ?> </h4>

<hr>
 <h1>Barang Yang Dijual</h1>

<?php

 include 'koneksi.php';

 if($_SESSION['loggedin'] != true){
      echo "YNTKTS";
 }else{
      $data = mysqli_query($kon, "SELECT * FROM barang");

      while($cek = mysqli_fetch_array($data)){
           echo "<td> Penjual:".$cek['penjual']."</td>";
           echo "<br>";
           echo "<td> Nama Barang:".$cek['nama_barang']."</td>";
           echo "<br>";
           echo "<td> deskripsi:".$cek['deskripsi']."</td>";
           echo "<br>";
           echo "<td> Harga:".$cek['harga']."</td>";
           echo "<br>";
           echo "<td> Stok:".$cek['stok']."</td>";
           echo "<br>";
           echo "<td> Tgl Upload:".$cek['tgl_upload']."</td>";
           echo "<br>";
?>

<br>
   <tr>
     <td>
      <img src="<?php echo "fotobarang/".$cek['foto_barang']; ?>" width=300 height=300/>
     </td>
   </tr>

<?php 
    }

  }

?>

<br>
  <a href="logout.php">LOgOut</a>
  <a href="tambah_barang.php">Tambah Barang</a>
  <a href="profil.php">Lihat profil</a>

</body>
</html>