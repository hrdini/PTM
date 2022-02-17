<?php
    include ('connection.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM tbl_data WHERE id='$id'";
        mysqli_query($connection, $sql);
        }
    header('location:http://localhost/PTM/crud_ajax/crud_php');

?>