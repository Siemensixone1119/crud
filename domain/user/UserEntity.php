<?php
namespace app\domain\user;
class UserEntity
{
  public $name;
  public $email;

  public function __construct($name, $email)
  {
    $this->name = $name;
    $this->email = $email;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getEmail(): string
  {
    return $this->email;
  }
}