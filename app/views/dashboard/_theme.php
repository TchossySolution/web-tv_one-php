<!DOCTYPE html>
<html lang="pt-br">

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
    require 'src/components/Header/index.php';
  endif;
  ?>

  <main style="margin: 1rem 2.6rem;">

    <?= $this->section('content') ?>
  </main>

</body>

</html>