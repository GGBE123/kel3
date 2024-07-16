<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center mt-5">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <p class="m-b-0">Dashboard menu</p>
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
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="table-section mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Not Reviewed</h5>
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
                                                <th>Title</th>
                                                <th>Pages</th>
                                                <th>Media</th>
                                                <th>Synopsis</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($dataIsbn['not reviewed']) && !empty($dataIsbn['not reviewed'])) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($dataIsbn['not reviewed'] as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['nip_m']; ?></td>
                                                        <td><?= $row['pengarang']; ?></td>
                                                        <td><?= $row['judul']; ?></td>
                                                        <td><?= $row['halaman']; ?></td>
                                                        <td><?= $row['media']; ?></td>
                                                        <td><?= $row['sinopsis']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusModal" data-id="<?= $row['id_buku']; ?>">
                                                                Change Status
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="9" class="text-center">No submissions found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-section mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Being Reviewed</h5>
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
                                                <th>Title</th>
                                                <th>Pages</th>
                                                <th>Media</th>
                                                <th>Synopsis</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($dataIsbn['being reviewed']) && !empty($dataIsbn['being reviewed'])) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($dataIsbn['being reviewed'] as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['nip_m']; ?></td>
                                                        <td><?= $row['pengarang']; ?></td>
                                                        <td><?= $row['judul']; ?></td>
                                                        <td><?= $row['halaman']; ?></td>
                                                        <td><?= $row['media']; ?></td>
                                                        <td><?= $row['sinopsis']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusModal" data-id="<?= $row['id_buku']; ?>">
                                                                Change Status
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="9" class="text-center">No submissions found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-section mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Accepted</h5>
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
                                                <th>Title</th>
                                                <th>Pages</th>
                                                <th>Media</th>
                                                <th>Synopsis</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($dataIsbn['accepted']) && !empty($dataIsbn['accepted'])) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($dataIsbn['accepted'] as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['nip_m']; ?></td>
                                                        <td><?= $row['pengarang']; ?></td>
                                                        <td><?= $row['judul']; ?></td>
                                                        <td><?= $row['halaman']; ?></td>
                                                        <td><?= $row['media']; ?></td>
                                                        <td><?= $row['sinopsis']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td>
                                                            <!-- No action for accepted -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="9" class="text-center">No submissions found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-section mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Denied</h5>
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
                                                <th>Title</th>
                                                <th>Pages</th>
                                                <th>Media</th>
                                                <th>Synopsis</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($dataIsbn['denied']) && !empty($dataIsbn['denied'])) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($dataIsbn['denied'] as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['nip_m']; ?></td>
                                                        <td><?= $row['pengarang']; ?></td>
                                                        <td><?= $row['judul']; ?></td>
                                                        <td><?= $row['halaman']; ?></td>
                                                        <td><?= $row['media']; ?></td>
                                                        <td><?= $row['sinopsis']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td>
                                                            <!-- No action for denied -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="9" class="text-center">No submissions found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
</div>
