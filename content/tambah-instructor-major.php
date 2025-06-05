<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete']; // id=1,2,3
    $id_instructor = $_GET['id_instructor']; // id=1,2,3

    $queryDelete = mysqli_query($config, "DELETE FROM instructor_major WHERE id='$id'");
    if ($queryDelete) {
        header("Location:?page=tambah-instructor-major&id=" . $id_instructor . "&hapus=berhasil");
    } else {
        header("Location:?page=tambah-instructor-major&id=" . $id_instructor . "&hapus=gagal");
    }
}
// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
//fungsi insert

//revisian ambil dari pak reza
$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit  = mysqli_query($config, "SELECT * FROM instructor_major WHERE id='$edit'");
$rowEdit    = mysqli_fetch_assoc($queryEdit);
$id_instructor = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_POST['id_major'])) {
    // ada tidak ada parameter bernama edit, kalo ada jalankan perintah edit/update, kalo tidak ada
    // tambah data baru / inser
    $id_major = $_POST['id_major'];
    if (isset($_GET['edit'])) {
        $update = mysqli_query($config, "UPDATE instructor_major SET id_major='$id_major' WHERE id='$edit'");
        header("Location:?page=tambah-instructor-major&id=" . $id_instructor . "&ubah=berhasil");
    } else {
        $insert = mysqli_query($config, "INSERT INTO instructor_major (id_major, id_instructor)
        VALUES('$id_major','$id_instructor')");
        header("Location:?page=tambah-instructor-major&id=" . $id_instructor . "&tambah=berhasil");
    }
}

$queryMajors = mysqli_query($config, "SELECT * FROM majors ORDER BY id DESC");
$rowMajors = mysqli_fetch_all($queryMajors, MYSQLI_ASSOC);

$queryInstructors = mysqli_query($config, "SELECT * FROM instructors WHERE id='$id_instructor'");
$rowInstructors = mysqli_fetch_assoc($queryInstructors);


$queryInstructorMajor = mysqli_query($config, "SELECT majors.name, instructor_major.id, id_instructor FROM instructor_major 
LEFT JOIN majors ON majors.id = instructor_major.id_major WHERE id_instructor ='$id_instructor' ORDER BY instructor_major.id DESC");
$rowInstructorsMajors = mysqli_fetch_all($queryInstructorMajor, MYSQLI_ASSOC);



?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-tittle"><?php echo isset($_GET['edit']) ? 'edit' : 'add' ?> Instructors Majors: <?php echo $rowInstructors['name'] ?></h5>
                <!-- form edit -->
                <?php if (isset($_GET['edit'])): ?>
                    <form action="" method="post">
                        <div class="mb3">
                            <label for="">Major Name</label>
                            <select name="id_major" class="form-control">
                                <option value="">Select One</option>
                                <?php foreach ($rowMajors as $rowMajors): ?>
                                    <option <?php echo ($rowMajors['id'] == $rowEdit['id_major']) ? 'selected' : '' ?> value="<?php echo $rowMajors['id'] ?>"><?php echo $rowMajors['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb3">
                            <button class="btn btn-primary" type="submit">save changes</button>
                        </div>
                    </form>

                    <!-- end form edit -->
                <?php else: ?>
                    <!-- listing table -->
                    <div align="right">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add Instructor Major
                        </button>
                        <div>
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Major Name</th>
                                        <th></th>

                                    <tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($rowInstructorsMajors as $index => $rowInstructorsMajor): ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $rowInstructorsMajor['name'] ?></td>
                                            <td>
                                                <a href="?page=tambah-instructor-major&id=<?php echo $rowInstructorsMajor['id_instructor'] ?>&edit=<?php echo $rowInstructorsMajor['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a onclick="return confirm('Are you sure wanna delete this data??')"
                                                    href="?page=tambah-instructor-major&delete=<?php echo $rowInstructorsMajor['id'] ?>&id_instructor=<?php echo $rowInstructorsMajor['id_instructor'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif ?>
                    </div>
            </div>
        </div>
    </div>



    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Instructors Major</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb3">
                            <label for="">Major Name</label>
                            <select name="id_major" class="form-control">
                                <option value="">Select One</option>
                                <?php foreach ($rowMajors as $rowMajors): ?>
                                    <option value="<?php echo $rowMajors['id'] ?>"><?php echo $rowMajors['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
        </div>
    </div>