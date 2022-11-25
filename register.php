<!DOCTYPE html>
 <head>
  <title>Register</title>
 </head>

<?php
 
 include 'koneksi.php';

 if (isset($_POST['upload'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $size = $_FILES['foto']['size'];
    $extensi = array('jpg', 'jpeg', 'png');
    $x = explode('.', $foto);
    $eks = strtolower(end($x));
    
    if(in_array($eks, $extensi) === true){
       if($size < 1044070){
          move_uploaded_file($temp, 'foto/'.$foto);
          $db = mysqli_query($kon, "INSERT INTO user (username, password, nama, alamat, ttl, foto) VALUES ('$username', '$password', '$nama', '$alamat', '$ttl', '$foto')");
          if($db){
             echo "<script>alert('Daftar Berhasil')</script>";
             header('location:log.php');
          }else{
             echo "<script>alert('Daftar Gagal')</script>";
             header('location:register.php');
         }
      }else{
          echo "<script>alert('File Kebesaran')</script>";
          header('location:register.php');
      }
   }else{
          echo "<script>alert('Format tidak didukung')</script>";
          header('location:register.php');
   }
 }

?>


<body>
 <form method="post" action="" enctype="multipart/form-data">
  <tr>
   <td>Username</td>
   <td>:</td>
   <td><input type="text" name="username"></td>
  </tr>
  <tr>
   <td>Password</td>
   <td>:</td>
   <td><input type="text" name="password"></td>
  </tr>
  <tr>
   <td>Nama</td>
   <td>:</td>
   <td><input type="text" name="nama"></td>
  </tr>
  <tr>
   <td>Alamat</td>
   <td>:</td>
   <td><input type="text" name="alamat"></td>
  </tr>
  <tr>
   <td>TTL</td>
   <td>:</td>
   <td><input type="text" name="ttl"></td>
  </tr>
  <tr>
   <td>FOTO</td>
   <td>:</td>
   <td><input type="file" name="foto"></td>
  </tr>
  <tr>
   <td><input type="submit" value="upload" name="upload"></td>
  </tr>
 </form>
</body>
</html>