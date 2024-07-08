<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center mt-5">
                <div class="col-md-8">
                    <div class="page-header-title">
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">List of Books Submitted</h5>
                            <br>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <!-- Button trigger modal -->
                               
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Writer / Writers</th>
                                        <th>Title</th>
                                        <th>Pages</th>
                                        <th>Media</th>
                                        <th>Synopsis</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="bukuAju">
                                    <?php if (isset($data_buku) && !empty($data_buku)) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data_buku as $row) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $row['pengarang'] ?></td>
                                                <td><?= $row['judul'] ?></td>
                                                <td><?= $row['halaman'] ?></td>
                                                <td><?= $row['media'] ?></td>
                                                <td><?= $row['sinopsis'] ?></td>
                                                <td><?= $row['status'] ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateStatusModal" data-id_buku="<?= $row['id_buku'] ?>" data-status="<?= $row['status'] ?>" onclick="setStatusModalData(this)">Change Status</button>
                                                    <?= $this->session->flashdata('status_message'); ?>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No submissions found</td>
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
</div>

<!-- Change Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Change Book Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="<?= base_url('Admin/updateStatus'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="accepted">Accepted</option>
                            <option value="being reviewed">Review</option>
                            <option value="denied">Denied</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_buku" id="id_buku_status">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Change Status</button>
                    <?= $this->session->flashdata('status_message'); ?>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
    

    function setStatusModalData(data) {
        let id_buku = data.getAttribute("data-id_buku");
        let status = data.getAttribute("data-status");

        // change value
        $('#id_buku_status').val(id_buku);
        $('#status').val(status).change();
    }

    function updateStatus() {
        $.ajax({
            url: "<?= base_url('Admin/updateStatus'); ?>",
            method: "POST",
            data: {
                status: $('#status').val()
                
            },
            dataType: "json",
            success: function(data) {
                if (data.response === 200) {
                    $('#updateModal').modal('hide');
                    updateTableBuku(data.dataStatus);
                    Swal.fire({
                        title: "Success!",
                        text: "Data Updated!",
                        icon: "success"
                    });
                }
            },
            error: function(error) {
                console.error("Error fetching data: " + error);
            }
        });
    }

    function updateTableBuku(data) {
        var tableBody = $("#bukuAju");
        tableBody.empty(); // Clear existing rows
        let i = 1;
        $.each(data, function(index, row) {
            var tr = $("<tr>");
            tr.append(`<td>${i}</td>`);
            tr.append(`<td>${row.status}</td>`);
            tr.append(`<td>
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateStatusModal" data-id_buku="${row.id_buku}" data-status="${row.status}" onclick="setStatusModalData(this)">Change Status</button>
            </td>`);

            tableBody.append(tr);
            i++;
        });
    }
</script>