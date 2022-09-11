<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allPublicity = $pdo->prepare("SELECT * FROM publicity");
$allPublicity->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/styles/publicityStyles.css") ?>">

<section>

  <h1>Publicidades</h1>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Criar Publicidade
  </button>

  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Descrição</th>
        <th>Link</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allPublicity as $data) :
    ?>
    <form method="post" enctype="multipart/form-data"
      action="<?= urlProject(CONTROLLERS . "/publicityController.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['description_publicity']; ?></td>
        <td><?= $data['link_publicity']; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>
        <td style="min-width: 200px ;">
          <button type="button" class="btn btn-secondary" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal<?= $data['id']; ?>">Editar</button>
          <button type="submit" class="btn btn-danger" name="delete_publicity">Apagar</button>
        </td>
      </tr>

      <div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar Publicidade <?= $data['id']; ?> </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <img src="<?= $data['image_publicity']; ?>" class="img-fluid" alt="Responsive image">
              <br>
              <br>

              <input type="file" class="form-control" name="image_publicity"
                placeholder="Selecione a imagem da publicidade" require>
              <br>

              <textarea type="text" value="<?= $data['description_publicity']; ?>" class="form-control"
                name="description_publicity" placeholder="Descrição da publicidade " require>
                <?= $data['description_publicity']; ?>
                
                </textarea>
              <br>

              <input type="text" value="<?= $data['link_publicity']; ?>" class="form-control" name="link_publicity"
                placeholder="Coloque o link da publicidade / ou um # " require>
              <br>

              <input type="date" value="<?= $data['date_expire']; ?>" class="form-control" name="date_expire"
                placeholder="Data de expiração da publicidade" require>
              <br>

              <input value="<?= $data['id']; ?>" name="id" hidden>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="update_publicity">Atualizar Publicidade</button>
              </div>

            </div>
          </div>
        </div>
      </div>

    </form>
    <?php endforeach ?>
  </table>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova Publicidade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <form method="post" enctype="multipart/form-data"
            action="<?= urlProject(CONTROLLERS . "/publicityController.php") ?>">

            <input type="file" class="form-control" name="image_publicity"
              placeholder="Selecione a imagem da publicidade" require>
            <br>

            <input type="text" class="form-control" name="description_publicity" placeholder="Descrição da publicidade "
              require>
            <br>

            <input type="text" class="form-control" name="link_publicity"
              placeholder="Coloque o link da publicidade / ou um # " require>
            <br>

            <input type="date" class="form-control" name="date_expire" placeholder="Data de expiração da publicidade"
              require>
            <br>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary" name="create_publicity">Criar Publicidade</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</section>