<?php
include("config.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // buat query untuk ambil data dari database
    $sql = "SELECT * FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);

    // jika data yang di-edit tidak ditemukan
    if(mysqli_num_rows($query) < 1){
        die("Data tidak ditemukan...");
    }
} else {
    die("Akses dilarang...");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // proses form jika method POST
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // buat query update
    $sql_update = "UPDATE calon_siswa SET
                    nama='$nama',
                    alamat='$alamat',
                    jenis_kelamin='$jenis_kelamin',
                    agama='$agama',
                    sekolah_asal='$sekolah_asal'
                    WHERE id=$id";

    $query_update = mysqli_query($db, $sql_update);

    // apakah query update berhasil?
    if($query_update){
        header('Location: list-siswa.php');
    } else {
        die("Gagal mengupdate data...");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Edit Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h3 class="text-center mt-5">Formulir Edit Siswa</h3>
        </header>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <div class="form-group">
                <label for="nama">Nama: </label>
                <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" value="<?php echo $siswa['nama'] ?>" />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat: </label>
                <textarea class="form-control" name="alamat"><?php echo $siswa['alamat'] ?></textarea>
            </div>
            <fieldset class="form-group">
                <legend class="col-form-label">Jenis Kelamin</legend>
                <?php $jk = $siswa['jenis_kelamin']; ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="laki" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>>
                    <label class="form-check-label" for="laki">
                        Laki laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>>
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="agama">Agama: </label>
                <?php $agama = $siswa['agama']; ?>
                <select class="form-control" name="agama">
                    <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                    <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                    <option <?php echo ($agama == 'Katolik') ? "selected": "" ?>>Katolik</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" class="form-control" name="sekolah_asal" placeholder="Nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Simpan" name="simpan" />
            </div>
        </form>
    </div>
</body>
</html>