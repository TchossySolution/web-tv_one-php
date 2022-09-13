<?php

include_once('../db/config.php');

if (isset($_POST['create_category'])) {

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

  $name_category = $_POST['name_category'];
  $date_create = $completeDate;
  $date_update =  $completeDate;

  if (empty(trim($name_category))) {
    $password_err = "O nome da categoria é obrigatório.";
    echo "<script>
              alert('O nome da categoria é obrigatório!');
              window.location.href='https://tvone.ao/dashboard/categories';
            </script>";
    exit();
  }

  $sql = $pdo->prepare("INSERT INTO categories values(null,?,?,?)");

  if ($sql->execute(array($name_category, $date_create, $date_update))) {
    header('Location: https://tvone.ao/dashboard/categories');
  } else {
    header('Location: https://tvone.ao/ops/nn');
  };
};

if (isset($_POST['delete_category'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/news'> Voltar </a>";

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM categories WHERE id=?");

  if ($sql->execute(array($id))) {
    header('Location: https://tvone.ao/dashboard/categories');
  } else {
    header('Location: https://tvone.ao/ops/nn');
  };
};

if (isset($_POST['update_category'])) {

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

  $name_category = $_POST['name_category'];
  $date_update = $completeDate;
  $id = $_POST['id'];

  if (empty(trim($name_category))) {
    $password_err = "O nome da categoria é obrigatório.";
    echo "<script>
              alert('O nome da categoria é obrigatório!');
              window.location.href='https://tvone.ao/dashboard/categories';
            </script>";
    exit();
  }

  $sql = $pdo->prepare("UPDATE categories SET name_category=?, date_update=? WHERE id=?");

  if ($sql->execute(array($name_category, $date_update, $id))) {
    header('Location: https://tvone.ao/dashboard/categories');
  } else {
    header('Location: https://tvone.ao/ops/nn');
  };
};