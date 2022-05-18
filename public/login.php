<?php

$connect = mysqli_connect("localhost","root","","login");


$username = $_POST['username'];
$password = $_POST['password'];


$data = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username' and password = '$password'");

//menghitung jumlah data yang di temukan 
$cek = mysqli_num_rows($data);

if($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin.php");
}

    else
    {

    header("location:admin.ph?pesan=gagal");
}
?>