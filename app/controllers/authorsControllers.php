<?php

include_once('../db/config.php');

if (isset($_POST['create_author'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/news'> Voltar </a>";

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

  $name_author = $_POST['name_author'];
  $title_author = $_POST['title_author'];
  $description_author = $_POST['description_author'];
  $date_create = $completeDate;
  $date_update =  $completeDate;

  if (empty(trim($name_author))) {
    $password_err = "O nome da autor é obrigatório.";
    echo "<script>
              alert('O nome da autor é obrigatório!');
              window.location.href='https://tvone.ao/dashboard/authors';
            </script>";
    exit();
  }

  $sql = $pdo->prepare("INSERT INTO author values(null,?,?,?,?,?)");

  if ($sql->execute(array($name_author, $title_author, $description_author, $date_create, $date_update))) {
    header('Location: https://tvone.ao//authors');
  } else {
    header('Location: https://tvone.ao//');
  };
};

if (isset($_POST['delete_author'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/news'> Voltar </a>";

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM author WHERE id=?");

  if ($sql->execute(array($id))) {
    header('Location: https://tvone.ao/authors');
  } else {
    header('Location: https://tvone.ao/authors');
  };
};

if (isset($_POST['update_author'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/news'> Voltar </a>";

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

  $name_author = $_POST['name_author'];
  $title_author = $_POST['title_author'];
  $description_author = $_POST['description_author'];
  $date_update = $completeDate;
  $id = $_POST['id'];

  if (empty(trim($name_author))) {
    $password_err = "O nome da autor é obrigatório.";
    echo "<script>
              alert('O nome da autor é obrigatório!');
              window.location.href='https://tvone.ao/dashboard/authors';
            </script>";
    exit();
  }

  $sql = $pdo->prepare("UPDATE author SET name_author=?, title_author=?,  description_author=?, date_update=? WHERE id=?");

  if ($sql->execute(array($name_author, $title_author, $description_author, $date_update, $id))) {
    header('Location: https://tvone.ao/dashboard/authors');
  } else {
    header('Location: https://tvone.ao/ops/nn');
  };
};