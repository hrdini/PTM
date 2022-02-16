<?php 

    include 'connection.php';

    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $stock = $_POST['stock'];
    $sql = mysqli_query($connection, "INSERT INTO tbl_data VALUES (null, '$nama_barang', '$harga_barang', '$stock')");

    if ($sql) {
        $result['status'] = '1';
        $result['msg'] = 'Berhasil Menambahkan Data';
    } else {
        $result['status'] = '0';
        $result['msg'] = 'Gagal Menambahkan Data';
    }

    echo json_encode($result);

?>