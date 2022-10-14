<?php

include_once('../db/config.php');

if (isset($_POST['create_publicity'])) {

  echo 'Criar Publicidade <br>';

  $size_max = 2097152; //2MB
  $accept  = array("jpg", "png", "jpeg");
  $extension  = pathinfo($_FILES['image_publicity']['name'], PATHINFO_EXTENSION);

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

  $dateNew = date('d-m-Y H:i:s');
  $dateNewComplete = "../_imageDB/date-$dateNew/";

  if ($_FILES['image_publicity']['size'] >= $size_max) {
    echo "<script>
            alert('Arquivo excedeu o tamanho máximo de 2MB');
            window.location.href='https://tvone.ao/dashboard/publicity';
          </script>";
    exit();
  } else {
    if (in_array($extension, $accept)) {
      // echo "Permitido";
      $folder = "../_imagesDb/publicity/";

      if (!is_dir($folder)) {
        mkdir($folder, 755, true);
      }

      // Nome temporário do arquivo
      $tmp = $_FILES['image_publicity']['tmp_name'];
      // Novo nome do arquivo
      $newName = "img_news-" . date('d-m-Y') . '-' . date('H') . 'h-' . uniqid() . ".$extension";

      if (move_uploaded_file($tmp, $folder . $newName)) {
        echo "Upload realizado com sucesso!";
      } else {
        echo "Erro: ao realizar Upload... <br>";
        echo "<script>
        alert('Erro: ao realizar Upload...');
                window.location.href='https://tvone.ao/dashboard/publicity';
              </script>";

        exit();
      }
    } else {
      echo "<script>
      alert('Erro: Extensão ($extension) não permitido');
              window.location.href='https://tvone.ao/dashboard/publicity';
            </script>";

      exit();
    }
  }

  $image_publicity =  'https://tvone.ao/app/_imagesDb/publicity/' . $newName;
  $description_publicity = $_POST['description_publicity'];
  $link_publicity = $_POST['link_publicity'];
  $publicity_local   = $_POST['publicity_local'];
  $date_create = $completeDate;
  $date_expire =   $_POST['date_expire'];

  $sql = $pdo->prepare("INSERT INTO publicity values(null,?,?,?,?,?,?)");

  if ($sql->execute(array(
    $image_publicity,
    $description_publicity,
    $link_publicity,
    $publicity_local,
    $date_create,
    $date_expire
  ))) {
    echo "<script>
            window.location.href='https://tvone.ao/dashboard/publicity';
          </script>";
  } else {
    echo "<script>
            window.location.href='https://tvone.ao/dashboard/publicity';
          </script>";
  };
};

if (isset($_POST['delete_publicity'])) {
  echo 'delete_publicity';

  $id = $_POST['id'];

  $sql = $pdo->prepare("DELETE FROM publicity WHERE id=?");

  if ($sql->execute(array($id))) {
    echo "<script>
              window.location.href='https://tvone.ao/dashboard/publicity';
            </script>";
  } else {
    echo "<script>
              window.location.href='https://tvone.ao/dashboard/publicity';
            </script>";
  };
};

if (isset($_POST['update_publicity'])) {
  echo 'Atualizar Publicidade <br>';

  $size_max = 2097152; //2MB
  $accept  = array("jpg", "png", "jpeg");
  $extension  = pathinfo($_FILES['image_publicity']['name'], PATHINFO_EXTENSION);

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

  if ($_FILES['image_publicity']['size'] >= $size_max) {
    echo "<script>
            alert('Arquivo excedeu o tamanho máximo de 2MB');
            window.location.href='https://tvone.ao/dashboard/publicity';
          </script>";

    exit();
  } else {
    if (in_array($extension, $accept)) {
      // echo "Permitido";
      $folder = "../_imagesDb/publicity/";

      if (!is_dir($folder)) {
        mkdir($folder, 755, true);
      }

      // Nome temporário do arquivo
      $tmp = $_FILES['image_publicity']['tmp_name'];
      // Novo nome do arquivo
      $newName = "img_news-" . date('d-m-Y') . '-' . date('H') . 'h-' . uniqid() . ".$extension";

      if (move_uploaded_file($tmp, $folder . $newName)) {
        echo "Upload realizado com sucesso!";
      } else {
        echo "<script>
                alert('Erro: ao realizar Upload...');
                window.location.href='https://tvone.ao/dashboard/publicity';
              </script>";

        exit();
      }
    } else {
      echo "<script>
              alert('Erro: Extensão ($extension) não permitido');
              window.location.href='https://tvone.ao/dashboard/publicity';
            </script>";

      exit();
    }
  }

  $image_publicity =  'https://tvone.ao/app/_imagesDb/publicity/' . $newName;
  $description_publicity = $_POST['description_publicity'];
  $link_publicity = $_POST['link_publicity'];
  $publicity_local   = $_POST['publicity_local'];
  $date_expire =   $_POST['date_expire'];
  $id = $_POST['id'];

  $sql = $pdo->prepare("UPDATE publicity SET image_publicity=?, description_publicity=?,  link_publicity=?, publicity_local=?,  date_expire=? WHERE id=?");

  if ($sql->execute(array($image_publicity, $description_publicity, $link_publicity, $publicity_local, $date_expire, $id))) {
    echo "<script>
              window.location.href='https://tvone.ao/dashboard/publicity';
            </script>";
  } else {
    echo "<script>
              window.location.href='https://tvone.ao/dashboard/publicity';
            </script>";
  };
};