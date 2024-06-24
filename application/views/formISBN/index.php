<style>
    body {
        padding: 2rem 0;
    }
</style>
<h2 style="text-align: center; color: navy;">FORMULIR PENGAJUAN NOMOR ISBN</h2>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row mx-0 justify-content-center">
        <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 px-xxl-3">
            <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="<?= base_url('home'); ?>" enctype="multipart/form-data">
                <label class="d-block mb-4">
                    <span class="form-label d-block">Nama</span>
                    <input required name="name" type="text" class="form-control" placeholder="M Nevo Al Hadi" />
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">Judul Buku</span>
                    <input required name="email" type="text" class="form-control" placeholder="Cara bermain Balmond dengan baik dan benar" />
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">Jumlah Halaman</span>
                    <input required name="email" type="number" class="form-control" placeholder="100" />
                </label>

                <label class="d-block mb-4">
                    <span class="form-label d-block">Deskripsi Buku</span>
                    <textarea name="message" class="form-control" rows="3" placeholder="Nepo suka main balmon"></textarea>
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