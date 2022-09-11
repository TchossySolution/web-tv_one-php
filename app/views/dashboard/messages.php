<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allMessages = $pdo->prepare("SELECT * FROM messages");
$allMessages->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/styles/newsStyles.css") ?>">

<div>
  <h2>Mensagens</h2>

  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Mensagem</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allMessages as $data) :
    ?>
    <form method="post" action="<?= urlProject(CONTROLLERS . "/messagesControllers.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['name_ms']; ?></td>
        <td><?= $data['email_ms']; ?></td>
        <td><?= $data['message_ms']; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>

        <td style="min-width: 200px ;">
          <button type="submit" class="btn btn-danger" name="delete_messages">Apagar</button>
        </td>

      </tr>
      <input value="<?= $data['id']; ?>" name="id" hidden>
    </form>
    <?php endforeach ?>
  </table>

</div>