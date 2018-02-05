<?php

  namespace App\Core;

  /**
   *  Class Abstract Controller
   */
  abstract class AbstractController
  {
    protected function render($view, $params){
      // Render the required params
      foreach ($params as $key => $value) {
        ${$key} = $value;
      }
      include __DIR__ . "/../../views/{$view}.php";
    }
  }


?>
