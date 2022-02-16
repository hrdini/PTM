<?php 

    include 'connection.php';

    $id = $_POST['id'];
    $sql = mysqli_query($connection, "DELETE FROM tbl_data WHERE id= '$id'");

    if ($sql) {
        $result['status'] = '1';
        $result['msg'] = 'Data Berhasil di Hapus';
    } else {
        $result['status'] = '0';
        $result['msg'] = 'Data Gagal di Hapus';
    }

    echo json_encode($result);

?>