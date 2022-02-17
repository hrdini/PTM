<?php
    $connection = mysqli_connect('localhost','root','','toko');
    if(mysqli_connect_errno()){
        echo 'Koneksi Basis Data Gagal!'. 'mysqli_connection_error'();
    }
?>