<?php $this->layout('_theme') ?>

<?php
require 'src/db/config.php';

$id;

foreach ($newsId as $data) :
  $id = $data;
endforeach;

$title;
$categoria;

$news1 = $pdo->prepare("SELECT * FROM news where id=$id ");
$news1->execute();

foreach ($news1 as $data) :
  $category_id = $data['category_id'];
  $title = $data['title_news'];

  $get_category = $pdo->prepare("SELECT * FROM categories where id=$category_id");
  $get_category->execute();

  foreach ($get_category as $category) :
    $categoria = $category['name_category'];
  endforeach;
endforeach;


$news = $pdo->prepare("SELECT * FROM news where id=$id ");
$news->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/detailsNewsStyles.css") ?>">

<main class="detailsNewsContainer">
  <div class="container">
    <div class="indicateContainer">
      <a href=""> Home </a>
      <span> » </span>
      <a href=""> <?= $categoria  ?> </a>
      <span> » </span>
      <a href=""> <?= $title ?> </a>
    </div>

    <div class="containerAllContent">
      <?php
      foreach ($news as $data) :

        $author_id = $data['author_id'];
        $author_name;

        $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
        $get_author->execute();

        foreach ($get_author as $author) :
          $author_name = $author['name_author'];
        endforeach;

        $category_id = $data['category_id'];
        $category_name;

        $get_category = $pdo->prepare("SELECT * FROM categories where id=$category_id");
        $get_category->execute();

        foreach ($get_category as $category) :
          $category_name = $category['name_category'];
        endforeach;
      ?>
      <div class="containerLeft">

        <div class="categoryNewsContainer">
          <a href="<?= urlProject("news/search/category/$category_name/1") ?>">
            <strong class="categoryNews"> <?= $category_name ?> </strong>
          </a>
        </div>

        <h1><?= $data['title_news'] ?></h1>

        <p>
          <?= $data['resume_news'] ?>
        </p>

        <div class="infoNews">
          <div class="imageContainer">
            <img src="https://argumentumpericias.com.br/biblioteca/2019/09/sem-imagem-avatar.png" alt="">
          </div>
          <p>
            Por
            <a href="<?= urlProject("news/search/author/$author_name/1") ?>">
              <strong>
                <?= $author_name ?>
              </strong>
            </a>
            - <span><?= $data['date_create'] ?></span>
            - <span> Atualizado:
              <?= $data['date_update'] ?></span>
          </p>

          <div>
            <i class="fa-regular fa-comment-dots"></i> <span>3</span> comentários
          </div>

          <div>
            <i class="fa-regular fa-clock"></i> <span>2</span> minutos de leitura
          </div>

        </div>

        <div class="shareContainer">
          <div class="shareIn facebook">
            <i class="fa-brands fa-facebook-f"></i>
            <span>Facebook</span>
          </div>
          <div class="shareIn instagram">
            <i class="fa-brands fa-instagram"></i>
            <span>Instagram</span>
          </div>
          <div class="shareIn twitter">
            <i class="fa-brands fa-twitter"></i>
            <span>Twitter</span>
          </div>
        </div>

        <div class="imageNewsContainer">
          <img src="<?= $data['image_news'] ?>" alt="">
        </div>

        <div class="imageDescription">
          <p><span> <?= $data['description_image_news'] ?></span> @ fotografado por: <span>
              <?= $data['photography_news'] ?></span></p>
        </div>

        <div class="newsDescription">
          <p>
            <?= $data['description_news'] ?>
          </p>
        </div>

        <div class="epigraph">
          <i class="fa-solid fa-quote-left"></i>

          <p>
            <?= $data['epigraph_news'] ?>
          </p>

          <h4>- <?= $data['author_epigraph_news'] ?>
          </h4>
        </div>
      </div>
      <?php endforeach ?>

      <div class="rightContainer">
        <div class="otherNotices">
          <div class="imageContainer">
            <img
              src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
              alt="">
          </div>

          <div class="categoryTItleSectionContainer">
            <h1>Convivendo com o Covid</h1>
          </div>

          <div class="noticeInEmphasis">
            <div class="notice">
              <div class="imageContainer">
                <img
                  src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                  alt="">
              </div>

              <div class="noticeContent">
                <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                <div class="noticeInfo">
                  <p>Por <strong>Rafael Pilartes</strong> - <span>14 de Janeiro de 2022</span></p>
                  <p><i class="fa-regular fa-comment-dots"></i> 3</p>
                </div>

                <p>Para entender o novo smartwatch e outros dispositivos profissionais de foco recente, devemos
                  olhar
                  para
                  o Vale do Silício e o…</p>
              </div>
            </div>
          </div>
          <br>
          <br>
          <div class="noticeResume">
            <div class="notice">
              <div class="imageContainer">
                <img
                  src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                  alt="">
              </div>

              <div class="noticeContent">
                <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                <div class="noticeInfo">
                  <p>14 de Janeiro de 2022</p>
                </div>

              </div>
            </div>
            <br>
            <div class="notice">
              <div class="imageContainer">
                <img
                  src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                  alt="">
              </div>

              <div class="noticeContent">
                <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                <div class="noticeInfo">
                  <p>14 de Janeiro de 2022</p>
                </div>

              </div>
            </div>
            <br>
            <div class="notice">
              <div class="imageContainer">
                <img
                  src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                  alt="">
              </div>

              <div class="noticeContent">
                <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                <div class="noticeInfo">
                  <p>14 de Janeiro de 2022</p>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</main>