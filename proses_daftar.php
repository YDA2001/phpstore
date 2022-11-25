<?php
 
 include 'koneksi.php';

 if (isset($_POST['upload'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $foto = $_POST['foto']['name'];
    $temp = $_POST['foto']['tmp_name'];
    $folder = "./foto/" . $foto;

    $db = mysqli_query($kon, "INSERT INTO user (username, password, nama, alamat, ttl, foto) VALUES ('$username', '$password', '$nama', '$alamat', '$ttl', '$foto')");
   
    if (move_uploaded_file($temp, $folder)){
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
 }

?>


