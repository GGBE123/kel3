<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Registration</title>
    <style>
        body {
            background: linear-gradient(45deg, #6ab1d7, #33d9b2);
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            max-width: 600px; /* Menambahkan batas lebar maksimal */
            width: 100%;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .card-body {
            animation: fadeInUp 1s;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg animate__animated animate__fadeInUp">
            <div class="card-header text-center">
                <h2>Registration</h2>
                <p>Enter your details to register</p>
            </div>
            <div class="card-body p-4 p-md-5">
                <form action="<?= base_url('Regist/register'); ?>" method="post">
                    <div class="mb-3">
                        <label for="NIP" class="form-label">NIP/M <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="NIP" id="NIP" placeholder="NIP or NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" pattern=".+\.pcr.ac.id" title="Please provide only a Best Startup Ever corporate email address">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                        <select required name="role" class="form-select">
                            <option>Dosen</option>
                            <option>Staff</option>
                            <option>Mahasiswa</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-lg btn-primary" type="submit">Register</button>
                    </div>
                </form>
                <hr class="my-4">
                <p class="text-center text-secondary">Already have an account? <a href="<?= base_url('penulisLogin'); ?>" class="link-primary text-decoration-none">Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
