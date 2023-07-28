<?php
session_start();
    $id = $_GET['id'];


    if(isset($_SESSION['keranjang'] [$id])){
        $_SESSION['keranjang'] [$id] +=1;
    }else{
        $_SESSION['keranjang'][$id] = 1;
    }

    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
echo "<script>alert('Produk telah masuk ke keranjang');</script>";
echo "<script>location='produk.php';</script>";    
