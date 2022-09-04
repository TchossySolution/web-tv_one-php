<link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . "/src/components/Footer/styles.css") ?>">

<footer id="footer">
  <div class="footerTop">
    <div class="container">
      <div class="about">
        <div>
          <h3 class="footerTitle">Sobre nós</h3>

          <img width="220px" height="70px" src="<?= urlProject(FOLDER_BASE . BASE_IMG . "/TvOne.png") ?>" alt="">

        </div>

        <p>Sua fonte para as notícias de estilo de vida. Esta demonstração foi criada especificamente para exibir o uso
          do tema como um site de estilo de vida. Visite nossa página principal para mais informação.</p>

        <p>Estamos aceitando novas parcerias <b> agora.</b></p>

        <div>
          <p>Envie-nos um e-mail: <span>elmirophotograph@gmail.com</span></p>
          <p>Contato: <span>+244 941 236 262</span></p>
        </div>
      </div>

      <div class="choose">
        <h3 class="footerTitle">Nossas escolhas</h3>

        <div class="notice">
          <div class="imageContainer">
            <img src="<?= urlProject(FOLDER_BASE . BASE_IMG . "/img450x300.webp") ?>" alt="">
          </div>

          <div class="noticeContent">
            <p>Lembrar! Maus hábitos que causam um grande impacto no seu estilo de vida</p>

            <span>13 de janeiro de 2022</span>
          </div>
        </div>

        <div class="notice">
          <div class="imageContainer">
            <img src="<?= urlProject(FOLDER_BASE . BASE_IMG . "/img450x300.webp") ?>" alt="">
          </div>

          <div class="noticeContent">
            <p>Lembrar! Maus hábitos que causam um grande impacto no seu estilo de vida</p>

            <span>13 de janeiro de 2022</span>
          </div>
        </div>


        <div class="notice">
          <div class="imageContainer">
            <img src="<?= urlProject(FOLDER_BASE . BASE_IMG . "/img450x300.webp") ?>" alt="">
          </div>

          <div class="noticeContent">
            <p>Lembrar! Maus hábitos que causam um grande impacto no seu estilo de vida</p>

            <span>13 de janeiro de 2022</span>
          </div>
        </div>

      </div>


    </div>
  </div>

  <div class="footerBottom">
    <div class="container">
      <div class="socialMediaContainer">
        <button class="buttonSocialMedia">
          <i class="fa-brands fa-facebook-f"></i>
        </button>

        <button class="buttonSocialMedia">
          <a href="https://www.instagram.com/jornalpungoandongo/">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </button>

        <button class="buttonSocialMedia">
          <i class="fa-brands fa-twitter"></i>
        </button>
      </div>

      <div class="linkContainer">
        <ul>
          <li>
            <a href="<?= urlProject() ?>">Casa</a>
          </li>
          <li>
            <a href="<?= urlProject("news/1") ?>">Noticía</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Política/1") ?>">Política</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Actualidade/1") ?>">Actualidade</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Sociedade/1") ?>">Sociedade</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Cultura/1") ?>">Cultura</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Especialidade/1") ?>">Especialidade</a>
          </li>
          <li>
            <a href="<?= urlProject("news/search/category/Economia/1") ?>">Economia</a>
          </li>
        </ul>
      </div>

      <div class="copyrightContainer">
        <p>
          ©Todos direitos reservados 2022. Projetado por <span> Tchossy Solution.</span>
        </p>
      </div>
    </div>
  </div>
</footer>