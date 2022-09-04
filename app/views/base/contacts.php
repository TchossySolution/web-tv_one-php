 <?php $this->layout('_theme') ?>

 <link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/contactStyle.css") ?>">

 <main class="contactContainer">
   <section class="publicity">
     <div class='containerImage'>
       <img src="<?= urlProject(FOLDER_BASE . BASE_IMG . "/author_bg.jpg") ?>" alt="">
     </div>
     <div class="indicateContainer">
       <div class="container">
         <a href=""> Home </a>
         <span> » </span>
         <a href=""> Contactos </a>
       </div>
     </div>
   </section>


   <div class="container">
     <div class="containerAllContent">
       <div class="containerLeft">
         <div class="geralInfoContainer">
           <h4>
             Como podemos ajudá-lo
           </h4>

           <h1>Genérico</h1>

           <div style="width: 100%; display: flex; gap: 3rem; justify-content: space-between;">
             <div>
               <strong>
                 Director:
               </strong>
               <p>
                 Filipe Eduardo
               </p>
               <br>

               <strong>
                 Director adjunto:
               </strong>
               <p>
                 Ismael Wakussanga
               </p>
               <br>

               <strong>
                 Reportagem:
               </strong>
               <ul class="list">
                 <li>
                   <p>Elmiro Bernardo</p>
                 </li>
                 <li class="item">
                   <p>Alberto Domingos</p>
                 </li>
                 <li>
                   <p>Edgar Muyegy</p>
                 </li>
               </ul>

               <br>
               <strong>
                 Paginação e artes:
               </strong>
               <ul class="list">
                 <li>
                   <p>Jurelma Samuel
                   </p>
                 </li>
                 <li>
                   <p>Elsa Eduardo
                   </p>
                 </li>
               </ul>
               <br>
             </div>

             <div>
               <strong>
                 Publicidade e Marketing:
               </strong>
               <ul class="list">
                 <li>
                   <p>Délcio Eduardo
                   </p>
                 </li>
               </ul>
               <br>

               <strong>
                 Colaboração:
               </strong>
               <ul class="list">

                 <li>
                   <p>Domingos José</p>
                 </li>
                 <li>
                   <p>Marcela António</p>
                 </li>
               </ul>

               <br>

               <span>
                 Registo nº
                 <strong style="color: #111; font-size: 1rem;">
                   744/2015
                 </strong>
                 MCS
               </span>

               <br>
               <br>

               <span>
                 <strong>
                   Propriedade de FAÇANHAS DO POMBO
                 </strong>
               </span>


             </div>
           </div>


           <div class="infoContainer">
             <div class="info">
               <div class="iconContainer">
                 <i class="fa-regular fa-map"></i>
               </div>
               <p>
                 Rua 21 de Janeiro, junto a AngoMart.
               </p>
             </div>

             <div class="info">
               <div class="iconContainer">
                 <i class="fa-regular fa-envelope"></i>
               </div>
               <p>
                 geral@pungoandongo.com
               </p>
             </div>

             <div class="info">
               <div class="iconContainer">
                 <i class="fa-solid fa-phone"></i>
               </div>
               <p>
                 +244 924 010 200
               </p>
               <p>
                 +244 924 010 021
               </p>
               <p>
                 +244 998 912 410
               </p>
               <p>
                 +244 956 498 606
               </p>
             </div>

             <div class="info">
               <div class="iconContainer">
                 <i class="fa-solid fa-link"></i>
               </div>
               <p>
                 www.pungoandongo.ao
               </p>
             </div>
           </div>
         </div>
       </div>

       <div class="rightContainer">
         <form method="post" action="<?= urlProject(CONTROLLERS . "/messagesControllers.php") ?>" class="formContact">
           <h1>
             Deixe uma mensagem
           </h1>

           <input type="text" placeholder="Nome*" name="name_ms" class="inputForm">
           <input type="text" placeholder="E-mail*" name="email_ms" class="inputForm">

           <textarea id="" cols="30" rows="6" name="message_ms">Sua Mensagem*</textarea>

           <div>
             <button type="submit" name="send_messages">
               Envie agora
             </button>
           </div>
         </form>

       </div>

     </div>

     <div class="mapContainer">
       <i></i>
     </div>
   </div>
 </main>