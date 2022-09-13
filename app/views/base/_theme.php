<?php

//conexao da base de dados//
require 'src/db/config.php';

// Mais noticias sessão 1
$footerNewsList1 = $pdo->prepare("SELECT * FROM news WHERE category_id = ? ORDER BY id DESC limit 0, 4 ");
$footerNewsList1->execute(array(rand(1, 12)));
// Mais noticias sessão 2
$footerNewsList2 = $pdo->prepare("SELECT * FROM news WHERE category_id = ? ORDER BY id DESC limit 4, 4 ");
$footerNewsList2->execute(array(rand(1, 12)));

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Favicons -->
  <link href="<?= urlProject(FOLDER_BASE . "/src/assets/icons/TVONE_favicon.jpg") ?>" rel="icon" />
  <link href="<?= urlProject(FOLDER_BASE . "/src/assets/icons/TVONE_favicon.jpg") ?>" rel="apple-touch-icon" />

  <!-- STYLES -->
  <link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/public/styles/globalStyle.css") ?>">

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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <title> <?= SITE ?> </title>
</head>

<body>
  <?php
  if ($this->section('publicity')) :
    echo $this->section('publicity');
  endif;
  ?>


  <?php
  if ($this->section('removeHeader')) :
    echo $this->section('removeHeader');
  else :
    require 'src/components/Header/index.php';
  endif;
  ?>

  <main>
    <?= $this->section('content') ?>
  </main>

  <?php
  if ($this->section('removeFooter')) :
    echo $this->section('removeFooter');
  else :
    require 'src/components/Footer/index.php';
  endif;
  ?>

  <script src="https://kit.fontawesome.com/792a6b2573.js" crossorigin="anonymous"></script>

  <script type="text/javascript" src="<?= urlProject(FOLDER_BASE . BASE_JS . "/HeaderScript.js") ?>">
  </script>


  <script type="module">
  import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'

  const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    }
  })

  const publicitySwiper = new Swiper('.publicitySwiper', {
    // Optional parameters
    direction: 'horizontal',
    spaceBetween: 100,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    // If we need pagination
    pagination: {
      el: '.swiper-pagination-publicitySwiper',
      clickable: true
    }
  })

  const services = new Swiper('.services', {
    loop: true,
    slidesPerView: 4,
    centeredSlides: false,
    grabCursor: true,

    on: {
      resize: function() {
        swiper.changeSlidesPerView(getNumberPreView())
      }
    },
    // Navigation arrows
    navigation: {
      nextEl: '.swiper2-button-next',
      prevEl: '.swiper2-button-prev'
    },
    pagination: {
      el: '.swiper-pagination2',
      clickable: true
    }
  })
  </script>
</body>

</html>