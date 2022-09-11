  <link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/components/Header/styles.css") ?>">

  <?php
  $size_max = 2097152; //2MB
  $accept  = array("jpg", "png", "jpeg");

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
  ?>

  <header id="header">
    <div class="headerPrimary">
      <div>
      </div>

      <div class="logoHeaderContainer">
        <a href="<?= urlProject() ?>">
          <h1> <?= SITE ?> Dashboard</h1>
        </a>
      </div>

      <div>
      </div>
    </div>

    <div class="headerSecondary">
      <div class="dateContainer">
        <p> <?= $completeDate ?> </p>
      </div>

      <nav class="navContainer">
        <ul>
          <li>
            <a href="<?= urlDashProject("news") ?>">Noticias</a>
          </li>
          <li>
            <a href="<?= urlDashProject("categories") ?>">Categorias</a>
          </li>
          <li>
            <a href="<?= urlDashProject("authors") ?>">Autores</a>
          </li>
          <li>
            <a href="<?= urlDashProject("publicity") ?>">Publicidade</a>
          </li>
          <li>
            <a href="<?= urlDashProject("messages") ?>">Mensagens</a>
          </li>
          <li>
            <a href="<?= urlDashProject("newsLetters") ?>">Newsletter</a>
          </li>
        </ul>
      </nav>

      <div class="searchAndDarkContainer">
        <button>
          <i class="fa-solid fa-sun"></i>
        </button>
        <button>
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>
  </header>