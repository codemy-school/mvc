<?php

// Автоподгрузка классов
spl_autoload_register(function ($class) {
  $filename = '../' . str_replace('\\', '/', $class) . '.php';

  if (!file_exists($filename)) {
    throw new \Exception("Класс '$class' отсутствует");
  }

  include $filename;
});

try {
  // Проверка, что передан контроллер
  if (empty($_GET['c'])) {
    throw new \Exception('Не передан GET-параметр \'c\'');
  }
  $controllerName = 'oop_mvc\\controllers\\' . $_GET['c'];

  // Создание экземпляра контроллера
  $controller = new $controllerName;
  // Если не передали необходимое действие, по умолчанию берем index
  $action = empty($_GET['a']) ? 'index' : $_GET['a'];

  if (!method_exists($controller, $action)) {
    throw new \Exception("Метод '$action()' отсутствует в классе '$controllerName");
  }

  // Вызов необходимого действия
  $controller->{$action}();

} catch (\Exception $exception) {
  echo $exception->getMessage();
}