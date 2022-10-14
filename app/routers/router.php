<?php

use CoffeeCode\Router\Router;

function router()
{

  $router = new Router(URL_BASE);

  $router->namespace("App\controllers");

  // ROTA DE BASE
  $router->group(null);
  // 1º parâmetro: Rota | 2º parâmetro: controller (o que será executado)
  // No controller: 1º parâmetro: o arquivo (onde tem a função) (ex.: Base) |  2º parâmetro: função (ex.: home)
  $router->get("/", "Base:home");
  $router->get("/login", "Base:login");
  $router->get("/about", "Base:about");
  $router->get("/contacts", "Base:contacts");

  // ROTA DE NEWS
  $router->group("/news");
  // $router->get("/", "Base:news");
  $router->get("/{page}", "Base:news");
  $router->get("/detailsNews/{news_id}", "Base:details");
  $router->get("/search/for/{search}/{page}", "Base:search");
  $router->get("/search/category/{category_name}/{page}", "Base:category");
  $router->get("/search/author/{author_name}/{page}", "Base:author");

  // ROTA DA DASHBOARD
  $router->group("/dashboard");
  $router->get("/", "Dash:login");
  $router->get("/global", "Dash:global");
  $router->get("/users", "Dash:users");
  $router->get("/news", "Dash:news");
  $router->get("/publicity", "Dash:publicity");
  $router->get("/categories", "Dash:categories");
  $router->get("/categories{function}", "Dash:categories");
  $router->get("/authors", "Dash:authors");
  $router->get("/messages", "Dash:messages");
  $router->get("/newsLetters", "Dash:newsLetters");
  $router->get("/comments", "Dash:comments");
  $router->get("/videos", "Dash:videos");

  // ROTA DE ERROS
  $router->group("/ops");
  $router->get("/{errocode}", "Base:error");


  $router->dispatch();
}