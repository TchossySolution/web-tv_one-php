<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/components/Footer/styles.css") ?>">

<footer id="footer">
  <div class="footerTop">
    <div class="container">
      <div class="about">
        <div>
          <h3 class="footerTitle">Sobre a TvOne</h3>

          <img width="220px" height="70px" src="<?= urlProject(FOLDER_BASE . BASE_IMG . "/tvone1.png") ?>">

        </div>

        <p>A nossa missão é levar as pessoas todas novidades relacionadas ao entretenimento e informações verídicas de
          factos reais e a originalidade dos nossos conteúdos.
        </p>

        <p>A nossa TV é um lugar onde tudo acontece, liga-te nesta<b> onda.</b></p>

        <div>
          <p>Envie-nos um e-mail: <span>geral@tvone.com</span></p>
          <p>Contato: <span>+244 934 292 121</span></p>
        </div>
      </div>

      <div class="choose">
        <h3 class="footerTitle">Noticias recorrentes</h3>


        <?php foreach ($footerNewsList1 as $data) :
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
              <img src="<?= $data['image_news']; ?>" alt="">
            </div>

            <div class="noticeContent">
              <p><?= $author_name; ?></p>

              <span><?= $data['date_create']; ?></span>
            </div>
          </div>
        </a>
        <?php endforeach ?>

      </div>

      <div class="comment">
        <h3 class="footerTitle">Novos comentários</h3>

        <?php foreach ($footerNewsList2 as $data) :
          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
          $get_author->execute();

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;
        ?>
        <div class="commentary">
          <div class="commentaryContent">
            <span> <?= $author_name ?> </span>

            <p> <?= $data['resume_news'] ?> </p>
          </div>
        </div>
        <?php endforeach ?>

      </div>


    </div>
  </div>

  <div class="footerBottom">
    <div class="container">
      <div class="socialMediaContainer">
        <button class="buttonSocialMedia">
          <a href="https://www.facebook.com/TV.One.canal.de.TV/">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
        </button>

        <button class="buttonSocialMedia">
          <a href="https://www.instagram.com/tvone.ao/">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </button>

        <button class="buttonSocialMedia">
          <a href="https://twitter.com/TVoneao/">
            <i class="fa-brands fa-twitter"></i>
          </a>
        </button>

        <button class="buttonSocialMedia">
          <a href="https://www.youtube.com/channel/UCzx544Egz4y_jQ7ggtdbDKw/">
            <i class="fa-brands fa-youtube"></i>
          </a>
        </button>
      </div>

      <div class="linkContainer">
        <ul>
          <li>
            <a href="<?= urlProject() ?>">Casa</a>
          </li>
          <li>
            <a href="<?= urlProject("news/1") ?>">Notícias</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Entretenimento/1") ?>">Entretenimento</a>
          </li>

          <li>
            <a href="<?= urlProject("news/search/category/Desporto/1") ?>">Desporto</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Globo/1") ?>">Globo</a>
          </li>
          <li>
            <a href="<?= urlProject("contacts") ?>">Contacto</a>
          </li>
        </ul>
      </div>

      <div class="copyrightContainer">
        <p>
          ©Todos direitos reservados 2022. Projetado por <span> Tchossy Solution.</span>
        </p>
      </div>
    </div>
  </div>
</footer>