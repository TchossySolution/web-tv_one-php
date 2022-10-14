<?php $this->layout('_theme') ?>

<?php

$status = 1;

//conexao da base de dados//
require 'src/db/config.php';
session_start();

$allNews = $pdo->prepare("SELECT * FROM news ");
$allNews->execute();

$publiciteis_3_6 = $pdo->prepare("SELECT * FROM publicity WHERE publicity_local = ? ORDER BY id DESC limit 0, 6 ");
$publiciteis_3_6->execute(array('Pag. Inicial -> 1ª Pub fina'));

// Escolhas dos editores
$choose_editors = $pdo->prepare("SELECT * FROM news where choose_editors_news='sim' ORDER BY id DESC limit 0, 4 ");
$choose_editors->execute();

// Noticias em destaque
$emphasis_news1 = $pdo->prepare("SELECT * FROM news where emphasis_news='sim' ORDER BY id DESC limit 0, 1 ");
$emphasis_news1->execute();
$emphasis_newsList = $pdo->prepare("SELECT * FROM news where emphasis_news='sim' ORDER BY id DESC limit 1, 2 ");
$emphasis_newsList->execute();

// Ultimas Noticias
$lastNews = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 0, 4 ");
$lastNews->execute();

// Mais noticias sessão 1
$moreNews1 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 5, 1 ");
$moreNews1->execute();
$moreNewsList1 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 6, 5 ");
$moreNewsList1->execute();

// Mais noticias sessão 2
$moreNews2 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 10, 1 ");
$moreNews2->execute();
$moreNewsList2 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 11, 4 ");
$moreNewsList2->execute();

// Noticias Relevantes
$relevant_news = $pdo->prepare("SELECT * FROM news where relevant_news='sim' ORDER BY id DESC limit 0, 4 ");
$relevant_news->execute();

// Mais noticias sessão 1
$rightNews1 = $pdo->prepare("SELECT * FROM news WHERE category_id = '4' ORDER BY id DESC limit 0, 1 ");
$rightNews1->execute();
$rightNewsList1 = $pdo->prepare("SELECT * FROM news ORDER BY RAND() DESC limit 1, 4 ");
$rightNewsList1->execute();

// Mais noticias sessão 2
$rightNewsList2 = $pdo->prepare("SELECT * FROM news WHERE category_id = '3' ORDER BY id DESC limit 0, 3 ");
$rightNewsList2->execute();

// Mais noticias sessão 3
$rightNews3 = $pdo->prepare("SELECT * FROM news WHERE category_id = '6' ORDER BY id DESC limit 0, 1 ");
$rightNews3->execute();
$rightNewsList3 = $pdo->prepare("SELECT * FROM news WHERE category_id = '6' ORDER BY id DESC limit 1, 4 ");
$rightNewsList3->execute();


// Video
$videoInit = $pdo->prepare("SELECT * FROM videos_news ORDER BY id DESC limit 0, 1 ");
$videoInit->execute();
$video_list = $pdo->prepare("SELECT * FROM videos_news ORDER BY id DESC ");
$video_list->execute();

$bau = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 17, 4 ");
$bau->execute();

$publiciteis_7_10 = $pdo->prepare("SELECT * FROM publicity WHERE publicity_local = ? ORDER BY id DESC limit 0, 6 ");
$publiciteis_7_10->execute(array('Pag. Inicial -> 2ª Pub fina'));

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/homeStyled.css") ?>">

