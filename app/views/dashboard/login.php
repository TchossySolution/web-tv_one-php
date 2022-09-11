<?php
session_start();

if ((isset($_SESSION['isAdm']) == "adm")) {
  header('Location: https://tvone.ao/dashboard/news');
}
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



<div class="removeHeader"></div>

<body>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <img width="200" height="60" src="<?= urlProject(FOLDER_BASE . "/src/assets/images/tvone1.png") ?>">
              <div class="d-flex justify-content-center py-4">
                <h2 class="d-none d-lg-block text-primary" style="text-decoration: none; text-align: center;">Painel de
                  controlo</h2>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 ">Faça login na sua conta</h5>
                    <p class="text-center small">Digite seu nome de usuário e senha para entrar</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post"
                    action="<?= urlProject(CONTROLLERS . "/loginControllers.php") ?>">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="adm_email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Por favor insira seu nome de usuário.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Senha</label>
                      <input type="password" name="adm_password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Por favor, insira sua senha!</div>
                    </div>

                    <input style="display: none;" type="txt" name="isAdm" value="adm">

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Lembre de mim</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login_Adm">Conectar-se</button>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Projetado por <a href="https://tchossysolution.com/">Tchossy Solutions</a>
              </div>

            </div>
          </div>
        </div>

      </section>


      <section class=" section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div style="display: none;" class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <h2 class="d-none d-lg-block text-primary" style="text-decoration: none; text-align: center"> Painel de
                  controlo Tv One
                </h2>
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 ">Registrar uma nova conta</h5>
                    <p class="text-center small">Crie seu nome de usuário, email e senha para entrar</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post" action="">

                    <div class="col-12">
                      <label for="yourUserName" class="form-label">Nome do usuário</label>
                      <input type="text" name="adm_name" class="form-control" id="yourUserName" required>
                      <div class="invalid-feedback">Por favor insira seu nome de usuário!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUserEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="adm_email" class="form-control" id="yourUserEmail" required>
                        <div class="invalid-feedback">Por favor insira seu email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Senha</label>
                      <input type="password" name="adm_password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Por favor, insira sua senha!</div>
                    </div>

                    <input style="display: none;" type="txt" name="isAdm" value="adm">

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="">Registrar-se</button>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Projetado por <a href="https://tchossysolution.com/">Tchossy Solutions</a>
              </div>

            </div>
          </div>
        </div>
      </section>

    </div>
  </main>
</body>

</html>

<?php $this->start('removeHeader'); ?>

<?php $this->end(); ?>