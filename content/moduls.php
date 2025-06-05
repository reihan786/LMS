<?php
$query = mysqli_query($config, "SELECT majors.name as major_name, instructors.name as instructor_name, moduls.*
FROM  moduls 
LEFT JOIN majors ON majors.id = moduls.id_major
LEFT JOIN instructors ON instructors.id = moduls.id_instructor
ORDER BY moduls.id DESC");
//desc : 12345, asc:54321
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Moduls</h5>
                <div class="mb-3" align="right">
                    <a href="?page=tambah-modul" class="btn btn-primary">Add Moduls</a>
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered">
                        <thead class="text-center table-primary">
                            <tr>
                                <th>No</th>
                                <th>Instructor</th>
                                <th>Major</th>
                                <th>Title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $key => $data): ?>
                                <tr>
                                    <td><?php echo $key += 1; ?></td>
                                    <td><?php echo $data['instructor_name']; ?></td>
                                    <td><?php echo $data['major_name']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td> <a href="?page=tambah-modul&edit=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Are you sure wanna delete this data??')"
                                            href="?page=tambah-modul&delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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