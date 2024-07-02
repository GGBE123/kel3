<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $title ?></title>
  <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
  <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
  <meta name="author" content="codedthemes" />
  <!-- Favicon icon -->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
  <!-- waves.css -->
  <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets_admin/'); ?>assets/css/bootstrap/css/bootstrap.min.css">
  <!-- waves.css -->
  <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
  <!-- themify icon -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets_admin/'); ?>assets/icon/themify-icons/themify-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets_admin/'); ?>assets/icon/font-awesome/css/font-awesome.min.css">
  <!-- scrollbar.css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets_admin/'); ?>assets/css/jquery.mCustomScrollbar.css">
  <!-- am chart export.css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- Style.css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets_admin/'); ?>assets/css/style.css">
</head>

<body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
    <div class="loader-track">
      <div class="preloader-wrapper">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>

        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>

        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
          <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
              <i class="ti-menu"></i>
            </a>
            <div class="mobile-search waves-effect waves-light">
              <div class="header-search">
                <div class="main-search morphsearch-search">
                  <div class="input-group">
                    <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                    <input type="text" class="form-control" placeholder="Enter Keyword">
                    <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <a href="<?= base_url('Penulis')?>">
              <img class="img-fluid" src="<?= base_url('assets/') ?>img/logo_pcr.png" alt="Theme-Logo" style="width: 185px;"/>
            </a>
            <a class="mobile-options waves-effect waves-light">
              <i class="ti-more"></i>
            </a>
          </div>

          <div class="navbar-container container-fluid">
            <ul class="nav-left">
              <li>
                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
              </li>
              <li class="header-search">
                <div class="main-search morphsearch-search">
                  <div class="input-group">
                    <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                  </div>
                </div>
              </li>
              <li>
                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                  <i class="ti-fullscreen"></i>
                </a>
              </li>
            </ul>
            <ul class="nav-right">
              <li class="header-notification">
                <a href="#!" class="waves-effect waves-light">
                  <i class="ti-bell"></i>
                  <span class="badge bg-c-red"></span>
                </a>
                <ul class="show-notification">
                  <li>
                    <h6>Notifications</h6>
                    <label class="label label-danger">Baru</label>
                  </li>
                  <li class="waves-effect waves-light">
                    <div class="media">
                      <img class="d-flex align-self-center img-radius" src="<?= base_url('assets/')?>img/testimonial-4.jpg" alt="Generic placeholder image">
                      <div class="media-body">
                        <h5 class="notification-user">John Doe</h5>
                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                        <span class="notification-time">30 minutes ago</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="">
                <span class="text-light">
                  <?= $user['email'] ?>
                </span>
              </li>
              <li class="waves-effect waves-light">
                <a href="<?= base_url('logout')?>" onclick="return confirm('Real?')">
                  <i class="ti-layout-sidebar-left"></i> Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>