
$(document).ready(function() {
    bacaData();

$('.btn-tambah').click(function() {
    tambahData();
});

$('.btn-ubah').click(function() {
    ubahData();
});

$('.btn-batal').click(function() {
    bacaData();
    resetForm();
});

    function bacaData() {
        $('.targetData').html('');
        $('.btn-tambah').show();
        $('.btn-ubah').hide();
        $('.btn-batal').hide();

        $.ajax({
            type: 'GET',
            url: 'php/getData.php',
            dataType: 'JSON',
            success : function (response) {
                var i;
                var data = '';

                for(i = 0; i < response.length; i++) {
                    data +=
                    `
                    <tr>
                        <td>`+(i+1)+`</td>
                        <td>`+response[i].nama_barang+`</td>
                        <td>`+response[i].harga_barang+`</td>
                        <td>`+response[i].stock+`</td>
                        <td>
                            <button class='btn-edit' id='`+response[i].id+`'>Edit</button>
                            <button class='btn-delete' id='`+response[i].id+`'>Delete</button>
                        </td>
                    </tr>
                    `
                }
                $('.targetData').append(data);

                $('.btn-edit').click(function() {
                    getSingleData($(this).attr('id'));
                });

                $('.btn-delete').click(function() {
                    deleteData($(this).attr('id'));
                });
            }
        });
    }

    function tambahData() {
        var nama_barang = $('.txt_nama_barang').val();
        var harga_barang = $('.txt_harga_barang').val();
        var stock = $('.stock').val();

        $.ajax({
            type: 'POST',
            url: 'php/addData.php',
            data : 'nama_barang='+nama_barang+'&harga_barang='+harga_barang+'&stock='+stock,
            dataType : 'JSON',
            success: function (response) {
                if (response.status == '1') {
                    alert(response.msg);
                    bacaData();
                    resetForm();

                } else {
                    alert(response.msg);
                    bacaData();
                    resetForm();
                }
            }
        });
    }

    function getSingleData(x) {
        $.ajax({
            type: 'POST',
            url: 'php/getSingleData.php',
            data: 'id='+x,
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                $('.txt_id').val(response.id);
                $('.txt_nama_barang').val(response.nama_barang);
                $('.txt_harga_barang').val(response.harga_barang);
                $('.txt_stock').val(response.stock);

                $('.btn-tambah').hide();
                $('.btn-ubah').show();
                $('.btn-batal').show();
            }
        });
    }

    function ubahData() {
        var nama_barang = $('.txt_nama_barang').val();
        var harga_barang = $('.txt_harga_barang').val();
        var stock = $('.txt_stock').val();

        $.ajax({
            type : 'POST',
            url : 'php/editData.php',
            data : 'nama_barang='+nama_barang+'&harga_barang='+harga_barang+'&stock='+stock,
            dataType : 'JSON',
            success : function (response) {
                if (response.status == '1') {
                    alert(response.msg);
                    bacaData();
                    resetForm();

                } else {
                    alert(response.msg);
                    bacaData();
                    resetForm();
                }
            }
        });
    }

    function deleteData(x) {
        $.ajax({
            type: 'POST',
            url: 'php/deleteData.php',
            data: 'id='+x,
            dataType: "JSON",
            success: function (response) {
                if (response.status == '1') {
                    alert(response.msg);
                    bacaData();

                } else {
                    alert(response.msg);
                    bacaData();
                }
            }
        });
    }

    function resetForm() {
        $('.txt_nama_barang').val('');
        $('.txt_harga_barang').val('');
        $('.txt_stock').val('');
    }
});