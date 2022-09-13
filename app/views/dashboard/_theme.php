<?php

session_start();

if ((isset($_SESSION['isAdm']) != "adm")) {
  unset($_SESSION['isAdm']);
  header('Location: https://tvone.ao/dashboard');

  exit();
}

require 'src/db/config.php';

$adm_name = "";
$adm_email = $_SESSION['adm_email'];

$get_user = $pdo->prepare("SELECT * FROM user_adm WHERE adm_email=?");
$get_user->execute(array($adm_email));


foreach ($get_user as $data) {
  $adm_name = $data['adm_name'];
};

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


  <!-- Custom fonts for this template-->
  <link href="<?= urlProject(FOLDER_DASHBOARD . "/src/bootstrap/vendor/fontawesome-free/css/all.min.css") ?> "
    rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= urlProject(FOLDER_DASHBOARD . " /src/bootstrap/css/sb-admin-2.min.css") ?>" rel="stylesheet">

  <title> <?= SITE ?> adm </title>
</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= urlDashProject() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Tv One Admin <sup>TM</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span style="color: #ffffff;">Serviços de utilidade</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Telas Principais:</h6>
            <a class="collapse-item" href="<?= urlDashProject("news") ?>">Noticias</a>
            <a class="collapse-item" href="<?= urlDashProject("categories") ?>">Categorias</a>
            <a class="collapse-item" href="<?= urlDashProject("authors") ?>">Autores</a>
            <a class="collapse-item" href="<?= urlDashProject("publicity") ?>">Publicidade</a>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-comment" aria-hidden="true"></i>
          <span style="color: #ffffff;">Interatividade</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Principais interações:</h6>
            <a class="collapse-item" href="<?= urlDashProject("messages") ?>">Mensagens</a>
            <a class="collapse-item" href="<?= urlDashProject("newsLetters") ?>">Newsletter</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $adm_name ?> </span>
                <img class="img-profile rounded-circle" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="20" heigth="20">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?= $this->section('content') ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Todos direitos reservados 2022 &copy; Projetado por Tchossy Solution.</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecionou "Sair" abaixo se estiver pronto para encerrar sua sessão atual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <form novalidate method="post" action="<?= urlProject(CONTROLLERS . "/loginControllers.php") ?>">
            <button type="submit" name="logOut_Adm" class="btn btn-primary">
              Sair
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="<?= urlProject(FOLDER_DASHBOARD . "/src/bootstrap/vendor/jquery/jquery.min.js") ?> "></script>
  <script src="<?= urlProject(FOLDER_DASHBOARD . "/src/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js") ?> ">
  </script>

  <!-- Core plugin JavaScript-->
  <script src="<?= urlProject(FOLDER_DASHBOARD . "/src/bootstrap/vendor/jquery-easing/jquery.easing.min.js") ?> /">
  </script>

  <!-- Custom scripts for all pages-->
  <script src="<?= urlProject(FOLDER_DASHBOARD . "/src/bootstrap/js/sb-admin-2.min.js") ?> "></script>

</body>

</html>