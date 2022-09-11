<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allCategory = $pdo->prepare("SELECT * FROM categories");
$allCategory->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/styles/categoriesStyle.css") ?>">

<section>

  <h1>Categorias</h1>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Criar categoria
  </button>

  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allCategory as $data) :
    ?>
    <form method="post" action="<?= urlProject(CONTROLLERS . "/categoryControllers.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['name_category']; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>
        <td style="min-width: 200px ;">
          <button type="button" class="btn btn-secondary" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal<?= $data['id']; ?>">Editar</button>
          <button type="submit" class="btn btn-danger" name="delete_category">Apagar</button>
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
              <input type="text" value="<?= $data['name_category']; ?>" class="form-control" name="name_category"
                placeholder="Digite o titulo do autor" require>

              <input value="<?= $data['id']; ?>" name="id" hidden>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="update_category">Atualizar Autor</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Nova categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <form method="post" action="<?= urlProject(CONTROLLERS . "/categoryControllers.php") ?>">

            <div>
              <input type="text" class="form-control" name="name_category" placeholder="Digite o nome da categoria"
                require>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary" name="create_category">Criar Autor</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>