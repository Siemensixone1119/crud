<?php

namespace app\domain\user;

use app\domain\user\UserEntity;

interface UserRepositoryInterface
{
  public function findByName(string $name): ?UserEntity;
  public function findById(int $id): ?UserEntity;
  public function save(UserEntity $user): void;
  public function delete(int $id): void;
  public function findAll(): array;
}