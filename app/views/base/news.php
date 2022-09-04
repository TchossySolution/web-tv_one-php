 <?php $this->layout('_theme') ?>

 <?php

  $status = 1;

  //conexao da base de dados//
  require 'src/db/config.php';

  $allNews = $pdo->prepare("SELECT * FROM news ");
  $allNews->execute();

  $publiciteis_8_11 = $pdo->prepare("SELECT * FROM publicity ORDER BY RAND() DESC limit 8, 4 ");
  $publiciteis_8_11->execute();

  ?>

 <link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/newsStyles.css") ?>">

 <main class="newsContainer">
   <div class="container">
     <section class="publicitySwiper">
       <!-- Additional required wrapper -->
       <div class="swiper-wrapper">
         <!-- Slides -->
         <?php foreach ($publiciteis_8_11 as $data) : ?>
         <div class="swiper-slide">
           <section class="slide" id="slide">
             <section class="publicity">
               <div class="container">
                 <div class='containerImage'>
                   <img src=" <?= $data['image_publicity'] ?>" alt="">
                 </div>
               </div>
             </section>
           </section>
         </div>
         <?php endforeach ?>
       </div>
       <!-- If we need pagination -->
       <div class="swiper-pagination-publicitySwiper"></div>

       <!-- If we need navigation buttons -->
       <!-- <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div> -->

       <!-- If we need scrollbar -->

     </section>


     <div class="indicateContainer">
       <a href=""> Home </a>
       <span> » </span>
       <a href=""> Notícias </a>
       <span> » </span>
       <a href=""> página <span>1</span> </a>
     </div>

     <div class="containerAllContent">
       <div class="containerLeft">
         <div class="allNotices">

           <?php foreach ($allNews as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=?");
              $get_author->execute(array($author_id));

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

              $categoryName = '';
              $categoryId = $data['category_id'];

              $allCategory = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
              $allCategory->execute(array($categoryId));

              foreach ($allCategory as $category) :
                $categoryName = $category['name_category'];
              endforeach;

            ?>
           <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
             <div class="notice">

               <div class="imageContainer">
                 <img src="<?= $data['image_news'] ?>" alt="">
               </div>

               <div class="noticeContent">
                 <div>
                   <button class="categoryNews">
                     <?= $categoryName ?>
                   </button>
                 </div>

                 <h1>
                   <?= $data['title_news'] ?>
                 </h1>

                 <p>
                   <?= $data['resume_news'] ?>
                 </p>

                 <div class="noticeInfo">
                   <p>Por <strong> <?= $author_name ?></strong> - <span><i class="fa-solid fa-calendar-days"></i>
                       <?= $data['date_create'] ?></span></p>
                   <p><i class="fa-regular fa-comment-dots"></i> 3</p>
                 </div>

                 <div>
                   <button class="readMore">
                     Leia mais sobre a noticia
                     <i class="fa-solid fa-right-long"></i>
                   </button>
                 </div>
               </div>
             </div>
           </a>

           <?php endforeach ?>


         </div>

       </div>

       <div class="rightContainer">
         <div class="otherNotices">
           <div class="imageContainer">
             <img
               src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
               alt="">
           </div>

           <div class="categoryTItleSectionContainer">
             <h1>Não perca</h1>
           </div>

           <div class="noticeInEmphasis">
             <div class="notice">
               <div class="imageContainer">
                 <img
                   src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                   alt="">
               </div>

               <div class="noticeContent">
                 <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                 <div class="noticeInfo">
                   <p>Por <strong>Rafael Pilartes</strong> - <span>14 de Janeiro de 2022</span></p>
                   <p><i class="fa-regular fa-comment-dots"></i> 3</p>
                 </div>

                 <p>Para entender o novo smartwatch e outros dispositivos profissionais de foco recente, devemos
                   olhar
                   para
                   o Vale do Silício e o…</p>
               </div>
             </div>
           </div>
           <br>
           <br>
           <div class="noticeResume">
             <div class="notice">
               <div class="imageContainer">
                 <img
                   src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                   alt="">
               </div>

               <div class="noticeContent">
                 <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                 <div class="noticeInfo">
                   <p>14 de Janeiro de 2022</p>
                 </div>

               </div>
             </div>
             <br>
             <div class="notice">
               <div class="imageContainer">
                 <img
                   src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                   alt="">
               </div>

               <div class="noticeContent">
                 <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                 <div class="noticeInfo">
                   <p>14 de Janeiro de 2022</p>
                 </div>

               </div>
             </div>
             <br>
             <div class="notice">
               <div class="imageContainer">
                 <img
                   src="https://smartmag.theme-sphere.com/good-news/wp-content/uploads/sites/6/2021/01/pexels-nilay-ramoliya-3964833-1-1024x683.jpg"
                   alt="">
               </div>

               <div class="noticeContent">
                 <h1>Linha de produtos Bose na feira: showroom aberto agora em Dubai</h1>

                 <div class="noticeInfo">
                   <p>14 de Janeiro de 2022</p>
                 </div>

               </div>
             </div>
           </div>

         </div>
       </div>

     </div>

   </div>
 </main>