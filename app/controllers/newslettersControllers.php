<?php

include_once('../db/config.php');

if (isset($_POST['send_email'])) {

  echo 'send_email';

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

  $email = $_POST['email'];
  $date_create = $completeDate;

  $sql = $pdo->prepare("INSERT INTO newsletters values(null,?,?)");

  if ($sql->execute(array($email, $date_create))) {
    header('Location: http://jornalpungoandongo.ao/dashboard/newsletters');
  } else {
    header('Location: http://jornalpungoandongo.ao/ops/nn');
  };
};

if (isset($_POST['delete_newsletters'])) {
  echo 'delete_newsletters';

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM newsletters WHERE id=?");

  if ($sql->execute(array($id))) {
    header('Location: http://jornalpungoandongo.ao/dashboard/newsletters');
  } else {
    header('Location: http://jornalpungoandongo.ao/ops/nn');
  };
};