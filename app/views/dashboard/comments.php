<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allComments = $pdo->prepare("SELECT * FROM comments ORDER BY id DESC ");
$allComments->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/styles/newsStyles.css") ?>">

<div>
  <h2>Comentários</h2>
  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Noticia</th>
        <th>Comentários</th>
        <th>Estado</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allComments as $data) :

      $data_comment = $data['date_create'];
      $text_comment = $data['comment'];
      $is_approved = $data['is_approved'];

      $user_comment_id = $data['user_id'];
      $user_name = '';
      $user_email = '';
      $user_avatar = '';

      $get_user_comment = $pdo->prepare("SELECT * FROM users where id=$user_comment_id");
      $get_user_comment->execute();

      foreach ($get_user_comment as $user_data) :
        $user_name = $user_data['user_name'];
        $user_email = $user_data['user_email'];
        $user_avatar = $user_data['user_photo_profile'];
      endforeach;

      $news_id = $data['news_id'];
      $title_news = '';

      $get_news_comment = $pdo->prepare("SELECT * FROM news where id=?");
      $get_news_comment->execute(array($news_id));

      foreach ($get_news_comment as $news) :
        $title_news = $news['title_news'];
      endforeach;

    ?>
    <form method="post" action="<?= urlProject(CONTROLLERS . "/commentaryControllers.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $user_name; ?></td>
        <td><?= $user_email; ?></td>
        <td><?= $title_news; ?></td>
        <td><?= $text_comment; ?></td>
        <td><?= $is_approved; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>

        <td style="min-width: 220px ;">
          <button type="submit" class="btn btn-danger" name="delete_comments">Apagar</button>
          <button type="submit" class="btn btn-danger" name="update_comments">
            <?php
              if ($is_approved == 'Pendente') {
                echo 'Aprovar';
              } else {
                echo 'Desaprovar';
              }
              ?>
          </button>
        </td>

      </tr>
      <input value="<?= $data['id']; ?>" name="id" hidden>
      <input value="<?= $is_approved; ?>" name="is_approved" hidden>
    </form>
    <?php endforeach ?>
  </table>

</div>