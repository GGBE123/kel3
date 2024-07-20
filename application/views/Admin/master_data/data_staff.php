<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Menu</title>
    <!-- Add your CSS and JS files here -->
</head>
<body>
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center mt-5">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <p class="m-b-0">List Staff Account</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStaffModal">
                                   Add Staff
                                </button>
                                <br>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <?= $this->session->flashdata('staff_message'); ?>
                                </div>
                                <table class="table table-striped table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="staffList">
                                        <?php if (!empty($staff)) : ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($staff as $member) : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= htmlspecialchars($member->nama, ENT_QUOTES, 'UTF-8') ?></td>
                                                    <td><?= htmlspecialchars($member->email, ENT_QUOTES, 'UTF-8') ?></td>
                                                    <td><?= htmlspecialchars($member->role, ENT_QUOTES, 'UTF-8') ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/delete_staff/') . $member->id_staff ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php $i++ ?>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No staff accounts found</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Staff Modal -->
        <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStaffModalLabel">Add Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addStaffForm" method="POST" action="<?= base_url('admin/add_staff'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Name</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" id="role" name="role" value="staff perpustakaan" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Staff</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Staff Modal -->
        <div class="modal fade" id="updateStaffModal" tabindex="-1" aria-labelledby="updateStaffModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStaffModalLabel">Update Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateStaffForm" method="POST" action="<?= base_url('admin/update_staff'); ?>">
                        <div class="modal-body">
                            <input type="hidden" id="update_id" name="id">
                            <div class="form-group">
                                <label for="update_nama">Name</label>
                                <input type="text" class="form-control" id="update_nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="update_email">Email</label>
                                <input type="email" class="form-control" id="update_email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="update_role">Role</label>
                                <input type="text" class="form-control" id="update_role" name="role" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Staff</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fillUpdateModal(button) {
            const staff = button.getAttribute('data-staff');
            const staffData = JSON.parse(staff);

            document.getElementById('update_id').value = staffData.id_staff;
            document.getElementById('update_nama').value = staffData.nama;
            document.getElementById('update_email').value = staffData.email;
            document.getElementById('update_role').value = staffData.role;
        }
    </script>
</body>
</html>
