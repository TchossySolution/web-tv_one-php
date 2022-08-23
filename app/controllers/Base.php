<?php

namespace App\controllers;

use League\Plates\Engine;

class Base {

  private $templates;
  
  public function __construct() {
    $viewsPath = __DIR__ . BASE_VIEWS;
    $this->templates = new Engine($viewsPath);
  } 

  // HOME
  public function home():void{
    $page_name = "home";
    echo $this->templates->render($page_name, []);
  }

  // ABOUT US
  public function about():void{
    $page_name = "page";
    echo $this->templates->render($page_name, []);
  }

  // NEWS
  public function news():void{
    $page_name = "page";
    echo $this->templates->render($page_name, []);
  }
  public function details():void{
    $page_name = "page";
    echo $this->templates->render($page_name, []);
  }
  public function category():void{
    $page_name = "page";
    echo $this->templates->render($page_name, []);
  }

  // CONTACTS
  public function contacts():void{
    $page_name = "page";
    echo $this->templates->render($page_name, []);
  }

  // ERROS
  public function error(array $data):void{
    $page_name = "notFound";

    echo $this->templates->render($page_name, [
      "error" => $data["errocode"]
    ]);
    
  }
}