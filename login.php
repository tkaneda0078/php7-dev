<?php

require_once 'Classes/Auth/index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $auth = new \Classes\Auth\Auth();

  $user_name = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

  if ($auth->login($user_name, $password)) {
    var_dump('success');
  } else {
    var_dump('failure');
  }

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
