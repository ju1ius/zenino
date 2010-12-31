<?php

class LfmMathUtil
{
  /**
   * Fixes php negative numbers modulus:
   * -1 % 12 returns -1
   * LfmMathUtil::modulus(-1, 12) returns 11
   * @returns int
   */
  static public function modulus($a, $b)
  {
    return ($a < 0) ? (int)( $a - $b * floor($a / $b) ) : $a % $b;
  }
}
