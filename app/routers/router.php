<?php

use CoffeeCode\Router\Router;

function router(){

  $router = new Router(URL_BASE);

  $router -> namespace("App\controllers");
  
// ROTA DE BASE
  $router -> group(null);
  // 1º parâmetro: Rota | 2º parâmetro: controller (o que será executado)
  // No controller: 1º parâmetro: o arquivo (onde tem a função) (ex.: Base) |  2º parâmetro: função (ex.: home)
  $router -> get("/", "Base:home");
  $router -> get("/about", "Base:about");
  $router -> get("/contacts", "Base:contacts");
  
// ROTA DE NEWS
  $router -> group("/news");
  $router -> get("/", "Base:news");
  $router -> get("/{page}", "Base:news");
  $router -> get("/detailsNews/{news_id}", "Base:details");
  $router -> get("/categories/{category_id}", "Base:category");
  
  
// ROTA DA DASHBOARD
  $router -> group("/dashboard");
  $router -> get("/", "Dash:home");
 
    
// ROTA DE ERROS
  $router -> group("/ops");
  $router -> get("/{errocode}", "Base:error");
  
  
  $router -> dispatch();
  
  if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
  }
}