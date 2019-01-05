<?php

namespace oop_mvc\controllers;

use oop_mvc\models\model;

class page
{
  public function view()
  {
    $model = new model();
    $page = $model->getPage();

    $this->render('view', [
      'title' => $page['title'],
      'header' => $page['header'],
      'text' => $page['text'],
    ]);
  }

  public function index()
  {
    $model = new model();
    $page = $model->getPage();

    $this->render('index', [
      'title' => $page['title'],
      'header' => $page['header'],
    ]);
  }

  protected function render($viewName, array $variables)
  {
    extract($variables, EXTR_OVERWRITE);
    require_once "views/$viewName.php";
  }
}