<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allVideos = $pdo->prepare("SELECT * FROM videos_news");
$allVideos->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/styles/authorsStyle.css") ?>">

<section>

  <h1>Videos</h1>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
    Criar Videos
  </button>

  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Tempo</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allVideos as $data) :
    ?>
    <form method="post" action="<?= urlProject(CONTROLLERS . "/videosControllers.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['title_video']; ?></td>
        <td><?= $data['time_video']; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>
        <td style="min-width: 200px ;">
          <button type="button" class="btn btn-secondary" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal<?= $data['id']; ?>">Editar</button>
          <button type="submit" class="btn btn-danger" name="delete_videos">Apagar</button>
        </td>
      </tr>

      <div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Atualizar no autor <?= $data['id']; ?> </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <input type="text" value="<?= $data['title_video']; ?>" class="form-control" name="title_video"
                placeholder="Digite o nome do Autor" require>
              <br>
              <input type="text" value="<?= $data['link_video']; ?>" class="form-control" name="link_video"
                placeholder="Digite o titulo do autor" require>
              <br>
              <input type="text" value="<?= $data['time_video']; ?>" class="form-control" name="time_video"
                placeholder="Digite o titulo do autor" require>
              <br>
              <input type="text" value="<?= $data['cover_video']; ?>" class="form-control" name="cover_video"
                placeholder="Digite o titulo do autor" require>
              <br>

              <input value="<?= $data['id']; ?>" name="id" hidden>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="update_videos">Atualizar Autor</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php endforeach ?>
  </table>

  <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo videos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <form method="post" action="<?= urlProject(CONTROLLERS . "/videosControllers.php") ?>">
            <div>
              <input type="text" class="form-control" name="title_video" placeholder="Digite o titulo do video" require>
              <br>
              <input type="text" class="form-control" name="link_video" placeholder="Link do video" require>
              <br>
              <input type="text" class="form-control" name="time_video" placeholder="Digite o tempo do video" require>
              <br>
              <input type="text" class="form-control" name="cover_video" placeholder="Digite o capa do video" require>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary" name="create_videos">Criar videos</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>