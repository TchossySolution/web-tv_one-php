<?php

include_once('../db/config.php');

if (isset($_POST['create_videos'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/videos'> Voltar </a>";

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

  $title_video = $_POST['title_video'];
  $link_video = $_POST['link_video'];
  $time_video = $_POST['time_video'];
  $cover_video = $_POST['cover_video'];
  $date_create = $completeDate;
  $date_update =  $completeDate;

  if (empty(trim($title_video))) {
    $password_err = "O titulo do video é obrigatório.";
    echo "<script>
              alert('O titulo do video é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }
  if (empty(trim($link_video))) {
    $password_err = "O video link é obrigatório.";
    echo "<script>
              alert('O video link é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }
  if (empty(trim($time_video))) {
    $password_err = "O tempo do video é obrigatório.";
    echo "<script>
              alert('O tempo do video é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }
  if (empty(trim($cover_video))) {
    $password_err = "A capa do video é obrigatório.";
    echo "<script>
              alert('A capa do video é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }

  $sql = $pdo->prepare("INSERT INTO videos_news values(null,?,?,?,?,?,?)");

  if ($sql->execute(array($title_video, $link_video, $time_video, $cover_video, $date_create, $date_update))) {
    echo "<script>
            window.location.href='http://tvone.ao/dashboard/videos';
          </script>";
  } else {
    echo "<script>
            window.location.href='http://tvone.ao/dashboard/videos';
          </script>";
  };
};

if (isset($_POST['delete_videos'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/videos'> Voltar </a>";

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM videos_news WHERE id=?");

  if ($sql->execute(array($id))) {
    echo "<script>
            window.location.href='http://tvone.ao/dashboard/videos';
          </script>";
  } else {
    echo "<script>
            window.location.href='http://tvone.ao/dashboard/videos';
          </script>";
  };
};

if (isset($_POST['update_videos'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/videos'> Voltar </a>";

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

  $title_video = $_POST['title_video'];
  $link_video = $_POST['link_video'];
  $time_video = $_POST['time_video'];
  $cover_video = $_POST['cover_video'];
  $date_create = $completeDate;
  $date_update =  $completeDate;
  $id = $_POST['id'];

  if (empty(trim($title_video))) {
    $password_err = "O titulo do video é obrigatório.";
    echo "<script>
              alert('O titulo do video é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }
  if (empty(trim($link_video))) {
    $password_err = "O video link é obrigatório.";
    echo "<script>
              alert('O video link é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }
  if (empty(trim($time_video))) {
    $password_err = "O tempo do video é obrigatório.";
    echo "<script>
              alert('O tempo do video é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }
  if (empty(trim($cover_video))) {
    $password_err = "A capa do video é obrigatório.";
    echo "<script>
              alert('A capa do video é obrigatório.');
              window.location.href='https://tvone.ao/dashboard/videos';
            </script>";
    exit();
  }

  $sql = $pdo->prepare("UPDATE videos_news SET title_video=?, link_video=?, time_video=?,  cover_video=?, date_update=? WHERE id=?");

  if ($sql->execute(array($title_video, $link_video, $time_video, $cover_video, $date_update, $id))) {
    echo "<script>
            window.location.href='http://tvone.ao/dashboard/videos';
          </script>";
  } else {
    echo "<script>
            window.location.href='http://tvone.ao/dashboard/videos';
          </script>";
  };
};