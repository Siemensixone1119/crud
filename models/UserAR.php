<?php
namespace app\models;
class UserAR extends \yii\db\ActiveRecord
{
  public static function tableName(): string
  {
    return "users";
  }
}