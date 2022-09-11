<?php $this->layout('_theme') ?>

<?php
require 'src/db/config.php';

$id;

// Publicidades
$publiciteis_1_3 = $pdo->prepare("SELECT * FROM publicity ORDER BY id DESC limit 0, 3 ");
$publiciteis_1_3->execute();
$publiciteis_4_6 = $pdo->prepare("SELECT * FROM publicity ORDER BY id DESC limit 3, 4 ");
$publiciteis_4_6->execute();

// Mais noticias sessão 1
$rightNews1 = $pdo->prepare("SELECT * FROM news WHERE category_id = ? ORDER BY id DESC limit 0, 1 ");
$rightNews1->execute(array(rand(1, 13)));
$rightNewsList1 = $pdo->prepare("SELECT * FROM news WHERE category_id = ? ORDER BY id DESC limit 1, 4 ");
$rightNewsList1->execute(array(rand(1, 13)));

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

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/detailsNewsStyle
.css") ?>">

<main class="detailsNewsContainer">
  <div class="container">
    <div class="indicateContainer">
      <a href="<?= urlProject() ?>"> Home </a>
      <span> » </span>
      <a href="<?= urlProject("news/search/category/$categoria/1") ?>"> <?= $categoria  ?> </a>
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

        <h1 itemprop="headline"><?= $data['title_news'] ?></h1>

        <p>
          <?= $data['resume_news'] ?>
        </p>

        <div class="infoNews">
          <div>
            <div class="imageContainer">
              <img src="https://argumentumpericias.com.br/biblioteca/2019/09/sem-imagem-avatar.png" alt="">
            </div>
            Por
            <a href="<?= urlProject("news/search/author/$author_name/1") ?>">
              <strong>
                <?= $author_name ?>
              </strong>
            </a>
          </div>

          <p>
            - <span><i class="fa-regular fa-calendar-days"></i> <?= $data['date_create'] ?></span>
            - <span><i class="fa-regular fa-calendar-days"></i> Atualizado: <?= $data['date_update'] ?></span>
          </p>

          <div>
            <i class="fa-regular fa-clock"></i> <span>2</span> minutos de leitura
          </div>

        </div>

        <div class="imageNewsContainer">
          <img src="<?= $data['image_news'] ?>" alt="cover">
        </div>

        <div class="imageDescription">
          <p><span> <?= $data['description_image_news'] ?></span> @ fotografado por: <span>
              <?= $data['photography_news'] ?></span></p>
        </div>


        <div class="shareContainer">
          <a href="http://www.facebook.com/sharer.php?u=<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>"
            target="_blank">
            <div class="shareIn facebook">
              <img src="<?= $data['image_news'] ?>" hidden />
              <i class="fa-brands fa-facebook-f"></i>
              <span>Facebook</span>
            </div>
          </a>

          <a
            href="mailto:?Subject=<?= "Está sendo convidado para ler a noticia: " .  $data['title_news']  ?>&Body=Para saber mais sobre a noticia acesse: <?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
            <div class="shareIn instagram">
              <img src="<?= $data['image_news'] ?>" hidden />
              <i class="fa-solid fa-envelope"></i>
              <span>E-mail</span>
            </div>
          </a>

          <a href="https://twitter.com/share?url=<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>&amp;text=<?= $data['title_news']  ?>. Acesse: &amp;hashtags=tvone.ao"
            target="_blank">
            <div class="shareIn twitter">
              <img src="http://www.onlinecode.org/example/images/twitter.png" hidden />
              <i class="fa-brands fa-twitter"></i>
              <span>Twitter</span>
            </div>
          </a>
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

        <section class="swiper mySwiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($publiciteis_1_3 as $data) : ?>
            <div class="swiper-slide">
              <section class="slide" id="slide">
                <section class="publicity">
                  <div class='containerImage'>
                    <img src=" <?= $data['image_publicity'] ?>" alt="">
                  </div>
                </section>
              </section>
            </div>
            <?php endforeach ?>
          </div>

        </section>

      </div>
      <?php endforeach ?>

      <div class="rightContainer">
        <div class="otherNotices">
          <section class="mySwiper swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <?php foreach ($publiciteis_4_6 as $data) : ?>
              <div class="swiper-slide">
                <section class="slide" id="slide">
                  <section class="publicity">
                    <div class='containerImage'>
                      <img src=" <?= $data['image_publicity'] ?>" alt="">
                    </div>
                  </section>
                </section>
              </div>
              <?php endforeach ?>
            </div>

          </section>

          <br>
          <br>

          <div class="categoryTItleSectionContainer">
            <h1>Outras noticias</h1>
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
            <?php endforeach ?>

          </div>

        </div>
      </div>

    </div>

  </div>
</main>