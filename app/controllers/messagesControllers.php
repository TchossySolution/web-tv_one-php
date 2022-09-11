<?php

include_once('../db/config.php');

if (isset($_POST['send_messages'])) {

  echo 'create_messages';

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

  $name_ms = $_POST['name_ms'];
  $email_ms = $_POST['email_ms'];
  $message_ms = $_POST['message_ms'];
  $date_create = $completeDate;
  $date_update =  $completeDate;

  $sql = $pdo->prepare("INSERT INTO messages values(null,?,?,?,?,?)");

  if ($sql->execute(array($name_ms, $email_ms, $message_ms, $date_create, $date_update))) {
    header('Location: https://tvone.ao/dashboard/messages');
  } else {
    header('Location: https://tvone.ao/ops/nn');
  };
};

if (isset($_POST['delete_messages'])) {
  echo 'delete_messages';

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM messages WHERE id=?");

  if ($sql->execute(array($id))) {
    header('Location: https://tvone.ao/dashboard/dashboard/messages');
  } else {
    header('Location: https://tvone.ao/dashboard/ops/nn');
  };
};