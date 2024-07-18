<!DOCTYPE html>
<html lang="en">

<head>
    <title>ISBN PCR</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/img/LogoProj.png') ?>">
    <!-- Charset UTF-8 untuk mendukung karakter unicode -->
    <meta charset="UTF-8">
    <!-- Viewport untuk responsivitas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menggunakan Bootstrap CSS dari CDN -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Menggunakan animate.css untuk animasi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Registration</title>
    <!-- Stylesheet inline untuk tata letak dan tampilan -->
    <style>
        body {
            /* Gradient background */
            background: linear-gradient(45deg, #2b3990, #06A3DA);
            min-height: 100vh;
            /* Set tinggi minimum sesuai viewport */
        }

        .card {
            border: none;
            /* Hilangkan border pada kartu */
            border-radius: 15px;
            /* Tambahkan border radius */
            overflow: hidden;
            /* Konten yang melampaui batas akan tersembunyi */
            max-width: 600px;
            /* Lebar maksimal kartu */
            width: 100%;
            /* Kartu mengambil lebar penuh */
        }

        .card-header {
            background-color: #2b3990;
            /* Warna latar belakang header */
            color: white;
            /* Warna teks putih */
        }

        .card-body {
            animation: fadeInUp 1s;
            /* Animasi fadeInUp pada card body */
        }

        .btn-primary {
            background-color: #2b3990;
            /* Warna latar belakang tombol utama */
            border: none;
            /* Hilangkan border tombol */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Warna latar belakang tombol saat hover */
        }
    </style>
</head>

<body>
    <!-- Bagian utama form -->
    <div class="form-02-main">
        <!-- Container untuk pusatkan konten secara vertikal dan horizontal -->
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <!-- Kartu registrasi dengan bayangan dan animasi fadeInUp -->
            <div class="card shadow-lg animate__animated animate__fadeInUp">
                <!-- Header kartu dengan latar belakang dan teks putih -->
                <div class="card-header text-center">
                    <h2>Registration</h2>
                    <p>Enter your details to register</p>
                </div>
                <!-- Isi dari kartu dengan padding 4 pada tampilan desktop dan 5 pada tampilan mobile -->
                <div class="card-body p-4 p-md-5">
                    <!-- Form untuk registrasi dengan action menuju halaman register -->
                    <form action="<?= base_url('Regist/register'); ?>" method="post">
                        <!-- Input untuk NIP atau NIM -->
                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP/M <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="NIP" id="NIP" placeholder="NIP or NIM" required>
                        </div>
                        <!-- Input untuk nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Your Name" required>
                        </div>
                        <!-- Input untuk email dengan pola .pcr.ac.id -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" pattern=".+\.pcr.ac.id" title="Please provide only a Best Startup Ever corporate email address">
                        </div>
                        <!-- Input untuk password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <!-- Validasi error untuk password -->
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                        </div>
                        <!-- Pilihan peran (role) dengan opsi Dosen, Staff, Mahasiswa -->
                        <div class="mb-4">
                            <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                            <select required name="role" class="form-select">
                                <option>Dosen</option>
                                <option>Staff</option>
                                <option>Mahasiswa</option>
                            </select>
                        </div>
                        <!-- Tombol Register dengan tampilan besar -->
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary" type="submit">Register</button>
                        </div>
                    </form>
                    <!-- Garis pemisah -->
                    <hr class="my-4">
                    <!-- Teks opsi untuk login jika sudah punya akun -->
                    <p class="text-center text-secondary">Already have an account? <a href="<?= base_url('penulisLogin'); ?>" class="link-primary text-decoration-none">Login</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Memuat script Bootstrap untuk fungsionalitas tambahan -->
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
