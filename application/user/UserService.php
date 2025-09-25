<?php

namespace app\application\user;

use app\domain\user\UserEntity;
use app\domain\user\UserRepositoryInterface;

class UserService
{

  private UserRepositoryInterface $userRepository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function register(string $name, string $email): void
  {
    $haveName = $this->userRepository->findByName($name);

    if ($haveName !== null) {
      throw new \Exception("Пользователь с таким именем уже существует");
    } else {
      $user = new UserEntity($name, $email);
      $this->userRepository->save($user);
    }
  }

  public function getUserById(int $id): ?UserEntity
  {
    return $this->userRepository->findById($id);
  }

  public function getUserByName(string $name): ?UserEntity
  {
    return $this->userRepository->findByName($name);
  }

  public function deleteUser(int $id): void
  {
    $user = $this->userRepository->findById($id);
    if ($user === null) {
      throw new \Exception("Такого пользователя не существует");
    } else {
      $this->userRepository->delete($id);
    }
  }

  public function listUsers(): array
  {
    return $this->userRepository->findAll();
  }
}