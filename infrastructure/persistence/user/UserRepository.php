<?php

namespace app\infrastructure\persistence\user;

use app\domain\user\UserEntity;
use app\domain\user\UserRepositoryInterface;
use app\models\UserAR;

class UserRepository implements UserRepositoryInterface
{

    public function findByName(string $name): ?UserEntity
    {
        $row = UserAR::findOne(['name' => $name]);
        if ($row == null) {
            return null;
        }

        return new UserEntity($row->name, $row->email);
    }

    public function findById(int $id): ?UserEntity
    {
        $row = UserAR::findOne($id);

        if ($row === null) {
            return null;
        }

        return new UserEntity($row->name, $row->email);
    }

    public function save(UserEntity $user): void
    {
        $newUser = new UserAR();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->save();
    }

    public function delete(int $id): void
    {
        $user = UserAR::findOne($id);
        if ($user !== null) {
            $user->delete();
        }
    }

    public function findAll(): array
    {
        $users = UserAR::find()->all();
        $entityes = [];

        foreach ($users as $user) {
            $entityes[] = new UserEntity($user->name, $user->email);
        }
        return $entityes;
    }
}