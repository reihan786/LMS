<?php // Memulai blok kode PHP
// Mengambil semua data dari tabel 'abouts' dan mengurutkannya berdasarkan 'id' secara menurun (DESC).
// '$config' diasumsikan sebagai variabel koneksi ke database.
$query = mysqli_query($config, "SELECT * FROM instructors ORDER BY id DESC");

// Mengambil semua baris hasil query sebagai array asosiatif.
// Setiap baris akan menjadi elemen dalam array '$row', dengan nama kolom sebagai kunci.
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Logika untuk tombol hapus dari database
// Mengecek apakah ada parameter 'delete' yang dikirim melalui URL (metode GET).
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM instructors WHERE id='$id'");
    header("location:?page=instructor&hapus=berhasil");
}
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Instructor</h5>
                <div class="mb-3" align="right">
                    <a href="?page=tambah-instructor" class="btn btn-primary">Add Instructior</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Education</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($rows as $key => $row): ?>
                                <tr>
                                    <td><?php echo $key += 1; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo ($row['gender'] == 1) ? 'Male' : 'Female' ?></td>
                                    <td><?php echo $row['education']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td> 
                                        <a href="?page=tambah-instructor-major&id=<?php echo $row['id'] ?>" class="btn btn-warning">Add Major</a>
                                        <a href="?page=tambah-instructor&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Are you sure wanna delete this data??')"
                                            href="?page=instructor&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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