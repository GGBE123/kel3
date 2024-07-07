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
    <div class="pcoded-inner-content">
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
                                <table class="table table-striped table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Induk</th>
                                            <th>Writer / Writers</th>
                                            <th>Penerbit</th>
                                            <th>Title</th>
                                            <th>Pages</th>
                                            <th>Editor</th>
                                            <th>KDT</th>
                                            <th>Nomor ISBN</th>
                                            <th>Tanggal Terbit</th>
                                            <th>Email</th>
                                            <th>Media</th>
                                            <th>Synopsis</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bukuAju">
                                        <?php if (isset($all_submissions) && !empty($all_submissions)) : ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($all_submissions as $row) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $row['nip_m']; ?></td>
                                                    <td><?= $row['pengarang']; ?></td>
                                                    <td><?= $row['penerbit']; ?></td>
                                                    <td><?= $row['judul']; ?></td>
                                                    <td><?= $row['halaman']; ?></td>
                                                    <!-- Editor -->
                                                    <td>null</td>
                                                    <td><?= $row['kdt']; ?></td>
                                                    <td><?= $row['no_isbn']; ?></td>
                                                    <td><?= $row['tanggal_terbit']; ?></td>
                                                    <td><?= $row['email']; ?></td>
                                                    <td><?= $row['media']; ?></td>
                                                    <td><?= $row['sinopsis']; ?></td>
                                                    <td>
                                                        <!-- Actions like edit/delete can go here -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Change Status
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">No submissions found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ISBN Number Submission Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="<?= base_url('pengajuan/submit'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="media">Status</label>
                        <select class="form-control" name="media" id="media" required>
                            <option value="buku">Accepted</option>
                            <option value="buku digital">Review</option>
                            <option value="buku digital">Denied</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Book</button>
                </div>
            </form>
        </div>
    </div>
</div>