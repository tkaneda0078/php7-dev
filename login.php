<?php

require_once 'Classes/Auth/index.php';

use \Classes\Auth\Auth;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $auth = new Auth();

  $user_name = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

  // login
  $auth->login($user_name, $password);

}

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
      <button type="submit">Login</button>
    </form>
  </body>
</html>
