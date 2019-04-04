<?php

namespace Classes\User;

class User
{
  public function __construct()
  {
  }

  public function create($userName, $passWord)
  {
    var_dump($userName . ' : ' . $passWord);
  }

}