<!doctype html>
<html lang="en">

<head>
  <!-- Set karakter set utf-8 -->
  <meta charset="utf-8">
  <!-- Atur tampilan responsif -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Deskripsi halaman -->
  <meta name="description" content="">
  <!-- Penulis halaman -->
  <meta name="author" content="">

  <!-- Memuat stylesheet Bootstrap -->
  <link href="<?= base_url('assets/'); ?>css1/bootstrap.min.css" rel="stylesheet">
  <!-- Memuat stylesheet font-awesome -->
  <link href="<?= base_url('assets/'); ?>css1/font-awesome.min.css" rel="stylesheet">
  <!-- Memuat stylesheet kustom -->
  <link href="<?= base_url('assets/'); ?>css1/style.css" rel="stylesheet">
  <!-- Memuat animate.css untuk efek animasi -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>

<body>
  <!-- Bagian utama form -->
  <section class="form-02-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="_lk_de">
            <!-- Form login dengan animasi fadeInUp -->
            <div class="form-03-main animate__animated animate__fadeInUp">
              <!-- Form action untuk login -->
              <form action="<?= base_url('PenulisLogin'); ?>" method="post">
                <!-- Logo dengan animasi bounceIn -->
                <div class="logo">
                  <img src="<?= base_url('assets/'); ?>img/user.png" class="animate__animated animate__bounceIn">
                </div>
                <!-- Pesan flashdata untuk login -->
                <?= $this->session->flashdata('login_message'); ?>
                <!-- Input email -->
                <div class="form-group">
                  <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                  <!-- Validasi error untuk email -->
                  <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <!-- Input password -->
                <div class="form-group">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
                  <!-- Validasi error untuk password -->
                  <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <!-- Tombol untuk login -->
                <div class="form-group">
                  <button type="submit" class="_btn_04">Login</button>
                </div>
                <div class="form-group">
                  <div class="_btn_04">
                    <!-- Link kembali ke halaman utama -->
                    <a href="<?= base_url('home'); ?>">Back</a>
                  </div>
                  <!-- Teks untuk registrasi akun baru -->
                  <div class="form-group nm_lk">
                    <p>Don't have an account?</p>
                    <!-- Link untuk registrasi -->
                    <a href="<?= base_url('Regist'); ?>" class="link-primary text-decoration-none">Register Here</a>
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
