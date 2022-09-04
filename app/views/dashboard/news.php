<?php $this->layout('_theme') ?>

<?php

//conexao da base de dados//
require 'src/db/config.php';

$allNews = $pdo->prepare("SELECT * FROM news");
$allNews->execute();

$allAuthor2 = $pdo->prepare("SELECT * FROM author");
$allAuthor2->execute();

$allCategories2 = $pdo->prepare("SELECT * FROM categories");
$allCategories2->execute();

?>

<link rel="stylesheet" href="<?= urlProject(FOLDER_DASHBOARD . "/src/styles/newsStyles.css") ?>">

<section>

  <h1>Noticias</h1>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Criar Noticia
  </button>

  <br>
  <br>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Resumo</th>
        <th>Autor</th>
        <th>Categoria</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <?php
    foreach ($allNews as $data) :
      $allAuthor = $pdo->prepare("SELECT * FROM author");
      $allAuthor->execute();

      $allCategories = $pdo->prepare("SELECT * FROM categories");
      $allCategories->execute();

      $author_id = $data['author_id'];
      $author_name;

      $category_id = $data['category_id'];
      $category_name;

      $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
      $get_author->execute();

      foreach ($get_author as $author) :
        $author_name = $author['name_author'];
      endforeach;

      $get_category = $pdo->prepare("SELECT * FROM categories where id=$category_id");
      $get_category->execute();

      foreach ($get_category as $category) :
        $category_name = $category['name_category'];
      endforeach;

    ?>
    <form method="post" enctype="multipart/form-data" action="<?= urlProject(CONTROLLERS . "/newsControllers.php") ?>">
      <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['title_news']; ?></td>
        <td><?= $data['resume_news']; ?></td>
        <td><?= $author_name; ?></td>
        <td><?= $category_name; ?></td>
        <td style="min-width: 200px ;"><?= $data['date_create']; ?></td>
        <td style="min-width: 200px ;">
          <button type="button" class="btn btn-secondary" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal<?= $data['id']; ?>">Editar</button>
          <button type="submit" class="btn btn-danger" name="delete_news">Apagar</button>
        </td>
      </tr>
      <input value="<?= $data['id']; ?>" name="id" hidden>

      <!-- START MODAL EDITE NEWS -->
      <div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar noticia <?= $data['id']; ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <input value="<?= $data['id']; ?>" name="id" hidden>

              <img src="<?= $data['image_news']; ?>" class="img-fluid" alt="Responsive image">
              <br>
              <br>

              <input type="text" value="<?= $data['title_news']; ?>" class="form-control" name="title_news"
                placeholder="Digite o titulo da Noticia" require>
              <br>

              <textarea type="text" class="form-control" name="resume_news" placeholder="Digite o resumo da Noticia"
                require>
                <?= $data['resume_news']; ?>
              </textarea>
              <br>


              <input type="text" value="<?= $data['description_news']; ?>" class="form-control" name="description_news"
                placeholder="Digite a descrição  da Noticia" require>
              <br>

              <input type="text" value="<?= $data['epigraph_news']; ?>" class="form-control" name="epigraph_news"
                placeholder="Digite epigrafe da Noticia" require>
              <br>

              <input type="text" value="<?= $data['author_epigraph_news']; ?>" class="form-control"
                name="author_epigraph_news" placeholder="Digite nome do author da epigrafe" require>
              <br>

              <input type="file" class="form-control" name="image_news" placeholder="Selecione a imagem da Noticia"
                require>
              <br>

              <input type="text" value="<?= $data['description_image_news']; ?>" class="form-control"
                name="description_image_news" placeholder="Digite a descrição a imagem" require>
              <br>

              <input type="text" value="<?= $data['photography_news']; ?>" class="form-control" name="photography_news"
                placeholder="Digite o nome do fotografo" require>
              <br>

              <input type="text" value="<?= $data['reading_time_news']; ?>" class="form-control"
                name="reading_time_news" placeholder="Digite o tempo de leitura" require>
              <br>


              <label for="publicity_news">É uma publicidade? </label>
              <select class="form-select" name="publicity_news" id="publicity_news">
                <option value="">--- Escolha a opção ---</option>
                <option value="sim">Sim é</option>
                <option value="não">Não é!</option>
              </select>
              <br>

              <label for="choose_editors_news">Está noticia é uma escolha dos editores? </label>
              <select class="form-select" name="choose_editors_news" id="choose_editors_news">
                <option value="">--- Escolha a opção ---</option>
                <option value="sim">Sim é</option>
                <option value="não">Não é!</option>
              </select>
              <br>

              <label for="emphasis_news">Está noticia está em destaque? </label>
              <select class="form-select" name="emphasis_news" id="emphasis_news">
                <option value="">--- Escolha a opção ---</option>
                <option value="sim">Sim é</option>
                <option value="não">Não é!</option>
              </select>
              <br>

              <label for="relevant_news">Está noticia é relevante? </label>
              <select class="form-select" name="relevant_news" id="relevant_news">
                <option value="">--- Escolha a opção ---</option>
                <option value="sim">Sim é</option>
                <option value="não">Não é!</option>
              </select>
              <br>


              <label for="author_id">Autores:</label>
              <select class="form-select" name="author_id" id="author_id">
                <option value="" selected>--- Selecione a autor ---</option>
                <?php foreach ($allAuthor as $data) : ?>
                <option value="<?= $data['id']; ?>">
                  <?= $data['name_author']; ?>
                </option>
                <?php endforeach ?>
              </select>
              <br>

              <label for="category_id">Categorias:</label>
              <select class="form-select" name="category_id" id="category_id">
                <option value="" selected>--- Selecione a categoria ---</option>
                <?php foreach ($allCategories as $data) : ?>
                <option value="<?= $data['id']; ?>">
                  <?= $data['name_category']; ?>
                </option>
                <?php endforeach ?>
              </select>
              <br>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="update_news">Criar Noticia</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL EDITE NEWS -->

    </form>
    <?php endforeach ?>


  </table>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova noticia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data"
            action="<?= urlProject(CONTROLLERS . "/newsControllers.php") ?>">
            <input type="text" class="form-control" name="title_news" placeholder="Digite o titulo da Noticia" require>
            <br>

            <input type="text" class="form-control" name="resume_news" placeholder="Digite o resumo da Noticia" require>
            <br>


            <label for="author_id">Autores:</label>
            <select class="form-select" name="category_id" id="category_id">
              <option value="" selected>--- Selecione a categoria ---</option>
              <?php foreach ($allAuthor2 as $data) :
                $author_id = $data['id'];
                $author_name = $data['name_author'];
              ?>
              <option value="<?= $author_id ?>"><?= $author_name ?></option>
              <?php endforeach ?>
            </select>
            <br>

            <label for="category_id">Categorias:</label>
            <select class="form-select" name="category_id" id="category_id">
              <option value="" selected>--- Selecione a categoria ---</option>
              <?php foreach ($allCategories2 as $data) :
                $category_id = $data['id'];
                $category_name = $data['name_category'];
              ?>
              <option value="<?= $category_id ?>"><?= $category_name ?></option>
              <?php endforeach ?>
            </select>
            <br>

            <input type="text" class="form-control" name="description_news" placeholder="Digite a descrição  da Noticia"
              require>
            <br>

            <input type="text" class="form-control" name="epigraph_news" placeholder="Digite epigrafe da Noticia"
              require>
            <br>

            <input type="text" class="form-control" name="author_epigraph_news"
              placeholder="Digite nome do author da epigrafe" require>
            <br>

            <input type="file" class="form-control" name="image_news" placeholder="Selecione a imagem da Noticia"
              require>
            <br>

            <input type="text" class="form-control" name="description_image_news"
              placeholder="Digite a descrição a imagem" require>
            <br>

            <input type="text" class="form-control" name="photography_news" placeholder="Digite o nome do fotografo"
              require>
            <br>

            <input type="text" class="form-control" name="reading_time_news" placeholder="Digite o tempo de leitura"
              require>
            <br>


            <label for="publicity_news">É uma publicidade? </label>
            <select class="form-select" name="publicity_news" id="publicity_news">
              <option value="">--- Escolha a opção ---</option>
              <option value="sim">Sim é</option>
              <option value="não">Não é!</option>
            </select>
            <br>

            <label for="choose_editors_news">Está noticia é uma escolha dos editores? </label>
            <select class="form-select" name="choose_editors_news" id="choose_editors_news">
              <option value="">--- Escolha a opção ---</option>
              <option value="sim">Sim é</option>
              <option value="não">Não é!</option>
            </select>
            <br>

            <label for="emphasis_news">Está noticia está em destaque? </label>
            <select class="form-select" name="emphasis_news" id="emphasis_news">
              <option value="">--- Escolha a opção ---</option>
              <option value="sim">Sim é</option>
              <option value="não">Não é!</option>
            </select>
            <br>

            <label for="relevant_news">Está noticia é relevante? </label>
            <select class="form-select" name="relevant_news" id="relevant_news">
              <option value="">--- Escolha a opção ---</option>
              <option value="sim">Sim é</option>
              <option value="não">Não é!</option>
            </select>
            <br>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary" name="create_news">Criar Noticia</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>