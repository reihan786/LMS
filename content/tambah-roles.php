<?php
// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
//fungsi insert

include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];

    $query = mysqli_query($config, "INSERT INTO roles (name) 
 VALUES ('$name')");
    if ($query) {
        header("location:?page=roles&tambah=berhasil");
    }
}

//revisian ambil dari pak reza
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM roles WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];

    $queryUpdate = mysqli_query($config, "UPDATE roles SET name='$name'");
    if ($queryUpdate) {
        header("location:?page=roles&ubah=berhasil");
    }
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Jurusan * </label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text"
                class="form-control"
                placeholder="Masukkan jurusan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
        </div>
        <div class="mb-3 row">
            <div class="col-sm-12">
                <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
                    class="btn btn-primary">Simpan</button>
            </div>
        </div>
</form>