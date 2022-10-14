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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- STYLES -->
  <link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/public/styles/globalStyles.css") ?>">
  <link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/public/styles/styles.css") ?>">

  <!-- FONTES -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,700&display=swap"
    rel="stylesheet">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <!-- trumbowyg -->
  <link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/dist/ui/trumbowyg.min.css") ?>">
  <link rel="stylesheet"
    href="<?= urlProject(FOLDER_DASHBOARD . "/src/dist/plugins/emoji/ui/trumbowyg.emoji.min.css") ?>">

  <!-- Swiper Js -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

  <title> <?= SITE ?> </title>
</head>

<body>
  <?php
  if ($this->section('removeHeader')) :
    echo $this->section('removeHeader');
  else :
    echo
    " <header class='page-header'>
        <nav>
          <a href='https://tvone.ao/dashboard/global' aria-label='forecastr logo' class='logo'>
            <h4>
              Painel
            </h4>
            <h3>
              Tv One
            </h3>
          </a>
          <button class='toggle-mob-menu' aria-expanded='false' aria-label='open menu'>
            <svg width='20' height='20' aria-hidden='true'>
              <use xlink:href='#down'></use>
            </svg>
          </button>
          <ul class='admin-menu'>
            <li class='menu-heading'>
              <h3>Admin</h3>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/global'>
                <i class='bi bi-back' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Geral</span>
              </a>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/users'>
                <i class='bi bi-person-fill' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Usuários</span>
              </a>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/news'>
                 <i class='bi bi-newspaper' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Noticias</span>
              </a>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/categories'>
                <i class='bi bi-tags-fill' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Categorias</span>
              </a>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/authors'>
               <i class='bi bi-person-rolodex' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Autores</span>
              </a>
            </li>
            <li>
            <a href='https://tvone.ao/dashboard/videos'>
             <i class='bi bi-camera-reels' style='font-size: 20px;' ></i>&nbsp&nbsp
              <span>Videos</span>
            </a>
          </li>
            <li>
              <a href='https://tvone.ao/dashboard/publicity'>
                <i class='bi bi-postage' style='font-size: 20px;' ></i>&nbsp&nbsp  
                <span>Publicidade</span>
              </a>
            </li>
            <li class='menu-heading'>
              <h3>Outros</h3>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/messages'>
                 <i class='bi bi-mailbox' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Mensagens</span>
              </a>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/newsLetters'>
               <i class='bi bi-envelope-exclamation-fill' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Newsletter</span>
              </a>
            </li>
            <li>
              <a href='https://tvone.ao/dashboard/comments'>
                <i class='bi bi-chat-square-text-fill' style='font-size: 20px;' ></i>&nbsp&nbsp
                <span>Comentários</span>
              </a>
            </li>
            <li>
   
            </li>
          </ul>
        </nav>
      </header>
  ";

  endif;
  ?>

  <section class="page-content">
    <section class="search-and-user">
      <div class="admin-profile">
        <span class="greeting"> <?= $adm_name ?> </span>
        <div class="notifications">
          <svg>
            <use xlink:href="#users"></use>
          </svg>
        </div>
      </div>

      <form novalidate method="post" action="<?= urlProject(CONTROLLERS . "/loginControllers.php") ?>">
        <button type="submit" name="logOut_Adm" class="btn btn-primary">
          Sair
        </button>
      </form>

    </section>
    <main style="padding: 1rem 2.6rem; background-color: #fff;">

      <?= $this->section('content') ?>

    </main>
    <footer class="page-footer">

      <a href="https://georgemartsoukos.com/" target="_blank">
        Todos direitos reservados 2022 © Projetado por Tchossy Solution.
      </a>
    </footer>
  </section>

  <!-- trumbowyg -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script type="text/javascript" src="<?= urlProject(FOLDER_DASHBOARD . "/src/dist/trumbowyg.min.js") ?>"></script>
  <script type="text/javascript" src="<?= urlProject(FOLDER_DASHBOARD . "/src/dist/langs/pt_br.min.js") ?>"></script>
  <script type="text/javascript"
    src="<?= urlProject(FOLDER_DASHBOARD . "/src/dist/plugins/emoji/trumbowyg.emoji.min.js") ?>"></script>

  <script>
  $('#trumbowyg-create').trumbowyg({
    lang: 'pt_br',
    btns: [
      ['viewHTML'],
      ['undo', 'redo'], // Only supported in Blink browsers
      ['formatting'],
      ['strong', 'em', 'del'],
      ['superscript', 'subscript'],
      ['link'],
      ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
      ['unorderedList', 'orderedList'],
      ['horizontalRule'],
      ['removeformat'],
      ['fullscreen'],
      ['emoji']
    ],
    autogrow: true
  });
  </script>


</body>

</html>