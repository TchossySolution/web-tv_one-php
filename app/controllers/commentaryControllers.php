<?php

include_once('../db/config.php');

if (isset($_POST['send_comments'])) {

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

  $user_id = $_POST['user_id'];
  $news_id = $_POST['news_id'];
  $comment = $_POST['comment'];
  $is_approved = $_POST['is_approved'];
  $date_create = $completeDate;
  $date_update =  $completeDate;

  // echo $user_id . '<br>';
  // echo $news_id . '<br>';
  // echo $comment . '<br>';
  // echo $is_approved;

  if (empty(trim($user_id))) {
    echo "<script>
              alert('Por favor faça o login para que possa comentar!');
              window.location.href='http://tvone.ao/news/detailsNews/$news_id';
            </script>";
    exit();
  }
  if (empty(trim($news_id))) {
    echo "<script>
              alert('Não foi possível identificar está noticia!');
              window.location.href='http://tvone.ao/news/1';
            </script>";
    exit();
  }
  if (empty(trim($comment))) {
    echo "<script>
              alert('Por favor preencha o campo da mensagem!');
              window.location.href='http://tvone.ao/news/detailsNews/$news_id';
            </script>";
    exit();
  }

  $sql = $pdo->prepare("INSERT INTO comments values(null,?,?,?,?,?,?)");

  if ($sql->execute(array($user_id, $news_id, $comment, $is_approved, $date_create, $date_update))) {
    echo "<script>
              window.location.href='http://tvone.ao/news/detailsNews/$news_id';
            </script>";
  } else {
    echo "<script>
            window.location.href='http://tvone.ao/news/detailsNews/$news_id';
          </script>";
  };
};

if (isset($_POST['update_comments'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao/dashboard/comments'> Voltar </a>";

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

  $status = '';
  $is_approved = $_POST['is_approved'];
  $date_update = $completeDate;
  $id = $_POST['id'];

  if ($is_approved == 'Pendente') {
    $status = 'Aprovado';
  } else {
    $status = 'Pendente';
  }

  $sql = $pdo->prepare("UPDATE comments SET is_approved=?, date_update=? WHERE id=?");

  if ($sql->execute(array($status, $date_update, $id))) {
    echo "<script>
            alert('O comentário foi colocado no estado $status');
            window.location.href='http://tvone.ao/dashboard/comments';
          </script>";
  } else {
    header('Location: http://tvone.ao/ops/nn');
  };
};

if (isset($_POST['delete_comments'])) {
  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM comments WHERE id=?");

  if ($sql->execute(array($id))) {
    echo "<script>
              window.location.href='http://tvone.ao/dashboard/comments';
            </script>";
  } else {
    echo "<script>
              window.location.href='http://tvone.ao/dashboard/ops/nn';
            </script>";
  };
};