<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$authorName = $authorData['author_name'];
$authorId = '0';
$titleAuthor = ' ';
$descriptionAuthor = ' ';


$allAuthor = $pdo->prepare("SELECT * FROM author WHERE name_author = ?");
$allAuthor->execute(array($authorName));

foreach ($allAuthor as $author) :
  $authorId = $author['id'];
  $titleAuthor = $author['title_author'];
  $descriptionAuthor = $author['description_author'];
endforeach;

$allNews = $pdo->prepare("SELECT * FROM news WHERE author_id = ?");
$allNews->execute(array($authorId));

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/authorStyle.css") ?>">

<main class="authorContainer">
  <div class="container">

    <div class="indicateContainer">
      <a href=""> Home </a>
      <span> » </span>
      <a href=""> Notícias </a>
      <span> » </span>
      <a href=""> Autor </a>
      <span> » </span>
      <a href=""> <?= $authorName ?> </a>
      <span> » </span>
      <a href=""> página <span>1</span> </a>
    </div>

    <div class="searchForContainer">
      <p>
        Publicações do autor:
      </p>
      <strong>
        <?= $authorName ?>
      </strong>
    </div>
  </div>

  <div class="authorInfoContainer">
    <img src="<?= URL_BASE . FOLDER_BASE . BASE_IMG . "/author_bg.jpg" ?>" alt="">
    <div class="shadow"></div>
    <div class="container">
      <div class="authorContainerLeft">
        <div class="imageContainer">
          <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png" alt="">
        </div>

        <div class="infoAuthor">
          <h1><?= $authorName ?> </h1>
          <h3><?= $titleAuthor ?></h3>
          <p>
            <?= $descriptionAuthor ?>
          </p>
        </div>
      </div>

      <div class="authorContainerRight">
        <button class="buttonSocialMedia">
          <i class="fa-brands fa-facebook-f"></i>
        </button>

        <button class="buttonSocialMedia">
          <i class="fa-brands fa-instagram"></i>
        </button>

        <button class="buttonSocialMedia">
          <i class="fa-brands fa-twitter"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="containerAllContent">
      <div class="containerLeft">
        <div class="allNotices">
          <?php foreach ($allNews as $data) :
            $author_id = $data['author_id'];
            $author_name;

            $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
            $get_author->execute();

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
        </div>

      </div>

      <div class="rightContainer">
        <div class="otherNotices">
          <div class="imageContainer">
            <img
              src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
              alt="">
          </div>

          <div class="categoryTItleSectionContainer">
            <h1>Não perca</h1>
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