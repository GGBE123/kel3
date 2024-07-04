<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: none;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #06A3DA;
        color: white;
    }

    .modal-body {
        padding: 2px 16px;
    }
</style>
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center mt-5">
            <div class="col-md-8">
                <div class="page-header-title">
                    <p class="m-b-0">User Menu</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">List Submission Book</h5>
        <br>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>ISBN Number Submission Form</h2>
                </div>
                <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="<?= base_url('pengajuan/submit'); ?>" enctype="multipart/form-data">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Pengarang</span>
                        <input required name="pengarang" type="text" class="form-control" placeholder="Name" />
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
                            <option value="buku">Book</option>
                            <option value="buku digital">Digital Book</option>
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
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <button class="btn btn-sm btn-primary" id="myBtn">Create Submission</button>
            <table class="table table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>NIP/NIM</th>
                        <th>Email Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <button class="btn btn-sm btn-info">Update</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Trigger/Open The Modal -->

                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>

                            <button class="btn btn-sm btn-info">Update</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Larry</td>
                        <td>The Bird</td>
                        <td>@twitter</td>
                        <td>

                            <button class="btn btn-sm btn-info">Update</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>