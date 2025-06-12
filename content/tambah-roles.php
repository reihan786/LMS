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

if (isset($_GET['add-role-menu'])) {
    $id_role = $_GET['add-role-menu'];
    
    $rowEditRoleMenu = [];
    $editRoleMenu = mysqli_query($config, "SELECT * FROM menus_roles WHERE id_roles='$id_role'");
// $rowEditRoleMenu = mysqli_fetch_all($editRoleMenu, MYSQLI_ASSOC);
    while ($editMenu = mysqli_fetch_assoc($editRoleMenu)) {
        $rowEditRoleMenu[] = $editMenu['id_menu'];
    }

    $menus = mysqli_query($config, "SELECT * FROM menus ORDER BY parent_id, urutan");

    $rowMenu = [];
    while ($m = mysqli_fetch_assoc($menus)) {
        $rowMenu[] = $m;
        // []1,[]2,[]3
    }
}

if (isset($_POST['save'])) {
    $id_role = $_GET['add-role-menu'];
    $id_menus = $_POST['id_menus'] ?? [];
    // if($_POST['id_menus']) {
    //     $id_menus = $_POST['id_menus'];
    // } else {
    //     $id_menus = [];
    // }
    mysqli_query($config, "DELETE FROM menus_roles WHERE id_roles ='$id_role'");
    foreach ($id_menus as $m) {
        $id_menu = $m;
        mysqli_query($config, "INSERT INTO menus_roles(id_roles, id_menu) VALUE('$id_role','$id_menu')");
    }

    header("location:?page=tambah-roles&add-role-menu=" . $id_role . "&tambah=berhasil");
}


?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo isset($rowEdit['id']) ? 'Edit' : 'Add' ?> Role</h5>
                <?php if (isset($_GET['add-role-menu'])): ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <ul>
                                <?php foreach ($rowMenu as $mainMenu) : ?>
                                    <?php if ($mainMenu['parent_id'] == 0 or $mainMenu['parent_id'] == ""): ?>
                                        <li>
                                            <label for="">
                                                <!-- jika id value id_menu nilai nya 1 
                                                  == jika nilai dari id_menu dari table menu_roles juga  -->
                                                <input <?php echo in_array($mainMenu['id'], $rowEditRoleMenu) ? 'checked' : '' ?> type="checkbox" name="id_menus[]"
                                                    value="<?php echo $mainMenu['id'] ?>">
                                                <?php echo $mainMenu['name'] ?>
                                            </label>
                                            <ul>
                                                <?php foreach ($rowMenu as $subMenu): ?>
                                                    <?php if ($subMenu['parent_id'] == $mainMenu['id']): ?>
                                                        <li>
                                                            <label for="">
                                                                <input <?php echo in_array($subMenu['id'], $rowEditRoleMenu) ? 'checked' : '' ?> type="checkbox" name="id_menus[]"
                                                                    value="<?php echo $subMenu['id'] ?>">
                                                                <?php echo $subMenu['name'] ?>
                                                            </label>
                                                        </li>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </ul>

                                        </li>
                                    <?php endif ?>

                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="save">Save Change</button>
                        </div>

                    </form>
                <?php elseif (isset($_GET['edit'])): ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">Name *</label>
                            <input value="<?php echo isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>" type="text"
                                class="form-control" name="name" placeholder="Enter your role name" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" name="save" value="Save">
                        </div>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>