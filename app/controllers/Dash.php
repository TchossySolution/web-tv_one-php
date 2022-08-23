<?php

namespace App\controllers;

use League\Plates\Engine;

class Dash {
  private $templates;

  public function __construct() {
    $viewsPath = __DIR__ . DASHBOARD_VIEWS;
    $this->templates = new Engine($viewsPath);
  } 

  public function home($data){
    $page_name = "home";
    echo $this->templates->render($page_name, $data);
  }

  public function error($data){
    echo " <h1> Erro Dash {$data["errocode"]} </h1> ";
    var_dump($data);
  } 
}