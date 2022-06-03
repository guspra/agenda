<!DOCTYPE html>
<?php
$username   = $this->session->userdata('username');
$level   = $this->session->userdata('level');
$nama	= $this->session->userdata('nama');

$foto = "img/user/user-default.png";

$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));
?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <title>Agenda - Kanwil Kemenkumham NTB</title>
    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }
      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }
      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1s infinite ease-in-out;
        animation: sk-scaleout 1s infinite ease-in-out;
      }
      @-webkit-keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
        }
        100% {
          -webkit-transform: scale(1);
          opacity: 0;
        }
      }
      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        }
        100% {
          -webkit-transform: scale(1);
          transform: scale(1);
          opacity: 0;
        }
      }
    </style>
    <link href="assets/agenda/style.css" rel="stylesheet" />
    <link href="assets/agenda/custom.css" rel="stylesheet" />
    <link href="node_modules/fullcalendar/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="node_modules/jquery-datetimepicker/jquery.datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css" />
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js"></script>
    
  </head>
  <body class="app">
    <div id="loader"><div class="spinner"></div></div>
    <script>
      window.addEventListener("load", () => {
        const loader = document.getElementById("loader");
        setTimeout(() => {
          loader.classList.add("fadeOut");
        }, 300);
      });
    </script>
    <div>
      <div class="sidebar">
        <div class="sidebar-inner">
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="index.html"
                  ><div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="assets/agenda/assets/static/images/logo.png" alt="" />
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text">Agenda</h5>
                    </div>
                  </div></a
                >
              </div>
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n"
                    ><i class="ti-arrow-circle-left"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Sidebar -->
          <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
              <a class="sidebar-link" href="index.html"
                ><span class="icon-holder"
                  ><i class="c-blue-500 ti-calendar"></i> </span
                ><span class="title">Kalender</span></a
              >
            </li>
            <li class="nav-item">
              <a class="sidebar-link" href="<?php if ($level == 'superadmin') {
									echo "datapengguna/v.html";
								} else {
									echo "profile.html";
								} ?>"
                ><span class="icon-holder"
                  ><i class="c-orange-500 ti-layout-list-thumb"></i> </span
                ><span class="title">Jadwal Harian</span></a
              >
            </li>
            <li class="nav-item">
              <a class="sidebar-link" href="<?php if ($level == 'superadmin') {
									echo "datapengguna/v.html";
								} else {
									echo "profile.html";
								} ?>"
                ><span class="icon-holder"
                  ><i class="c-deep-purple-500 ti-user"></i> </span
                ><span class="title">Data Pengguna</span></a
              >
            </li>
          </ul>
        </div>
      </div>
      <div class="page-container">
        <div class="header navbar">
          <div class="header-container">
            <ul class="nav-right">
              <li class="notifications dropdown">
                <span class="counter bgc-red">3</span>
                <a
                  href=""
                  class="dropdown-toggle no-after"
                  data-toggle="dropdown"
                  ><i class="ti-bell"></i
                ></a>
                <ul class="dropdown-menu">
                  <li class="pX-20 pY-15 bdB">
                    <i class="ti-bell pR-10"></i>
                    <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                  </li>
                  <li>
                    <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                    </ul>
                  </li>
                  <li class="pX-20 pY-15 ta-c bdT">
                    <span
                      ><a href="" class="c-grey-600 cH-blue fsz-sm td-n"
                        >View All Notifications
                        <i class="ti-angle-right fsz-xs mL-10"></i></a
                    ></span>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a
                  href=""
                  class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                  data-toggle="dropdown"
                  ><div class="peer mR-10">
                    <img
                      class="w-2r bdrs-50p"
                      src="<?php echo $foto; ?>"
                      alt=""
                    />
                  </div>
                  <div class="peer">
                    <span class="fsz-sm c-grey-900"><?php echo $nama; ?></span>
                  </div></a
                >
                <ul class="dropdown-menu fsz-sm">
                  <li>
                    <a href="profile.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-user mR-10"></i> <span>Profile</span></a
                    >
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="web/logout.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-power-off mR-10"></i> <span>Logout</span></a
                    >
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>