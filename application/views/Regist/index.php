<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<!-- Registration 2 - Bootstrap Brain Component -->
<div class="bg-light py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-5">
                                <h2 class="h3">Registration</h2>
                                <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                            </div>
                        </div>
                    </div>
                    <form action="#!">
                        <div class="row gy-3 gy-md-4 overflow-hidden">
                        <div class="col-12">
                                <label for="firstName" class="form-label">NIP/M <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="NIP" id="NIP" placeholder="Masukkan NIP/M" required>
                            </div>
                            <div class="col-12">
                                <label for="firstName" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@role.pcr.ac.id" required>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" value="" required>
                            </div>
                            <div class="col-12">
                                <label for="firstName" class="form-label">Role <span class="text-danger">*</span></label>
                                <select required name="role" class="form-select">
                                    <option>Dosen</option>
                                    <option>Staff</option>
                                    <option>Mahasiswa</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary" type="submit">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <hr class="mt-5 mb-4 border-secondary-subtle">
                            <div class="col-12">
                                <p class="m-0 text-secondary text-center">Already have an account?
                                    <a href="<?= base_url('penulisLogin'); ?>" class="link-primary text-decoration-none">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>