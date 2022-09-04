<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allAuthors = $pdo->prepare("SELECT * FROM author");
$allAuthors->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/styles/authorsStyle.css") ?>">

<section>

  <h1>Autor</h1>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
    Criar Autor
  </button>

  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allAuthors as $data) :
    ?>
    <form method="post" action="<?= urlProject(CONTROLLERS . "/authorsControllers.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['name_author']; ?></td>
        <td><?= $data['title_author']; ?></td>
        <td><?= $data['description_author']; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>
        <td style="min-width: 200px ;">
          <button type="button" class="btn btn-secondary" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal<?= $data['id']; ?>">Editar</button>
          <button type="submit" class="btn btn-danger" name="delete_author">Apagar</button>
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
              <input type="text" value="<?= $data['name_author']; ?>" class="form-control" name="name_author"
                placeholder="Digite o nome do Autor" require>
              <br>
              <input type="text" value="<?= $data['title_author']; ?>" class="form-control" name="title_author"
                placeholder="Digite o titulo do autor" require>
              <br>
              <textarea type="text" class="form-control" name="description_author"
                placeholder="Digite a descrição do Autor" require>
                <?= $data['description_author']; ?>
              </textarea>

              <input value="<?= $data['id']; ?>" name="id" hidden>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="update_author">Atualizar Autor</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Novo autor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <form method="post" action="<?= urlProject(CONTROLLERS . "/authorsControllers.php") ?>">
            <div>
              <input type="text" class="form-control" name="name_author" placeholder="Digite o nome do Autor" require>
              <br>
              <input type="text" class="form-control" name="title_author" placeholder="Digite o titulo do autor"
                require>
              <br>
              <textarea type="text" class="form-control" name="description_author"
                placeholder="Digite a descrição do Autor" require></textarea>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary" name="create_author">Criar Autor</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>