<main class="homeContainer">


  <section class="choosesEditors">
    <div class="container">
      <div class="choosesContainer">
        <?php
        foreach ($choose_editors as $data) :


          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=?");
          $get_author->execute(array($author_id));

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;
        ?>
        <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
          <div class="choose">
            <div class='containerImage'>
              <img src="<?= $data['image_news'] ?>" alt="">
            </div>

            <div class="textContainer">
              <p><?= $data['title_news'] ?></p>
              <span> <i class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span>
            </div>
          </div>
        </a>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <section class="emphasesNotice">
    <div class="container">
      <div class="titleSectionContainer">
        <h1> <span>Em Destaque</span> </h1>
      </div>

      <div class="emphasesNoticeAllContainer">
        <?php

        foreach ($emphasis_news1 as $data) :
          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
          $get_author->execute();

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;

        ?>
        <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
          <div class="emphases">
            <div class="imageContainer">
              <img src=" <?= $data['image_news'] ?> " alt="">
            </div>

            <div class="noticeContent">
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <h1> <?= $data['title_news'] ?> </h1>

                <div class="noticeInfo">
                  <p><i class="fa-solid fa-user"></i> <strong> <?= $author_name ?> </strong> - <span> <i
                        class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?> </span></p>

                </div>
              </a>
            </div>
          </div>
        </a>
        <?php endforeach ?>

        <div class="otherEmphases">
          <?php
          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
          $get_author->execute();

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;

          foreach ($emphasis_newsList as $data) :

          ?>
          <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
            <div class="notice">
              <div class="imageContainer">
                <img src="<?= $data['image_news'] ?>" alt="">
              </div>

              <div class="noticeContent">
                <h1><?= $data['title_news'] ?></h1>

                <div class="noticeInfo">
                  <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                        class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                </div>

              </div>
            </div>
          </a>
          <?php endforeach ?>
        </div>

      </div>
    </div>
  </section>

  <section class="lastNotices">
    <div class="container">
      <div class="lastNoticesAllContainer">

        <div class="lastNoticesContainer">
          <div class="titleSectionContainer">
            <h1>Ultimas <span>Noticias</span> </h1>
          </div>

          <?php
          foreach ($lastNews as $data) :

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
                  <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                        class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                </div>

                <p><?= $data['resume_news'] ?></p>
              </div>
            </div>
          </a>
          <?php endforeach ?>
        </div>

        <div class="otherNotices">
          <div class="categoryTItleSectionContainer">
            <h1>Destaques</h1>
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
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <?php endforeach ?>
          </div>

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
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <?php endforeach ?>

          </div>

        </div>

      </div>
    </div>
  </section>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <section class="moreNotices">
    <div class="container">
      <div class="moreNoticesAllContainer">

        <div class="moreNoticesContainer">
          <div class="titleSectionContainer">
            <h1>Mais <span>Noticias</span> </h1>
          </div>

          <div class="contentMoreNotice">
            <?php
            $author_id = $data['author_id'];
            $author_name;

            $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
            $get_author->execute();

            foreach ($get_author as $author) :
              $author_name = $author['name_author'];
            endforeach;

            foreach ($moreNews1 as $data) :
            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                          class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                  </div>

                  <p><?= $data['resume_news'] ?></p>
                </div>
              </div>
            </a>
            <?php endforeach ?>

            <div class="noticeResume">
              <?php
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

              foreach ($moreNewsList2 as $data) :
              ?>
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <div class="notice">
                  <div class="imageContainer">
                    <img src="<?= $data['image_news'] ?>" alt="">
                  </div>
                  <div class="noticeContent">
                    <h1><?= $data['title_news'] ?></h1>

                    <div class="noticeInfo">
                      <p><?= $data['resume_news'] ?></p>
                    </div>
                    <div class="noticeInfo">
                      <p><i class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></p>
                    </div>


                  </div>
                </div>
              </a>
              <?php endforeach ?>

            </div>
          </div>

          <br>
          <br>

          <div class="contentMoreNotice">
            <?php
            $author_id = $data['author_id'];
            $author_name;

            $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
            $get_author->execute();

            foreach ($get_author as $author) :
              $author_name = $author['name_author'];
            endforeach;

            foreach ($moreNews2 as $data) :
            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                          class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                  </div>

                  <p><?= $data['resume_news'] ?></p>
                </div>
              </div>
            </a>
            <?php endforeach ?>

            <div class="noticeResume">
              <?php
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

              foreach ($moreNewsList1 as $data) :
              ?>
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <div class="notice">
                  <div class="imageContainer">
                    <img src="<?= $data['image_news'] ?>" alt="">
                  </div>
                  <div class="noticeContent">
                    <h1><?= $data['title_news'] ?></h1>

                    <div class="noticeInfo">
                      <p><?= $data['resume_news'] ?></p>
                    </div>
                    <div class="noticeInfo">
                      <p><i class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></p>
                    </div>


                  </div>
                </div>
              </a>
              <?php endforeach ?>

            </div>
          </div>
        </div>

        <div class="otherNotices">
          <div class="categoryTItleSectionContainer">
            <h1>Economia </h1>
          </div>

          <div class="noticeInEmphasis">
            <?php
            foreach ($rightNewsList2 as $data) :
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
                  <strong> <?= $data['id'] ?> </strong>

                  <div class="noticeContent_left">
                    <h1><?= $data['title_news'] ?></h1>

                    <div class="noticeInfo">
                      <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> -
                        <span><?= $data['date_create'] ?></span>
                      </p>

                    </div>
                  </div>

                </div>
              </div>
            </a>
            <?php endforeach ?>

          </div>
        </div>

      </div>
    </div>
  </section>

  <br>
  <br>
  <br>

  <section class="publicitySwiper">
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage' style="width: 100%; height: 9rem;">
                <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/publicidade_estreito.jpg") ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage' style="width: 100%; height: 9rem;">
                <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/publicidade_seguro.jpg") ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>

      <?php foreach ($publiciteis_3_6 as $data) : ?>
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage' style="width: 100%; height: 9rem;">
                <img src=" <?= $data['image_publicity'] ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <?php endforeach ?>
    </div>
  </section>

  <br>
  <br>
  <br>

  <section class="noticesRelevant">
    <div class="container">
      <div class="noticesRelevantAllContainer">

        <div class="noticesRelevantContainer">
          <div class="titleSectionContainer">
            <h1>Noticias <span>Relevantes</span> </h1>
          </div>

          <div class="allNotices">
            <?php

            foreach ($relevant_news as $data) :

              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=?");
              $get_author->execute(array($author_id));

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
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                          class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                  </div>

                  <p> <?= $data['resume_news'] ?></p>
                </div>
              </div>
            </a>
            <?php endforeach ?>
          </div>

        </div>

        <div class="otherNotices">
          <div class="categoryTItleSectionContainer">
            <h1>Convivendo com o Covid</h1>
          </div>

          <div class="noticeInEmphasis">
            <?php
            foreach ($rightNews3 as $data) :
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

          <div class="noticeResume">
            <?php
            foreach ($rightNewsList3 as $data) :
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

          <form method="post" action="<?= urlProject(CONTROLLERS . "/newslettersControllers.php") ?>" class="subscribe">
            <h1>Deixe o seu email</h1>

            <p>
              E receba notificações com as ultimas atualizações da Tv One.
            </p>

            <div class="inputContainer">
              <input type="text" name="email" placeholder="Seu endereço de email">
              <button type="submit" name="send_email">Se inscrever</button>
            </div>

            <div class="checkContainer">
              <p>
                <input type="checkbox" name="" id="">
                Ao se inscrever, você concorda com nossos termos e nosso acordo de
                Política de Privacidade .
                </a>
              </p>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>

  <section class="videosList">
    <div class="container">
      <div class="titleSectionContainer">
        <h1> <span>Videos</span> </h1>
      </div>
      <br>
      <br>

      <div class="allContainer">
        <?php
        foreach ($videoInit as $data) :
          $videoURL = $data['link_video'];
          $convertedURL = str_replace("watch?v=", "embed/", $videoURL);
        ?>
        <iframe id="video" class="embed-responsive-item videoPlay" src="<?= $convertedURL; ?>?playsinline=1&rel=0"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
        <?php endforeach ?>


        <ul id="playlist" style="list-style: none;">
          <?php
          foreach ($video_list as $data) :
          ?>
          <li>
            <a href="<?= $data['link_video']; ?>">
              <div class='containerImage'>
                <img src="<?= $data['cover_video'] ?>" alt="">
              </div>
              <div class="infoContainer">
                <h4><?= $data['title_video'] ?></h4>
                <p><?= $data['time_video'] ?> <br> <span><?= $data['date_create'] ?></span> </p>
              </div>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
  </section>

  <br>
  <br>
  <br>

  <section class="publicitySwiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage' style="width: 100%; height: 9rem;">
                <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/publicidade_estreito.jpg") ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage' style="width: 100%; height: 16rem;">
                <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/publicidade_unitel.jpg") ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>

      <?php foreach ($publiciteis_7_10 as $data) : ?>
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage' style="width: 100%; height: 9rem;">
                <img src=" <?= $data['image_publicity'] ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <?php endforeach ?>
    </div>

  </section>

  <br>
  <br>
  <br>

  <section class="choosesEditors">
    <div class="container">
      <div class="titleSectionContainer">
        <h1> <span>Baú</span> </h1>
      </div>

      <div class="choosesContainer">
        <?php
        foreach ($bau as $data) :


          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=?");
          $get_author->execute(array($author_id));

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;
        ?>
        <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
          <div class="choose">
            <div class='containerImage'>
              <img src="<?= $data['image_news'] ?>" alt="">
            </div>

            <div class="textContainer">
              <p><?= $data['title_news'] ?></p>
              <span> <i class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span>
            </div>
          </div>
        </a>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <br>
  <br>
  <br>
  <br>
  <br>
</main>

<script type="text/javascript">
var corrente = 0;
var video = $("#video");
var playlist = $("#playlist");
var tracks = playlist.find("li a");
var len = tracks.length - 1;

var playlist = $("#playlist");
var tracks = playlist.find("li a");

playlist.find("a").click(function(e) {
  e.preventDefault();

  link = $(this);
  corrente = link.parent().index();
  run(link, video[0])

})

video[0].addEventListener("ended", function(e) {
  corrente++;
  if (corrente = len) {
    corrente = 0;
    link = playlist.find("a")[0];
  } else {
    link = playlist.find("a")[corrente]
  }
  run($(link), video[0])

})

function run(link, player) {
  let getURL = link.attr("href");
  let newURL = getURL.replace("watch?v=", "embed/");
  $('iframe').attr("src", newURL)

  par = link.parent();
  par.addClass("active").siblings().removeClass("active");
  player.load();
  player.play();
}
</script>

<script type="text/javascript" src="<?= urlProject(FOLDER_BASE . BASE_JS . "/homeScripts.js") ?>">
</script>