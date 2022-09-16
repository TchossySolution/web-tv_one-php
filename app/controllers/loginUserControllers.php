<?php
session_start();
include_once('../db/config.php');

if (isset($_POST['login_user'])) {

  if (!empty($_POST['user_email']) && !empty($_POST['user_password'])) {

    $user_email = $_POST['user_email'];

    $user_password = $_POST['user_password'];
    $new_password = md5($user_password);

    $isUser = $_POST['isUser'];

    $sql = $pdo->prepare("SELECT * FROM users WHERE user_email=? and user_password=? ");
    $sql->execute(array($user_email, $new_password));

    if ($sql->rowCount() < 1) {
      unset($_SESSION['user_email']);
      unset($_SESSION['user_password']);
      echo "<script>
              alert('Dados do usuario incorreto!');
              window.location.href='https://tvone.ao';
            </script>";
    } else {
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['isUser'] = $isUser;
      header('Location: https://tvone.ao');
    }
  } else {
    echo "<script>
              alert('Preencha todos os dados!');
              window.location.href='https://tvone.ao';
          </script>";
  }
};

if (isset($_POST['create_user'])) {

  // echo "Alguma coisa <br>";
  echo "<a href='https://tvone.ao'> Voltar </a>";

  $size_max = 2097152; //2MB
  $accept  = array("jpg", "png", "jpeg");
  $extension  = pathinfo($_FILES['user_photo_profile']['name'], PATHINFO_EXTENSION);

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

  // $dateNew = date('d-m-Y H:i:s');
  // $dateNewComplete = "../_imageDB/date-$dateNew/";

  $newName = "";

  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];

  $user_password = $_POST['user_password'];
  $new_password = md5($user_password);

  $user_photo_profile =  "";

  $date_create = $completeDate;
  $date_update =  $completeDate;

  $isUser = $_POST['isUser'];

  if (empty(trim($user_name)) && empty(trim($user_email))) {
    $password_err = "O nome e o e-mail do usuário são campos obrigatórios.";
    echo "<script>
    alert('O nome e o e-mail do usuário são campos obrigatórios.');
    window.location.href='https://tvone.ao';
    </script>";
    exit();
  }
  if (empty(trim($user_password))) {
    $password_err = "A palavra-passe é um campos obrigatórios.";
    echo "<script>
                alert('O nome e o e-mail do usuário são campos obrigatórios.');
                window.location.href='https://tvone.ao';
              </script>";
    exit();
  }

  if (empty($username_err) && empty($password_err)) {
    $get_user = $pdo->prepare("SELECT * FROM users WHERE user_email=?");
    $get_user->execute(array($user_email));

    if ($get_user->rowCount() > 1) {
      unset($_SESSION['user_name']);
      unset($_SESSION['user_email']);
      echo "<script>
              alert('Este email já está cadastrado!');
              window.location.href='https://tvone.ao';
            </script>";
    } else {
      if ($_FILES['user_photo_profile']['size'] >= $size_max) {
        echo "<script>
                alert('Arquivo excedeu o tamanho máximo de 2MB!');
                window.location.href='https://tvone.ao';
              </script>";
        exit();
      } else {
        if (in_array($extension, $accept)) {
          // echo "Permitido";
          $folder = "../_imagesDb/users/";

          if (!is_dir($folder)) {
            mkdir($folder, 755, true);
          }

          // Nome temporário do arquivo
          $tmp = $_FILES['user_photo_profile']['tmp_name'];
          // Novo nome do arquivo
          $newName = "img_user-" . date('d-m-Y') . '-' . date('H') . 'h-' . uniqid() . ".$extension";

          if (move_uploaded_file($tmp, $folder . $newName)) {
            $user_photo_profile = 'https://tvone.ao/app/_imagesDb/users/' . $newName;
            // echo "Upload realizado com sucesso!";
          } else {
            echo "<script>
                    alert('Erro: ao realizar Upload...');
                    window.location.href='https://tvone.ao/login';
                  </script>";

            exit();
          }
        } else {
          echo "<script>
                  alert('Erro: Extensão ($extension) não permitido');
                  window.location.href='https://tvone.ao/login';
                </script>";
          exit();
        }
      }

      $sql = $pdo->prepare("INSERT INTO users values(null,?,?,?,?,?,?)");

      if ($sql->execute(array(
        $user_name,
        $user_email,
        $new_password,
        $user_photo_profile,
        $date_create = $completeDate,
        $date_update =  $completeDate,
      ))) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['isUser'] = $isUser;

        header('Location: https://tvone.ao');
      } else {
        header('Location: https://tvone.ao/ops/nn');
      };
    };
  };
};

if (isset($_POST['delete_user'])) {

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM users WHERE id=?");

  if ($sql->execute(array($id))) {
    header('Location: https://tvone.ao/dashboard/users');
  } else {
    header('Location: https://tvone.ao/ops/nn');
  };
};

if (isset($_POST['logOut_user'])) {
  unset($_SESSION['user_name']);
  unset($_SESSION['user_email']);
  unset($_SESSION['isUser']);
  header('Location: https://tvone.ao');
};