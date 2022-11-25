<!DOCTYPE html>
 <head>
  <title<Login</title>
 </head>

<body>

<?php
 session_start();

 include 'koneksi.php';

 if($_SESSION['loggedin'] != true){
      echo "YNTKTS";
 }else{
      $user = $_SESSION['username'];
      $data = mysqli_query($kon, "SELECT id_user, nama, alamat, ttl, foto FROM user WHERE username = '$user'");

      while($cek = mysqli_fetch_array($data)){
           echo "<td> Nama:".$cek['nama']."</td>";
           echo "<br>";
           echo "<td>".$cek['alamat']."</td>";
           echo "<br>";
           echo "<td>".$cek['ttl']."</td>";
?>

<br>
   <tr>
     <td>
      <img src="<?php echo "foto/".$cek['foto']; ?>" width=300 height=300/>
     </td>
   </tr>

<?php 
    }

  }

?>
<br>
  <a href="index.php">Kembali</a>
  <a href="tambah_barang.php">Tambah Barang</a>

</body>
</html>