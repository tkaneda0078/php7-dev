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
    if (isset($_SESSION['username'])) {
      header('Location: /test');
      exit;
    }

    // 事前に生成したハッシュパスワード
    $this->hash_password = ['root' => '$2y$10$IF4fHxASqpMBJ3saheImwOsUW2MzZ51AjfP/9UDyBz/vfYBRw1Ddm'];

  }

  /**
   * login
   *
   * @param string $user_name
   * @param string $password
   * @return void
   */
  public function login(string $user_name, string $password): void
  {
    if (password_verify($password, $this->hash_password[$user_name])) {
      session_regenerate_id(true);
      $_SESSION['username'] = $user_name;
      header('Location: /hello');
      exit;
    }
  }

  /**
   * logout
   */
  public function logout(): void
  {
    $_SESSION = [];
    session_destroy();
    header('Location: /login');
  }

}