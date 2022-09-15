 <?php $this->layout('_theme') ?>

 <?php
  session_start();

  ?>

 <link rel="stylesheet" href="<?= urlProject(FOLDER_BASE . BASE_STYLES . "/contactStyle.css") ?>">

 <main class="contactContainer">
   <section class="publicity">

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

           <h1>Contactos</h1>

           <!-- <div style="width: 100%; display: flex; gap: 3rem; justify-content: space-between;">
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
           </div> -->

           <br>

           <div class="infoContainer">
             <div class="info">
               <div class="iconContainer">
                 <i class="fa-regular fa-map"></i>
               </div>
               <p>
                 Benfica, Por do sol, junto a Sonagalp.
               </p>
             </div>

             <div class="info">
               <div class="iconContainer">
                 <i class="fa-regular fa-envelope"></i>
               </div>
               <p>
                 geral@tvone.com
               </p>
             </div>
           </div>
           <div class="infoContainer">

             <div class="info">
               <div class="iconContainer">
                 <i class="fa-solid fa-phone"></i>
               </div>

               <p>
                 +244 934 292 121
               </p>
             </div>

             <div class="info">
               <div class="iconContainer">
                 <i class="fa-solid fa-link"></i>
               </div>
               <p>
                 www.tvone.ao
               </p>
             </div>
           </div>
         </div>
       </div>

       <div class="rightContainer">
         <form method="post" action="<?= urlProject(CONTROLLERS . "/messagesControllers.php") ?>" class="formContact">
           <h1>
             Publicidade & parceria
           </h1>

           <input type="text" placeholder="Nome*" name="name_ms" class="inputForm">
           <input type="text" placeholder="E-mail*" name="email_ms" class="inputForm">

           <textarea id="" cols="30" rows="6" name="message_ms">  Sua Mensagem*</textarea>

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