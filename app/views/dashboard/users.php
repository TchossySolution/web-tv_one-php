<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allUsers = $pdo->prepare("SELECT * FROM users");
$allUsers->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/styles/newsStyles.css") ?>">

<div>
  <h2>Usuários</h2>

  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allUsers as $data) :
    ?>
    <form method="post" action="<?= urlProject(CONTROLLERS . "/loginUserControllers.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['user_name']; ?></td>
        <td><?= $data['user_email']; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>

        <td style="min-width: 200px ;">
          <button type="submit" class="btn btn-danger" name="delete_user">Apagar</button>
        </td>

      </tr>
      <input value="<?= $data['id']; ?>" name="id" hidden>
    </form>
    <?php endforeach ?>
  </table>

</div>