<?php $this->layout('_theme') ?>

<div class="removeHeader"></div>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <h2 class="d-none d-lg-block text-danger" style="text-decoration: none;">Pungo a Ndongo admin</h2>
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">


              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4 ">Faça login na sua conta</h5>
                  <p class="text-center small">Digite seu nome de usuário e senha para entrar</p>
                </div>

                <form class="row g-3 needs-validation" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Lembre de mim</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-danger w-100" type="submit">Conectar-se</button>
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

<?php $this->start('removeHeader'); ?>

<?php $this->end(); ?>