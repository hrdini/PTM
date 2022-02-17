<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punyaku</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr><td>Id Barang</td> <td><input type="number" class="txt_id form-control" name="id" disabled></td></tr>
            <tr><td>Nama Barang</td> <td><input type="text" class="txt_nama_barang form-control" name="nama_barang" placeholder="Masukkan Nama Barang"></td></tr>
            <tr><td>Harga Barang</td> <td><input type="number" class="txt_harga_barang form-control" name="harga_barang" placeholder="Masukkan Harga Barang"></td></tr>
            <tr><td>Stock</td> <td><input type="number" class="txt_stock form-control" name="stock" placeholder="Masukkan Stock"></td></tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn-tambah btn-primary" name="btn-tambah">Tambah</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>


<?php
    
    include 'connection.php';
    if (isset($_POST['btn-tambah'])) {

        $nama_barang = $_POST['nama_barang'];
        $harga_barang = $_POST['harga_barang'];
        $stock = $_POST['stock'];

        $sql = mysqli_query($connection, "INSERT INTO tbl_data VALUES (null,'$nama_barang','$harga_barang','$stock')" );
        
    }
    

?>

