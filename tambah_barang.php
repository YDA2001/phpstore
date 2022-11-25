<!DOCTYPE html>
 <head>
  <title>Register</title>
 </head>

<?php
 session_start();

 include 'koneksi.php';

 if (isset($_POST['upload'])){
   if($_SESSION['loggedin'] != true){
      echo "YNTKTS";
   }else{
     $penjual = $_SESSION['username'];
     $nama_barang = $_POST['nama_barang'];
     $deskripsi = $_POST['deskripsi'];
     $harga = $_POST['harga'];
     $stok = $_POST['stok'];
     $foto_barang = $_FILES['foto_barang']['name'];
     $temp = $_FILES['foto_barang']['tmp_name'];
     $size = $_FILES['foto_barang']['size'];
     $extensi = array('jpg', 'jpeg', 'png');
     $x = explode('.', $foto_barang);
     $eks = strtolower(end($x));
    
    if(in_array($eks, $extensi) === true){
       if($size < 1044070){
          move_uploaded_file($temp, 'fotobarang/'.$foto_barang);
          $db = mysqli_query($kon, "INSERT INTO barang (penjual, nama_barang, deskripsi, harga, stok, foto_barang) VALUES ('$penjual', '$nama_barang', '$deskripsi', '$harga', '$stok', '$foto_barang')");
          if($db){
             echo "<script>alert('Sukses Menambahkan barang')</script>";
             header("location:index.php");
          }else{
             echo "<script>alert('Gagal')</script>";
             header("location:tambah_barang.php");
         }
      }else{
          echo "<script>alert('File Kebesaran')</script>";
          header("location:tambah_barang.php");
      }
   }else{
          echo "<script>alert('Format tidak didukung')</script>";
          header("location:tambah_barang.php");
   }
 }
}

?>


<body>
 <form method="post" action="" enctype="multipart/form-data">
  <tr>
   <td>Nama Barang</td>
   <td>:</td>
   <td><input type="text" name="nama_barang"></td>
  </tr>
  <tr>
   <td>Deskripsi</td>
   <td>:</td>
   <td><input type="text" name="deskripsi"></td>
  </tr>
  <tr>
   <td>Harga</td>
   <td>:</td>
   <td><input type="number" name="harga"></td>
  </tr>
  <tr>
   <td>Stok</td>
   <td>:</td>
   <td><input type="number" name="stok"></td>
  </tr>
  <tr>
   <td>FOTO</td>
   <td>:</td>
   <td><input type="file" name="foto_barang"></td>
  </tr>
  <tr>
   <td><input type="submit" value="upload" name="upload"></td>
  </tr>
 </form>
</body>
</html>