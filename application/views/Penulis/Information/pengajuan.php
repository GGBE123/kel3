<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center mt-5">
                <div class="col-md-8">
                    <div class="page-header-title"></div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item"></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Create Submission
                                </button>
                                <?= $this->session->flashdata('penulis_message'); ?>
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
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#updateModal" data-pengarang="<?= $row['pengarang'] ?>" data-judul="<?= $row['judul'] ?>" data-halaman="<?= $row['halaman'] ?>" data-media="<?= $row['media'] ?>" data-sinopsis="<?= $row['sinopsis'] ?>" data-id_buku="<?= $row['id_buku'] ?>" onclick="changerModalData(this)">Update</button>
                                                    <a href="<?= base_url('Pengajuan/deleteData/') . $row['id_milik'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
                        <label for="additional_authors">Additional Writer(s)</label>
                        <div id="authors">
                            <input type="text" class="form-control" name="additional_authors[]" placeholder="Writer's Name">
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" onclick="addAuthorField()">Add Another Writer</button>
                    </div>
                    <div class="form-group">
                        <label for="judul">Title</label>
                        <input type="text" class="form-control" name="judul" id="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="halaman">Number of Pages</label>
                        <input type="text" class="form-control" name="halaman" id="halaman" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Book File</label>
                        <input type="file" name="isi_buku" id="isi_buku">
                        <input type="file" name="cover_buku" id="cover_buku">
                    </div>
                    <div class="form-group">
                        <label for="media">Media</label>
                        <select class="form-control" name="media" id="media" required>
                            <option value="buku">Book</option>
                            <option value="buku digital">Digital Book</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sinopsis">Synopsis</label>
                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3" required></textarea>
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

                <input type="hidden" class="form-control" id="id_buku_update" required>
                <div class="form-group">
                    <label for="pengarang_update">Writer(s)</label>
                    <input type="text" class="form-control" name="pengarang_update" id="pengarang_update" required>
                </div>
                <div class="form-group">
                    <label for="judul_update">Title</label>
                    <input type="text" class="form-control" name="judul_update" id="judul_update" required>
                </div>
                <div class="form-group">
                    <label for="halaman_update">Number of Pages</label>
                    <input type="number" class="form-control" name="halaman_update" id="halaman_update" required>
                </div>
                <div class="form-group">
                    <label for="media_update">Media</label>
                    <select class="form-control" name="media_update" id="media_update" required>
                        <option value="buku">Book</option>
                        <option value="buku digital">Digital Book</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sinopsis_update">Synopsis</label>
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
    function addAuthorField() {
        var authorDiv = document.getElementById('authors');
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'additional_authors[]';
        input.className = 'form-control mt-2';
        input.placeholder = "Writer's Name";
        authorDiv.appendChild(input);
    }

    function changerModalData(data) {
        let pengarang = data.getAttribute("data-pengarang");
        let judul = data.getAttribute("data-judul");
        let halaman = data.getAttribute("data-halaman");
        let media = data.getAttribute("data-media");
        let sinopsis = data.getAttribute("data-sinopsis");
        let id_buku = data.getAttribute("data-id_buku");

        // change value
        $('#pengarang_update').val(pengarang);
        $('#judul_update').val(judul);
        $('#halaman_update').val(parseInt(halaman));
        $('#media_update').val(media).change();
        $('#sinopsis_update').val(sinopsis);
        $('#id_buku_update').val(id_buku);
    }

    function updateBook() {
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
            success: function(data) {
                if (data.response == 201) {
                    $('#updateModal').modal('hide');
                    updateTableBuku(data.dataBuku);
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
            tr.append(`<td>${row.pengarang}</td>`);
            tr.append(`<td>${row.judul}</td>`);
            tr.append(`<td>${row.halaman}</td>`);
            tr.append(`<td>${row.media}</td>`);
            tr.append(`<td>${row.sinopsis}</td>`);
            tr.append(`<td>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#updateModal" data-pengarang="${row.pengarang}" data-judul="${row.judul}" data-halaman="${row.halaman}" data-media="${row.media}" data-sinopsis="${row.sinopsis}" data-id_buku="${row.id_buku}" onclick="changerModalData(this)">Update</button>
                <a href="<?= base_url('Pengajuan/deleteData/') ?>${row.id_milik}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>`);
            tableBody.append(tr);
            i++;
        });
    }
</script>

