<?php
    include 'connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = mysqli_query($connection, "SELECT * FROM tbl_data WHERE id = '$id' ");
        $result = mysqli_fetch_array($sql);
    }
    

?>


<h2>Edit Data</h2>
<form action="" method="post">
            <table 
                <tr><td>Id Barang </td> <td><input type="number" class="txt_id" name="id" value="<?php echo $result['id'] ?>" disabled></td></tr>
                <tr><td>Nama Barang </td> <td><input type="text" class="txt_nama_barang" name="nama_barang" value="<?php echo $result['nama_barang'] ?>"></td></tr>
                <tr><td>Harga Barang </td> <td><input type="number" class="txt_harga_barang" name="harga_barang" value="<?php echo $result['harga_barang'] ?>"></td></tr>
                <tr><td>stock </td> <td><input type="number" class="txt_stock" name="stock" value="<?php echo $result['stock'] ?>"></td></tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="btn-tambah" name="simpan" value="simpan">Simpan Perubahan</button>
                    </td>
                </tr>
            </table>
        </form>


    
<?php

    include 'connection.php';
    if (isset($_POST['simpan'])) {
        $idmenu = $_POST['idmenu'];
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $gambar = $_POST['gambar'];
        $harga = $_POST['harga'];

        $sql = "UPDATE tblmenu SET idkategori=$idkategori, menu='$menu', gambar='$gambar', harga=$harga WHERE idmenu = $id";
        
        mysqli_query($connection, $sql);
        header('location:http://localhost/crud-ajax/crud-php');
    }
    


?>