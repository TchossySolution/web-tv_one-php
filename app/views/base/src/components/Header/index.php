  <link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/components/Header/styles.css") ?>">

  <header id="header">
    <div class="headerPrimary">

      <div class="logoHeaderContainer">
        <a href="<?= urlProject() ?>">
          <img src="<?= urlProject(FOLDER_BASE . BASE_IMG . "/TvOne.png") ?>" alt="">
        </a>
      </div>

      <div class="loginContainer">
        <button class="buttonRegister">
          <i class="fa-regular fa-circle-user"></i>
          Conectar-se
        </button>
      </div>
    </div>

    <div class="headerSecondary">
      <div class="dateContainer">
        <p>
          <?php
          $data = date('D');
          $mes = date('M');
          $dia = date('d');
          $ano = date('Y');

          $semana = array(
            'Sun' => 'Domingo',
            'Mon' => 'Segunda-Feira',
            'Tue' => 'Terca-Feira',
            'Wed' => 'Quarta-Feira',
            'Thu' => 'Quinta-Feira',
            'Fri' => 'Sexta-Feira',
            'Sat' => 'Sábado'
          );

          $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
          );

          $completeDate =  $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";

          echo $completeDate;
          ?>
        </p>
      </div>

      <nav class="navContainer">
        <ul>
          <li>
            <a href="<?= urlProject() ?>">TV ONE</a>
          </li>
          <li>
            <a href="<?= urlProject("news/1") ?>">Entretimento</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Economia/1") ?>">Notícias</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Internacional/1") ?>">Lifestyle</a>
          </li>
          <a href="<?= urlProject("news/search/category/Política/1") ?>">Desporto</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Actualidade/1") ?>">Globo</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Desporto/1") ?>">Videos</a>
          </li>
          <li>
            <a href="<?= urlProject("contacts") ?>">Contacto</a>
          </li>
        </ul>
      </nav>

      <div class="searchAndDarkContainer">
        <div class="socialMediaContainer">
          <button class="buttonSocialMedia">
            <i class="fa-brands fa-facebook-f"></i>
          </button>

          <button class="buttonSocialMedia">
            <a href="https://www.instagram.com/jornalpungoandongo/">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </button>

          <button class="buttonSocialMedia">
            <i class="fa-brands fa-twitter"></i>
          </button>
        </div>

        <button style="opacity: 0;">
          <i class="fa-solid fa-sun"></i>
        </button>
        <button class="iconMenu" id="menu-btn">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </div>
  </header>