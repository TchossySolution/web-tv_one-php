<?php

namespace App\controllers;

use League\Plates\Engine;

class Dash
{
  private $templates;

  public function __construct()
  {
    $viewsPath = __DIR__ . DASHBOARD_VIEWS;
    $this->templates = new Engine($viewsPath);
  }
  public function global($data)
  {
    $page_name = "global";
    echo $this->templates->render($page_name, $data);
  }
  public function users($data)
  {
    $page_name = "users";
    echo $this->templates->render($page_name, $data);
  }
  public function news($data)
  {
    $page_name = "news";
    echo $this->templates->render($page_name, $data);
  }
  public function publicity($data)
  {
    $page_name = "publicity";
    echo $this->templates->render($page_name, $data);
  }
  public function categories($data)
  {
    $page_name = "categories";
    echo $this->templates->render($page_name, $data);
  }
  public function authors($data)
  {
    $page_name = "authors";
    echo $this->templates->render($page_name, $data);
  }
  public function messages($data)
  {
    $page_name = "messages";
    echo $this->templates->render($page_name, $data);
  }
  public function newsLetters($data)
  {
    $page_name = "newsLetters";
    echo $this->templates->render($page_name, $data);
  }
  public function comments($data)
  {
    $page_name = "comments";
    echo $this->templates->render($page_name, $data);
  }
  public function login($data)
  {
    $page_name = "login";
    echo $this->templates->render($page_name, $data);
  }

  public function error($data)
  {
    echo " <h1> Erro Dash {$data["errocode"]} </h1> ";
    var_dump($data);
  }
}