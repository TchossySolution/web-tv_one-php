<?php

define('URL_BASE', "http://localhost/web-tv_one-php");
define('SITE', "Tv One");

define('FOLDER_BASE', "/app/views/base");
define('BASE_VIEWS', "/../views/base");

define('FOLDER_DASHBOAR', "/app/views/base");
define('DASHBOARD_VIEWS', "/../views/dashboard");


function urlProject(string $uri = null): string{
  if($uri){
    return URL_BASE . "/{$uri}";
  }

  return URL_BASE;
}