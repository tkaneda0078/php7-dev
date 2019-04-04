<?php

require_once 'Classes/Token/index.php';
require_once 'Classes/Auth/index.php';

use \Classes\Token\Token;
use \Classes\Auth\Auth;

session_start();

$auth = new Auth();
$token = new Token();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($token->validateToken(filter_input(INPUT_POST, 'csrf_token'))) {
    $user_name = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    // login認証
    $auth->login($user_name, $password);
  }
}

$csrf_token = $token->generateToken();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>login</title>
  </head>
  <body>
    <form action="login.php" method="post">
      <h1>Times Square</h1>
      <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
      <button type="submit">Login</button>
    </form>
  </body>
</html>
