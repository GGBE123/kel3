<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            padding: 2rem 0;
        }
    </style>
    <h2 style="text-align: center; color: navy;">FORMULIR PENGAJUAN NOMOR ISBN</h2>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row mx-0 justify-content-center">
        <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 px-xxl-3">
            <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="<?= base_url('pengajuan/submit'); ?>" enctype="multipart/form-data">
                <label class="d-block mb-4">
                    <span class="form-label d-block">Pengarang</span>
                    <input required name="pengarang" type="text" class="form-control" placeholder="Nama Pengarang" />
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">Judul</span>
                    <input required name="judul" type="text" class="form-control" placeholder="Judul Buku" />
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">Jumlah Halaman</span>
                    <input required name="halaman" type="number" class="form-control" placeholder="Jumlah Halaman" />
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">Media</span>
                    <select required name="media" class="form-control">
                        <option value="buku">Buku</option>
                        <option value="buku digital">Buku Digital</option>
                    </select>
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">Sinopsis</span>
                    <textarea name="sinopsis" class="form-control" rows="3" placeholder="Sinopsis Buku"></textarea>
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">File Buku</span>
                    <input required name="cv" type="file" class="form-control" />
                </label>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary px-3 rounded-3">
                        Kirim    
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
