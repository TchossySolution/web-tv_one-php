<?php $this->layout('_theme') ?>

<?php
require 'src/db/config.php';
session_start();

$id;
$user_id = '';
$user_email = '';

if (!empty($_SESSION['user_email'])) {
  $user_email = $_SESSION['user_email'];
}

$user = $pdo->prepare("SELECT * FROM users where user_email=? ");
$user->execute(array($user_email));

foreach ($user as $data) :
  $user_id = $data['id'];
endforeach;


// Publicidades
$publiciteis_1 = $pdo->prepare("SELECT * FROM publicity WHERE publicity_local = ? ORDER BY id DESC limit 0, 6 ");
$publiciteis_1->execute(array('Pag. detalhes da noticia -> 1ª Pub fina'));

$publiciteis_2 = $pdo->prepare("SELECT * FROM publicity WHERE publicity_local = ? ORDER BY id DESC limit 0, 6 ");
$publiciteis_2->execute(array('Pag. detalhes da noticia -> 2ª Pub fina'));

$publiciteis_square = $pdo->prepare("SELECT * FROM publicity WHERE publicity_local = ? ORDER BY id DESC limit 0, 6 ");
$publiciteis_square->execute(array('Pag. detalhes da noticia -> Pub quadrada'));

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
$image;
$total_views = 0;

$news1 = $pdo->prepare("SELECT * FROM news where id=$id ");
$news1->execute();

foreach ($news1 as $data) :
  $category_id = $data['category_id'];
  $title = $data['title_news'];
  $image = $data['image_news'];
  $total_views = $data['views_news'] + 1;

  $get_category = $pdo->prepare("SELECT * FROM categories where id=$category_id");
  $get_category->execute();

  foreach ($get_category as $category) :
    $categoria = $category['name_category'];
  endforeach;
endforeach;


$news = $pdo->prepare("SELECT * FROM news where id=$id ");
$news->execute();

$allComments = $pdo->prepare("SELECT * FROM comments where news_id=? and is_approved='Aprovado' ORDER BY id DESC ");
$allComments->execute(array($id));

$see_views_news = $pdo->prepare("UPDATE news SET views_news=? WHERE id=?");
$see_views_news->execute(array($total_views, $id))
?>

<head>
  <meta property="og:title" content="<?= $title ?>">
  <meta property="og:site_name" content="<?= SITE ?>">
  <meta property="article:tag" content="<?= $categoria ?>">
  <meta property="og:image" content="<?= $image ?>">
  <meta property="og:image:secure_url" content="<?= $image ?>">
  <link rel="image_src" type="image/jpeg" href="<?= $image ?>" />
</head>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/detailsNewsStyled.css") ?>">

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

        <section class="swiper mySwiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <section class="slide" id="slide">
                <section class="publicity" style="width: 100%;">
                  <div class="container">
                    <div class='containerImage' style="width: 100%; height: 130px;">
                      <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/COMENTARIOS2.jpg") ?>" alt="">
                    </div>
                  </div>
                </section>
              </section>
            </div>
            <?php foreach ($publiciteis_1 as $data_publiciteis) { ?>
            <div class="swiper-slide">
              <section class="slide" id="slide">
                <section class="publicity" style="width: 100%;">
                  <div class='containerImage' style="width: 100%; height: 130px;">
                    <img src=" <?= $data_publiciteis['image_publicity'] ?>" alt="">
                  </div>
                </section>
              </section>
            </div>
            <?php } ?>
          </div>
        </section>


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
            <div class="swiper-slide">
              <section class="slide" id="slide">
                <section class="publicity" style="width: 100%;">
                  <div class="container">
                    <div class='containerImage' style="width: 100%; height: 130px;">
                      <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/COMENTARIOS.jpg") ?>" alt="">
                    </div>
                  </div>
                </section>
              </section>
            </div>
            <?php foreach ($publiciteis_2 as $data) : ?>
            <div class="swiper-slide">
              <section class="slide" id="slide">
                <section class="publicity" style="width: 100%;">
                  <div class='containerImage' style="width: 100%; height: 130px;">
                    <img width="100%" height="100%" src=" <?= $data['image_publicity'] ?>" alt="">
                  </div>
                </section>
              </section>
            </div>
            <?php endforeach ?>
          </div>
        </section>

        <div class="comments-container">
          <form class="row g-3 needs-validation" novalidate method="post"
            action="<?= urlProject(CONTROLLERS . "/commentaryControllers.php") ?>">
            <h3><i class="fa-solid fa-comment-dots" style="color: blue; font-size: 1.4rem; "></i>
              <?= $allComments->rowCount() ?> Comentários</h3>

            <?php if ((isset($_SESSION['isUser']) == "isUser")) { ?>
            <br>
            <br>
            <textarea name="comment">Deixe o seu comentário...</textarea>
            <br>

            <input style="display: none;" type="txt" name="user_id" value="<?= $user_id ?>">
            <input style="display: none;" type="txt" name="news_id" value="<?= $id ?>">
            <input style="display: none;" type="txt" name="is_approved" value="Pendente">
            <button type="submit" name="send_comments" class="button-send-comment">
              Envia comentário
            </button>
            <br>
            <br>
            <?php } else { ?>
            <br>
            <div class="loginContainer">
              <p>Faça login para introduzir o seu comentário.</p>
              <a href="<?= urlProject("login") ?>">
                <button type="button" class="buttonLogin">
                  Conectar-se
                </button>
              </a>
            </div>
            <?php } ?>
          </form>


          <ul id="comments-list" class="comments-list">

            <?php
              foreach ($allComments as $data) :

                $data_comment = $data['date_create'];
                $text_comment = $data['comment'];

                $user_comment_id = $data['user_id'];
                $user_name = '';
                $user_avatar = '';

                $get_user_comment = $pdo->prepare("SELECT * FROM users where id=$user_comment_id");
                $get_user_comment->execute();

                foreach ($get_user_comment as $author) :
                  $user_name = $author['user_name'];
                  $user_avatar = $author['user_photo_profile'];
                endforeach;
              ?>
            <li>
              <div class="comment-main-level">
                <!-- Avatar -->
                <div class="comment-avatar">
                  <img src="<?= $user_avatar ?>" alt="" />
                </div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                  <div class="comment-head">
                    <h6 class="comment-name by-author">
                      <a href="#"> <?= $user_name ?> </a>
                    </h6>
                    <span class="posted-time"> <?= $data_comment ?> </span>
                  </div>
                  <div class="comment-content">
                    <?= $text_comment ?>

                  </div>

                </div>
              </div>
            </li> <?php endforeach ?>

          </ul>


        </div>
      </div>
      <?php endforeach ?>

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

                  <div class="noticeInfo">
                    <p>
                      <?= $data['resume_news'] ?>
                    </p>

                  </div>

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

            <br>
            <br>
            <?php endforeach ?>

          </div>

        </div>
      </div>

    </div>

  </div>
</main>