<!-- Page-header start -->
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
                            <h5 class="mb-0">List Submission Book</h5>
                            <br>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Create Submission
                                </button>
                                <?= $this->session->flashdata('penulis_message'); ?>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Pengarang</th>
                                        <th>Judul</th>
                                        <th>Halaman</th>
                                        <th>Media</th>
                                        <th>sinopsis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_buku as $row) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['pengarang'] ?></td>
                                            <td><?= $row['judul'] ?></td>
                                            <td><?= $row['halaman'] ?></td>
                                            <td><?= $row['media'] ?></td>
                                            <td><?= $row['sinopsis'] ?></td>
                                            <td>
                                                <button class="btn btn-info" data-toggle="modal" data-target="#updateModal" data-pengarang="<?= $row['pengarang'] ?>" data-judul="<?= $row['judul']?>" data-halaman="<?= $row['halaman']?>" data-media="<?= $row['media']?>" data-sinopsis="<?= $row['sinopsis']?>" id_buku="<?= $row['id_buku'] ?>" onclick="changerModalData(this)">Update</button>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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
                        <label for="pengarang">Nama Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" id="pengarang" required>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="halaman">Jumlah halaman</label>
                        <input type="text" class="form-control" name="halaman" id="halaman" required>
                    </div>
                    <div class="form-group">
                        <label for="media">Media</label>
                        <select class="form-control" name="media" id="media" required>
                            <option value="buku">Book</option>
                            <option value="buku digital">Digital Book</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sinopsis">Sinopsis</label>
                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- START UPDATE MODAL -->

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    
                    <input type="hidden" class="form-control"  id="id_buku_update" required>
                    <div class="form-group">
                        <label for="pengarang_update">Nama Pengarang</label>
                        <input type="text" class="form-control" name="pengarang_update" id="pengarang_update" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_update">Judul</label>
                        <input type="text" class="form-control" name="judul_update" id="judul_update" required>
                    </div>
                    <div class="form-group">
                        <label for="halaman_update">Jumlah halaman</label>
                        <input type="number" class="form-control" name="halaman_update" id="halaman_update" required>
                    </div>
                    <div class="form-group">
                        <label for="media_update">Media</label>
                        <select class="form-control" name="media" id="media" required>
                            <option value="buku_update">Book</option>
                            <option value="buku digital_update">Digital Book</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sinopsis_update">Sinopsis</label>
                        <textarea class="form-control" name="sinopsis_update" id="sinopsis_update" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateBook()">Save changes</button>
                </div>
        </div>
    </div>
</div>
<!-- END UPDATE MODAL -->
<script>
    function changerModalData(data) {
        let pengarang = data.getAttribute("data-pengarang");
        let judul = data.getAttribute("data-judul");
        let halaman = data.getAttribute("data-halaman");
        let media = data.getAttribute("data-media");
        let sinopsis = data.getAttribute("data-sinopsis");
        let id_buku = data.getAttribute("id_buku");

        // change value
        $('#pengarang_update').val(pengarang);
        $('#judul_update').val(judul);
        $('#halaman_update').val(parseInt(halaman));
        $('#media_update').val(media).change()
        $('#sinopsis_update').val(sinopsis);
        $('#id_buku_update').val(id_buku);
    }
</script>
<script>
    function updateBook(){
      $.ajax({
                url: "<?= base_url('pengajuan/update'); ?>",
                method: "POST",
                data: {
                    id_buku: $('#id_buku_update').val(),
                    pengarang: $('#pengarang_update').val(),
                    judul: $('#judul_update').val(),
                    halaman: $('#halaman_update').val(),
                    media: $('#media_update').val(),
                    sinopsis: $('#sinopsis_update').val()

                },
                dataType: "json",
                success: function(response) {

                    window.location.replace("<?= base_url('Penulis/pengajuan') ?>");
                },
                error: function(error) {
                    console.error("Error fetching data: " + error);

                }
            });
        }
</script>