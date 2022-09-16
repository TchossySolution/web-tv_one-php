<?php
session_start();
include_once('../db/config.php');

if (isset($_POST['login_Adm'])) {

  if (!empty($_POST['adm_email']) && !empty($_POST['adm_password'])) {

    $adm_email = $_POST['adm_email'];

    $adm_password = $_POST['adm_password'];
    $new_password = md5($adm_password);

    $isAdm = $_POST['isAdm'];

    $sql = $pdo->prepare("SELECT * FROM user_adm WHERE adm_email=? and adm_password=? ");
    $sql->execute(array($adm_email, $new_password));

    if ($sql->rowCount() < 1) {
      unset($_SESSION['adm_name']);
      unset($_SESSION['adm_email']);
      unset($_SESSION['adm_password']);
      echo "<script>
              alert('Dados do Administrador incorreto!');
              window.location.href='https://tvone.ao/dashboard';
            </script>";
    } else {
      $_SESSION['adm_name'] = $adm_name;
      $_SESSION['adm_email'] = $adm_email;
      $_SESSION['isAdm'] = $isAdm;
      header('Location: https://tvone.ao/dashboard/news');
    }
  } else {
    echo "<script>
              alert('Preencha todos os dados!');
              window.location.href='https://tvone.ao/dashboard';
          </script>";
  }
};

if (isset($_POST['create_Adm'])) {

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

  $adm_name = $_POST['adm_name'];
  $adm_email = $_POST['adm_email'];

  $adm_password = $_POST['adm_password'];
  $new_password = md5($adm_password);

  $date_create = $completeDate;
  $date_update =  $completeDate;
  $isAdm = $_POST['isAdm'];

  // Defina variáveis e inicialize com valores vazios
  $username_err = $password_err = "";

  if (empty(trim($adm_name))) {
    $password_err = "Por favor insira o nome do usuário.";
    echo "<script>
              alert('Por favor insira o nome do usuário!');
              window.location.href='https://tvone.ao/dashboard';
            </script>";
    exit();
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($adm_name))) {
    $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
    echo "<script>
              alert('O nome de usuário pode conter apenas letras, números e sublinhados!');
              window.location.href='https://tvone.ao/dashboard';
            </script>";
  }

  if (empty(trim($adm_email))) {
    $password_err = "Por favor insira o email do usuário.";
    echo "<script>
              alert('Por favor insira o email do usuário!');
              window.location.href='https://tvone.ao/dashboard';
            </script>";
    exit();
  }

  if (empty(trim($adm_password))) {
    $password_err = "Por favor insira uma senha.";
    echo "<script>
              alert('Por favor insira uma senha!');
              window.location.href='https://tvone.ao/dashboard';
            </script>";
    exit();
  } elseif (strlen(trim($adm_password)) < 6) {
    $password_err = "A senha deve ter pelo menos 6 caracteres.";
    echo "<script>
              alert('A senha deve ter pelo menos 6 caracteres!');
              window.location.href='https://tvone.ao/dashboard';
            </script>";
    exit();
  }


  if (empty($username_err) && empty($password_err)) {
    $get_user_adm = $pdo->prepare("SELECT * FROM user_adm WHERE adm_email=?");
    $get_user_adm->execute(array($adm_email));

    if ($get_user_adm->rowCount() > 1) {
      unset($_SESSION['adm_name']);
      unset($_SESSION['adm_email']);
      unset($_SESSION['adm_password']);
      echo "<script>
    alert('Este email já está cadastrado!');
    window.location.href='https://tvone.ao/dashboard';
    </script>";
    } else {
      $sql = $pdo->prepare("INSERT INTO user_adm values(null,?,?,?,?,?)");
      $sql->execute(array($adm_name, $adm_email, $new_password, $date_create, $date_update));

      $_SESSION['adm_name'] = $adm_name;
      $_SESSION['adm_email'] = $adm_email;
      $_SESSION['isAdm'] = $isAdm;
      header('Location: https://tvone.ao/dashboard/news');
    }
  }
}

if (isset($_POST['delete_Adm'])) {

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM user_adm WHERE id=?");

  if ($sql->execute(array($id))) {
    header('Location: https://tvone.ao/dashboard/dashboard/users');
  } else {
    header('Location: https://tvone.ao/dashboard/ops/nn');
  };
};

if (isset($_POST['logOut_Adm'])) {
  unset($_SESSION['adm_name']);
  unset($_SESSION['adm_email']);
  unset($_SESSION['isAdm']);
  header('Location: https://tvone.ao/dashboard/');
};