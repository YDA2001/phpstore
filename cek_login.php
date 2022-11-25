<?php

session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($kon, "SELECT * FROM user where username='$username' and password='$password'");

$cek = mysqli_num_rows($data);

if ($data > 0){
   $_SESSION['username'] = $username;
   $_SESSION['password'] = $password;
   $_SESSION['loggedin'] = true;
   header("location:index.php");
}else{
   echo "gagal";
}