<?php
if (isset($_GET['delete'])) {
    $id_user = isset($_GET['delete']) ? $_GET['delete'] : '';
    $querydelete = mysqli_query($config, "UPDATE instructors SET deleted_at = 1 WHERE id = '$id_user'");
    if ($querydelete) {
        header("location:?page=instructor&hapus=berhasil");
    } else {
        header("location:?page=instructor&hapus=gagal");
    }
}


$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM instructors WHERE id='$id'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);


if (isset($_POST['name'])) {
    // ada tidak parameter bernama edit, kalo ada jalankan perintah edit/update, kalo tidak ada
    // tambah data baru / insert
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $id_role = 5;
    $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];

    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO instructors (id_role, name, gender, education, phone, email, password, address) VALUES ('id_role','$name','$gender','$education','$phone','$email', '$password','$address')");
        header("location:?page=instructor&tambah=berhasil");
    } else {
        $Update = mysqli_query($config, "UPDATE instructors SET id_role=$id_role', name='$name', gender='$gender', education='$education', phone='$phone', email='$email', password='$password', address='$address' WHERE id='$id_user'");
        header("Location:?page=instructor&ubah=berhasil"); {
        }
    }
}

?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo isset($rowEdit['id']) ? 'Edit' : 'Add' ?> Instructor</h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Name * </label>
                        <input value="<?php echo isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>" type="text" class="form-control" name="name" placeholder="Enter instructor name" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Gender *</label>
                        <br>
                        <input type="radio" name="gender" value="1" <?php echo isset($rowEdit['gender']) ? ($rowEdit['gender'] == 1) ? 'checked' : '' : '' ?>> Male
                        <input type="radio" name="gender" value="0" <?php echo isset($rowEdit['gender']) ? ($rowEdit['gender'] == 0) ? 'checked' : '' : '' ?>> Female

                    </div>
                    <div class="mb-3">
                        <label for="">Education * </label>
                        <input value="<?php echo isset($rowEdit['education']) ? $rowEdit['education'] : '' ?>" type="text" class="form-control"
                            name="education" placeholder="Enter your education">
                    </div>

                    <div class="mb-3">
                        <label for=""> Phone * </label>
                        <input value="<?php echo isset($rowEdit['phone']) ? $rowEdit['phone'] : '' ?>" type="text" class="form-control"
                            name="phone" placeholder="Enter your phone">
                    </div>

                    <div class="mb-3">
                        <label for="">Email * </label>
                        <input value="<?php echo isset($rowEdit['email']) ? $rowEdit['email'] : '' ?>" type="text" class="form-control"
                            name="email" placeholder="Enter your email" required>">
                    </div>
                    <div class="mb-3">
                        <label for="">Password *</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your password"
                            <?php echo empty($_GET['edit']) ? 'required' : '' ?>>
                        <small>
                            )* if you want to change your password, you can fill this field
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="">Address * </label>
                        <textarea name="address" id="" class="form-control"><?php echo isset($rowEdit['address']) ? $rowEdit['address'] : '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" name="save" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>