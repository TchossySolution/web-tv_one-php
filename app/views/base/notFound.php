<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - 404</title>

  <!-- Custom fonts for this template-->
  <link href="<?= urlProject(FOLDER_BASE . "/src/bootstrap/vendor/fontawesome-free/css/all.min.css") ?> "
    rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= urlProject(FOLDER_BASE . " /src/bootstrap/css/sb-admin-2.min.css") ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404"><?= $this->e($error) ?></div>
            <p class="lead text-gray-800 mb-5">Página não encontrada</p>
            <p class="text-gray-500 mb-0">Parece que você encontrou uma falha na matriz...</p>
            <a href="<?= urlProject() ?>">&larr; Voltar para pagina inicial</a>
          </div>

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

  <!-- Bootstrap core JavaScript-->
  <script src="<?= urlProject(FOLDER_BASE . "/src/bootstrap/vendor/jquery/jquery.min.js") ?> "></script>
  <script src="<?= urlProject(FOLDER_BASE . "/src/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js") ?> "></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= urlProject(FOLDER_BASE . "/src/bootstrap/vendor/jquery-easing/jquery.easing.min.js") ?> /"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= urlProject(FOLDER_BASE . "/src/bootstrap/js/sb-admin-2.min.js") ?> "></script>

</body>

</html>