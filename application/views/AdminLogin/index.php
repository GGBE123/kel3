<!DOCTYPE html>
<html lang="en">

<head>
    <title>ISBN PCR</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/img/LogoProj.png')?>"> <!-- Menambahkan ikon untuk halaman -->

    <!-- Pengaturan karakter set dan viewport -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Memuat Bootstrap CSS -->
    <link href="<?= base_url('assets/'); ?>css1/bootstrap.min.css" rel="stylesheet">
    <!-- Memuat Font Awesome CSS -->
    <link href="<?= base_url('assets/'); ?>css1/font-awesome.min.css" rel="stylesheet">
    <!-- Memuat stylesheet kustom -->
    <link href="<?= base_url('assets/'); ?>css1/style.css" rel="stylesheet">
    <!-- Memuat animate.css untuk animasi -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>

<body>
    <!-- Bagian utama form login -->
    <section class="form-02-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de animate__animated animate__fadeInUp">
                        <!-- Animasi fadeInUp pada div utama -->
                        <div class="form-03-main">
                            <!-- Form login dengan action ke halaman AdminLogin -->
                            <form action="<?= base_url('AdminLogin'); ?>" method="post">
                                <div class="logo">
                                    <img src="<?= base_url('assets/'); ?>img/user.png" class="animate__animated animate__bounceIn">
                                    <!-- Animasi bounceIn pada logo -->
                                </div>
                                <!-- Pesan flash data untuk pesan login -->
                                <?= $this->session->flashdata('login_message'); ?>
                                <!-- Input untuk email -->
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control _ge_de_ol" placeholder="Enter Email" required="" aria-required="true">
                                    <!-- Validasi error untuk email -->
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- Input untuk password -->
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control _ge_de_ol" placeholder="Enter Password" required="" aria-required="true">
                                    <!-- Validasi error untuk password -->
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- Tombol untuk login -->
                                <div class="form-group">
                                    <button type="submit" class="_btn_04">Login</button>
                                </div>
                                <!-- Link kembali ke halaman home -->
                                <div class="form-group">
                                    <div class="_btn_04">
                                        <a href="<?= base_url('home'); ?>">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
