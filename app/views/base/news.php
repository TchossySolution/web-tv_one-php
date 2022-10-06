<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';
session_start();

$actual_pag = $newsPage['page'];

$pag = (!empty($actual_pag)) ? $actual_pag : 1;

// Setar quantidade de items por pagina
$qnt_result_page = 10;

// Calcular inicio da visualização
$start = ($qnt_result_page * $pag) - $qnt_result_page;

$allNews = $pdo->prepare("SELECT * FROM news ORDER BY id DESC LIMIT $start, $qnt_result_page");
$allNews->execute();

$publiciteis_1 = $pdo->prepare("SELECT * FROM publicity WHERE publicity_local = ? ORDER BY id DESC limit 0, 4 ");
$publiciteis_1->execute(array('Pag. noticias -> 1ª Pub grossa'));


// Publicidades
$publiciteis_square = $pdo->prepare("SELECT * FROM publicity WHERE publicity_local = ? ORDER BY id DESC limit 0, 6 ");
$publiciteis_square->execute(array('Pag. noticias -> Pub quadrada'));

// Mais noticias sessão 1
$rightNews1 = $pdo->prepare("SELECT * FROM news WHERE category_id = ? ORDER BY id DESC limit 0, 1 ");
$rightNews1->execute(array(rand(1, 13)));
$rightNewsList1 = $pdo->prepare("SELECT * FROM news WHERE category_id = ? ORDER BY id DESC limit 1, 4 ");
$rightNewsList1->execute(array(rand(1, 13)));
?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/newsStyled.css") ?>">

<main class="newsContainer">
  <div class="container">
    <section class="publicitySwiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <section class="slide" id="slide">
            <section class="publicity">
              <div class="container">
                <div class='containerImage'>
                  <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/COMENTARIOS2.jpg") ?>" alt="">
                </div>
              </div>
            </section>
          </section>
        </div>

        <?php foreach ($publiciteis_1 as $data) : ?>
        <div class="swiper-slide">
          <section class="slide" id="slide">
            <section class="publicity">
              <div class="container">
                <div class='containerImage'>
                  <img src=" <?= $data['image_publicity'] ?>" alt="">
                </div>
              </div>
            </section>
          </section>
        </div>
        <?php endforeach ?>
      </div>
    </section>

    <div class="indicateContainer">
      <a href=""> Home </a>
      <span> » </span>
      <a href=""> Notícias </a>
      <span> » </span>
      <a href=""> página <span> <?= $pag ?> </span> </a>
    </div>

    <div class="containerAllContent">
      <div class="containerLeft">
        <div class="allNotices">

          <?php foreach ($allNews as $data) :
            $author_id = $data['author_id'];
            $author_name;

            $get_author = $pdo->prepare("SELECT * FROM author where id=?");
            $get_author->execute(array($author_id));

            foreach ($get_author as $author) :
              $author_name = $author['name_author'];
            endforeach;

            $categoryName = '';
            $categoryId = $data['category_id'];

            $allCategory = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
            $allCategory->execute(array($categoryId));

            foreach ($allCategory as $category) :
              $categoryName = $category['name_category'];
            endforeach;

          ?>
          <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
            <div class="notice">

              <div class="imageContainer">
                <img src="<?= $data['image_news'] ?>" alt="">
              </div>

              <div class="noticeContent">
                <div>
                  <button class="categoryNews">
                    <?= $categoryName ?>
                  </button>
                </div>

                <h1>
                  <?= $data['title_news'] ?>
                </h1>

                <p>
                  <?= $data['resume_news'] ?>
                </p>

                <div class="noticeInfo">
                  <p>Por <strong> <?= $author_name ?></strong> - <span><i class="fa-solid fa-calendar-days"></i>
                      <?= $data['date_create'] ?></span></p>
                  <p><i class="fa-regular fa-comment-dots"></i> 3</p>
                </div>

                <div>
                  <button class="readMore">
                    Leia mais sobre a noticia
                    <i class="fa-solid fa-right-long"></i>
                  </button>
                </div>
              </div>
            </div>
          </a>

          <?php endforeach ?>

          <?php

          // Numero de items
          $result_pg = $pdo->prepare("SELECT COUNT(*) as num_result FROM news ");
          $result_pg->execute();
          $row_pag = $result_pg->fetchColumn();

          // Quantidade paginas
          $qnt_pag = ceil($row_pag / $qnt_result_page);

          // Limitar links antes e depois
          $max_link = 3;

          // echo $qnt_pag;
          ?>

          <div style="padding-top: 2rem;">
            <a href='<?= urlProject(BASE_NEWS . "/1") ?>'
              style="color: #000; padding: 8px 10px; border: solid 1px #ddd;  ">
              Primeira </a>

            <?php
            for ($pag_after = $pag - $max_link; $pag_after <= $pag - 1; $pag_after++) {

              if ($pag_after >= 1) {
            ?>
            <a href='<?= urlProject(BASE_NEWS . '/' . $pag_after) ?>'
              style='color: #000; padding: 8px 10px; border: solid 1px #ddd; '> <?= $pag_after ?> </a>
            <?php }
            } ?>

            <a style="color: #fff; padding: 8px 10px; background-color: #017dc7; "> <?= $pag ?>
            </a>

            <?php
            for ($pag_before = $pag + 1; $pag_before <= $pag + $max_link; $pag_before++) {

              if ($pag_before <= $qnt_pag) {
            ?>
            <a href='<?= urlProject(BASE_NEWS . '/' . $pag_before) ?>'
              style='color: #000; padding: 8px 10px; border: solid 1px #ddd; '> <?= $pag_before ?> </a>
            <?php }
            } ?>

            <a href='<?= urlProject(BASE_NEWS . "/" . $qnt_pag) ?>'
              style="color: #000; padding: 8px 10px; border: solid 1px #ddd;  "> Ultima </a>

          </div>

        </div>

      </div>

      <div class="rightContainer">
        <div class="otherNotices">
          <section class="mySwiper swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <?php foreach ($publiciteis_square as $data) { ?>
              <div class="swiper-slide">
                <section class="slide" id="slide">
                  <section class="publicity" style="width: 100%; height: 100%;">
                    <div class='containerImage'>
                      <img src=" <?= $data['image_publicity'] ?>" alt="">
                    </div>
                  </section>
                </section>
              </div>
              <?php } ?>
            </div>

          </section>

          <br>
          <br>

          <div class="categoryTItleSectionContainer">
            <h1>Não perca</h1>
          </div>

          <div class="noticeInEmphasis">
            <?php
            foreach ($rightNews1 as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> -
                      <span><?= $data['date_create'] ?></span>
                    </p>

                  </div>

                  <p><?= $data['resume_news'] ?></p>
                </div>
              </div>
            </a>
            <?php endforeach ?>
          </div>

          <br>
          <br>

          <div class="noticeResume">
            <?php
            foreach ($rightNewsList1 as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><?= $data['date_create'] ?></p>
                  </div>

                </div>
              </div>
            </a>
            <?php endforeach ?>

          </div>

        </div>
      </div>

    </div>

  </div>
</main>