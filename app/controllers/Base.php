<?php

namespace App\controllers;

use League\Plates\Engine;

class Base
{

  private $templates;

  public function __construct()
  {
    $viewsPath = __DIR__ . BASE_VIEWS;
    $this->templates = new Engine($viewsPath);
  }

  // HOME
  public function home(): void
  {
    $page_name = "home";
    echo $this->templates->render($page_name, []);
  }

  // NEWS
  public function news(): void
  {
    $page_name = "news";
    echo $this->templates->render($page_name, []);
  }
  public function details($newsId): void
  {
    $page_name = "detailsNews";
    echo $this->templates->render($page_name, ["newsId" => $newsId]);
  }
  public function search(): void
  {
    $page_name = "search";
    echo $this->templates->render($page_name, []);
  }
  public function category($categoryData): void
  {
    $page_name = "category";
    echo $this->templates->render($page_name, ["categoryData" => $categoryData]);
  }
  public function author($authorData): void
  {
    $page_name = "author";
    echo $this->templates->render($page_name, ["authorData" => $authorData]);
  }

  // CONTACTS
  public function contacts(): void
  {
    $page_name = "contacts";
    echo $this->templates->render($page_name, []);
  }

  // ERROS
  public function error(array $data): void
  {
    $page_name = "notFound";

    echo $this->templates->render($page_name, [
      "error" => $data["errocode"]
    ]);
  }
}