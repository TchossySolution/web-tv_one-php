<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allMessages = $pdo->prepare("SELECT * FROM messages");
$allMessages->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/styles/newsStyles.css") ?>">

<div>
  <h2>Geral</h2>

  <br>
  <br>

</div>