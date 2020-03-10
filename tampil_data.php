<?php
    //memasukan file config
include("config/config.php");

    //url untuk lihat data
$url="http://localhost/rest-api/tampil_data.php";

    //menyimpan hasil dalam variabel
$data=http_request_get($url);

    //konversi data json ke array
$hasil=json_decode($data,true);

// tambah data
    //jika tombol simpan di klik
if(isset($_POST['simpan'])) {

    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $gaji=$_POST['gaji'];

        //membuat data array data yang kirim
    $data=array(
        'id' => $id,
        'nama' => $nama,
        'alamat' => $alamat,
        'gender' => $gender,
        'gaji' => $gaji
    );

        //url untuk tambah data
    $url="http://localhost/rest-api/tambah_data.php";

        //menyimpan hasil dalam variabel
    $hasil=http_request_post($url,$data);
    header('location: tampil_data.php');
// tambah data
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Tampil Data dengan cURL</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="text-center">Data Pengurus dengan RestAPI</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">GENDER</th>
                            <th scope="col">GAJI</th>
                            <th scope="col" colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hasil as $row) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['gaji']; ?></td>
                                <td class="text-center">
                                    <a href="edit_data.php?id=<?php echo $row['id']; ?>"><i class="far fa-edit" style="color: #3dff00"></i></a> |
                                    <a href="hapus_data.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Mau Melupakan Masa Lalu ? ')"><i class="far fa-trash-alt " style="color: #ff0000"></i></a>
                                </td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <h1 class="text-center">Input Data Pengurus</h1>
                <form method="POST">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="number" name="id" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">NAMA</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">ALAMAT</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">GENDER</label>
                        <select class="custom-select" name="gender">
                          <option selected>Open this select menu</option>
                          <option value="L">Laki-laki</option>
                          <option value="P">Perempuan</option>
                      </select> 
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">GAJI</label>
                    <input type="number" name="gaji" class="form-control">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-lg btn-block" name="simpan">simpan</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="reset" class="btn btn-danger btn-lg btn-block">batal</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>