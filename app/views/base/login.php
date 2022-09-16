<?php
session_start();

if ((isset($_SESSION['isUser']) == "isUser")) {
  unset($_SESSION['isUser']);
  header('Location: https://tvone.ao');

  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/loginStyles.css") ?>">

  <title>TvOne Login</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form method="post" enctype="multipart/form-data"
        action="<?= urlProject(CONTROLLERS . "/loginUserControllers.php") ?>">
        <h1>Criar uma conta</h1>
        <br>
        <br>
        <span>Use seu e-mail para cadastro</span>
        <input type="file" class="form-control" name="user_photo_profile" placeholder="Selecione a sua foto de perfil"
          require>
        <input type="text" placeholder="Nome" name="user_name" />
        <input type="email" placeholder="E-mail" name="user_email" />
        <input type="password" placeholder="Senha" name="user_password" />

        <input style="display: none;" type="txt" name="isUser" value="isUser">
        <button type="submit" name="create_user">Sign Up</button>
      </form>
    </div>

    <div class="form-container sign-in-container">
      <form method="post" action="<?= urlProject(CONTROLLERS . "/loginUserControllers.php") ?>">
        <h1>Entrar</h1>
        <br>
        <br>
        <span>Use sua conta</span>
        <input type="email" placeholder="E-mail" name="user_email" />
        <input type="password" placeholder="Senha" name="user_password" />

        <input style="display: none;" type="txt" name="isUser" value="isUser">
        <button type="submit" name="login_user">Entrar</button>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Bem vindo de volta!</h1>
          <p>
            Para se manter conectado conosco, faça login com suas informações pessoais!
          </p>
          <button class="ghost" id="signIn">Entrar</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Olá amigo!</h1>
          <p>Insira seus dados pessoais e comece a e mantenha-se atualizado!</p>
          <button class="ghost" id="signUp">Increver-se</button>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <p>
      Todos direitos reservados 2022 &copy; Projetado por Tchossy Solution.
    </p>
  </footer>

  <script>
  const signUpButton = document.getElementById('signUp')
  const signInButton = document.getElementById('signIn')
  const container = document.getElementById('container')

  signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active')
  })

  signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active')
  })
  </script>
</body>

</html>