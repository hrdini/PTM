<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD With AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>CRUD With AJAX</h1>
    
    <h2>Form Insert</h2>
    <div class="col-4">
        <?php include 'php/AddData.php' ?>
    </div>

    <hr>
    <br>
    <div class="col-8">
    <table class="table w-60">
        <?php 
            include 'php/connection.php';
            $sql = mysqli_query($connection, "SELECT * FROM tbl_data");
        ?>
        <thead>
            <td>Id Barang</td>
            <td>Nama Barang</td>
            <td>Harga Barang</td>
            <td>Stock</td>
            
        <tbody>
            <?php if (!empty($sql)) { ?>
                <?php foreach ($sql as $r): ?>
                <tr>
                    <td><?php echo $r['id'] ?></td>
                    <td><?php echo $r['nama_barang'] ?></td>
                    <td><?php echo $r['harga_barang'] ?></td>
                    <td><?php echo $r['stock'] ?></td>
                    <td><button class="btn-primary"><a class="link-light" href="php/deleteData.php?id=<?php echo $r['id'] ?>">Delete</a></button></td>
                    <td><button class="btn-danger"><a class="link-light" href="php/ubahData.php?id=<?php echo $r['id'] ?>">Update</a></button></td>
                </tr>
                <?php endforeach ?>
                <?php } ?>
        </tbody>
    </table>
    </div>
    
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/tools.js"></script>
</body>
</html>