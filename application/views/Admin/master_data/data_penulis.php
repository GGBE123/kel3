<div class="pcoded-content">
    <!-- Container untuk seluruh konten halaman -->
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center mt-5">
                <div class="col-md-8">
                    <!-- Bagian judul halaman -->
                    <div class="page-header-title">
                        <p class="m-b-0">List User (writers) Account</p> <!-- Judul halaman -->
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Breadcrumb navigasi -->
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a> <!-- Link ke halaman utama -->
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a></li> <!-- Link ke dashboard -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <!-- Card untuk menampilkan tabel data -->
    <div class="card">
        <div class="card-header">
            <!-- Bagian header card -->
        </div>
        <div class="card-block table-border-style">
            <!-- Bagian konten tabel -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="bg-dark text-white">
                        <!-- Header tabel dengan latar belakang hitam dan teks putih -->
                        <tr>
                            <th>#</th>
                            <th>NIP/M</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penulis as $index => $p): ?>
                        <!-- Mengulang untuk setiap data penulis -->
                        <tr>
                            <td><?= $index + 1 ?></td> <!-- Nomor urutan -->
                            <td><?= $p->nip_m ?></td> <!-- NIP/M penulis -->
                            <td><?= $p->nama ?></td> <!-- Nama penulis -->
                            <td><?= $p->email ?></td> <!-- Email penulis -->
                            <td><?= $p->role ?></td> <!-- Peran atau role penulis -->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
