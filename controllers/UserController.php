<?php
namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\application\user\UserService;
use app\infrastructure\persistence\user\UserRepository;


class UserController extends Controller
{
  public $enableCsrfValidation = false;
  public function actionRegister(): string
  {
    $name = Yii::$app->request->post("name");
    $email = Yii::$app->request->post("email");

    try {
      $service = new UserService(new UserRepository());
      $service->register($name, $email);
      return "Регистрация успешна!";
    } catch (\Exception $error) {
      return "Ошибка" . $error->getMessage();
    }
  }

  public function actionGetUser(int $id): string
  {
    $service = new UserService(new UserRepository());
    $user = $service->getUserById($id);
    if ($user !== null) {
      return "Имя:{$user->getName()}\nПочта: {$user->getEmail()}\n";
    } else {
      return "Пользователь не найден";
    }
  }

  public function actionDelete(int $id): string
  {
    $service = new UserService(new UserRepository());
    $user = $service->getUserById($id);
    if ($user === null) {
      return "Такого пользователя не существует";
    } else {
      $service->deleteUser($id);
      return "Пользователь удалён!";
    }
  }

  public function actionList(): string
  {
    $service = new UserService(new UserRepository());
    $listUsers = $service->listUsers();
    if (empty($listUsers)) {
      return "Пользователей нет";
    }
    $result = "";
    foreach ($listUsers as $user) {
      $result .= "Имя:{$user->getName()}\nПочта: {$user->getEmail()}\n";
    }
    return $result;
  }
}