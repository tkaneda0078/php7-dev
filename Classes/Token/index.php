<?php

namespace Classes\Token;

/**
 * Class Token
 * @package Classes\Token
 */
class Token
{
  /**
   * generate token
   *
   * @return string
   */
  public function generateToken() : string
  {
    return hash('sha256', session_id());
  }

  /**
   * validate token
   *
   * @param $token
   * @return bool
   */
  public function validateToken($token): bool
  {
    return $token === $this->generateToken();
  }

}