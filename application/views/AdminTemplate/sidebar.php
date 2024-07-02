<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-80 img-radius" src="<?= base_url('assets/') ?>img/testimonial-4.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span id="more-details"><?= $user['nama'] ?></span>
                        </div>
                    </div>

                </div>
                <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Menu</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?= @$dashboard ?>">
                        <a href="<?= base_url('admin') ?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <?php if ($user['role'] == 'admin') : ?>
                        <li class="pcoded-hasmenu <?= @$data_staff ?> <?= @$data_penulis ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Master Data</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?= @$data_staff ?>">
                                    <a href="<?= base_url('admin/data_staff') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Data Admin</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?= @$data_penulis ?>">
                                    <a href="<?= base_url('admin/data_penulis') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Data Penulis</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($user['role'] == 'staff') : ?>
                        <li class="pcoded-hasmenu <?= @$data_buku ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Data</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?= @$data_buku ?>">
                                    <a href="<?= base_url('admin/data_buku') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Data Admin</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                  
                </ul>
            </div>
        </nav>
        <!-- Required Jquery -->
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/jquery-ui/jquery-ui.min.js "></script>
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/popper.js/popper.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/bootstrap/js/bootstrap.min.js "></script>
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/pages/widget/excanvas.js "></script>
        <!-- waves js -->
        <script src="assets/pages/waves/js/waves.min.js"></script>
        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/modernizr/modernizr.js "></script>
        <!-- slimscroll js -->
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/SmoothScroll.js"></script>
        <script src="<?= base_url('assets_admin/'); ?>assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
        <!-- Chart js -->
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/chart.js/Chart.js"></script>
        <!-- amchart js -->
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="<?= base_url('assets_admin/'); ?>assets/pages/widget/amchart/gauge.js"></script>
        <script src="<?= base_url('assets_admin/'); ?>assets/pages/widget/amchart/serial.js"></script>
        <script src="<?= base_url('assets_admin/'); ?>assets/pages/widget/amchart/light.js"></script>
        <script src="<?= base_url('assets_admin/'); ?>assets/pages/widget/amchart/pie.min.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <!-- menu js -->
        <script src="<?= base_url('assets_admin/'); ?>assets/js/pcoded.min.js"></script>
        <script src="<?= base_url('assets_admin/'); ?>assets/js/vertical-layout.min.js "></script>
        <!-- custom js -->
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/pages/dashboard/custom-dashboard.js"></script>
        <script type="text/javascript" src="<?= base_url('assets_admin/'); ?>assets/js/script.js "></script>