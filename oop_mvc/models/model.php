<?php

namespace oop_mvc\models;


class model
{
  public function getPage() {
    return [
      'title' => 'ООП версия MVC',
      'header' => 'Заголовок',
      'text' => 'Полный текст статьи',
    ];
  }
}