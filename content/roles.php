<?php // Memulai blok kode PHP
// Mengambil semua data dari tabel 'abouts' dan mengurutkannya berdasarkan 'id' secara menurun (DESC).
// '$config' diasumsikan sebagai variabel koneksi ke database.
$query = mysqli_query($config, "SELECT * FROM roles ORDER BY id DESC");

// Mengambil semua baris hasil query sebagai array asosiatif.
// Setiap baris akan menjadi elemen dalam array '$row', dengan nama kolom sebagai kunci.
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
// Logika untuk tombol hapus dari database
// Mengecek apakah ada parameter 'delete' yang dikirim melalui URL (metode GET).
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM roles WHERE id='$id'");
    header("location:?page=roles&hapus=berhasil");
}
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Roles</h5>
                <div class="mb-3" align="right">
                    <a href="?page=tambah-roles" class="btn btn-primary">Add Roles</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($rows as $key => $data): ?>
                                <tr>
                                    <td><?php echo $key += 1; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td> <a href="?page=tambah-roles&edit=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Are you sure wanna delete this data??')"
                                            href="?page=roles&delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>