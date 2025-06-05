<?php

use Dom\Mysql;

if (isset($_GET['delete'])) {
    $id_user = isset($_GET['delete']) ? $_GET['delete'] : '';
    $querydelete = mysqli_query($config, "UPDATE instructors SET deleted_at = 1 WHERE id = '$id_user'");
    if ($querydelete) {
        header("location:?page=instructor&hapus=berhasil");
    } else {
        header("location:?page=instructor&hapus=gagal");
    }
}
$header = !isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM instructors WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];

    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO instructors (name, gender, education, phone, email, password, address) VALUES ('$name','$gender','$education','$phone','$email', '$password','$address')");
        header("location:?page=instructor&tambah=berhasil");
    } else {
        $Update = mysqli_query($config, "UPDATE instructors SET name='$name', gender='$gender', education='$education', phone='$phone', email='$email', password='$password', address='$address' WHERE id='$id_user'");
        header("Location:?page=instructor&ubah=berhasil"); {
        }
    }
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Name * </label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text"
                class="form-control"
                placeholder="Enter instructor name"
                value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Gender *</label>
        </div>
        <div class="col-sm-10">
            <input type="radio" name="gender" value="1" checked> Man
            <input type="radio" name="gender" value="0"> Woman
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Education * </label>
        </div>
        <div class="col-sm-10">
            <input required name="education" type="text"
                class="form-control"
                placeholder="Enter your education"
                value="<?= isset($_GET['edit']) ? $rowEdit['education'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for=""> Phone * </label>
        </div>
        <div class="col-sm-10">
            <input required name="phone" type="text"
                class="form-control"
                placeholder="Enter your phone"
                value="<?= isset($_GET['edit']) ? $rowEdit['phone'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email * </label>
        </div>
        <div class="col-sm-10">
            <input required name="email" type="text"
                class="form-control"
                placeholder="Enter your email"
                value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="">Password *</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Your password"
                <?php echo empty($_GET['edit']) ? 'required' : '' ?>>
            <small>
                )* if you want to change your password, you can fill this field
            </small>
        </div>

    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Address * </label>
        </div>
        <div class="col-sm-10">
            <textarea id="summernote" class="form-control" name="address" cols="30" rows="5"><?php echo !isset($row['description']) ? "" : $row['description'] ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
                class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>