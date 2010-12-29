<?php

class RangeError extends ErrorException
{
  public function __construct($int, $range)
  {
    parent::__construct(sprintf('Integer "%d" not in range "%s"', $int, $range));
  }
}