<?php
    //memasukan file config
include("config/config.php");

    //ambil parameter ID dar URL
$id=$_GET['id'];

    //url untuk lihat data berdasarkan id yang dipilih
$url="http://localhost/rest-api/tampil_data.php?id=".$id;

    //menyimpan hasil dalam variabel
$data=http_request_get($url);

    //konversi data json ke array
$hasil=json_decode($data,true);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Ubah Data dengan cURL</title>
</head>
<body>

    <div class="container">
        <h1 class="text-center">Ubah Data</h1>
        <form method="POST" action="ubah_data.php">

            <?php foreach ($hasil as $row) { ?>
                <div class="form-group">
                    <label>ID</label>
                    <input type="number" name="id" class="form-control" required="required" value="<?php echo $row['id']; ?>">
                </div>
                <div class="form-group">
                    <label class="col-form-label">NAMA</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                </div>
                <div class="form-group">
                    <label class="col-form-label">ALAMAT</label>
                    <textarea name="alamat" class="form-control"><?php echo $row['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="col-form-label">GENDER</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="L" class="form-check-input" 
                        <?php if (!strcmp($row ['gender'], "L")) {echo "CHECKED"; }?> >
                        <label class="form-check-label">Laki-Laki</label>   
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="P"class="form-check-input"
                        <?php if (!strcmp($row ['gender'], "P")) {echo "CHECKED"; }?> >
                        <label class="form-check-label">Perempuan</label>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">GAJI</label>
                    <input type="number" name="gaji" class="form-control" value="<?php echo $row['gaji']; ?>">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                       <button type="submit" class="btn btn-success btn-lg btn-block" name="ubah">simpan</button>
                   </div>
                   <div class="col-sm-6">
                      <button type="reset" class="btn btn-danger btn-lg btn-block">batal</button>  
                  </div>
              </div>
          <?php } ?>
      </form>
  </div>
  <script type="text/javascript" src="js/all.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>