<?php

namespace Classes\Auth;

/**
 * Class Auth
 * @package Classes\Auth
 */
class Auth
{
  private $hash_password;

  public function __construct()
  {
    // 事前に生成したハッシュパスワード
    $this->hash_password = ['root' => '$2y$10$IF4fHxASqpMBJ3saheImwOsUW2MzZ51AjfP/9UDyBz/vfYBRw1Ddm'];

  }

  /**
   * login
   *
   * @param string $user_name
   * @param string $password
   * @return bool
   */
  public function login(string $user_name, string $password): bool
  {
    if (password_verify($password, $this->hash_password[$user_name])) {
      // todo : sessionにぶちこみ
      return true;
    }
    return false;
  }

}