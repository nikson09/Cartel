<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Админпанель</title>
        <meta charset="UTF-8">
   

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/Templates/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Datatable CSS -->
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82d605eed3.js" crossorigin="anonymous"></script>
    <!-- Datatable JS -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158841020-1"></script>

    
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
    </head><!--/head-->
    <body id="page-top">
      <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fa fa-wine-bottle"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Drink King <sup>(Админ Панель)</sup></div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" href="/admin">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Главная</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Администратирование
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item active">
            <a class="nav-link" href="/admin/product">
              <i class="fas fa-barcode"></i>
              <span>Управление товарами</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="/admin/caterProducts">
              <i class="fas fa-book-open"></i>
              <span>Управление продуктами</span></a>
          </li>

            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item active">
                <a class="nav-link" href="/admin/caterKalyans">
                    <i class="fas fa-book-open"></i>
                    <span>Управление категорией кальян</span></a>
            </li>

          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="/admin/category">
              <i class="fas fa-book"></i>
              <span>Управление категориями</span></a>
          </li>

          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="/admin/order">
              <i class="fas fa-bell"></i>
              <span>Управление заказами</span></a>
          </li>

          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="/admin/pod_category">
              <i class="fas fa-book-open"></i>
              <span>Управление подкатегориями</span></a>
          </li>

          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="/admin/country">
              <i class="fas fa-globe-europe"></i>
              <span>Управление странами</span></a>
          </li>

          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="/admin/baners">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Управление банерами</span></a>
          </li>
          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="/admin/sms">
              <i class="fas fa-paper-plane"></i>
              <span>Управление смс</span></a>
          </li>
          <!-- Sidebar Toggler (Sidebar) -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Search -->

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Messages -->
                <li class="nav-item center"><a href="/" class="nav-item center text-gray-600"  style="display: block;margin-top: 22px;"><i class="fa fa-sign-out"></i>На сайт</a></li>
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Администратор</span>
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/user/logout/" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Выйти
                    </a>
                  </div>
                </li>

              </ul>

            </nav>