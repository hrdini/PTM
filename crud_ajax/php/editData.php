<?php 

    include 'connection.php';

    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $stock = $_POST['stock'];
    $sql = mysqli_query($connection, "UPDATE tbl_data SET nama_barang ='$nama_barang', harga_barang ='harga_barang', stock ='$stock' WHERE id ='$id'");

    if ($sql) {
        $result['status'] = '1';
        $result['msg'] = 'Berhasil Mengubah Data';

    } else {
        $result['status'] = '0';
        $result['msg'] = 'Gagal Mengubah Data';
    }

    echo json_encode($result);


?>