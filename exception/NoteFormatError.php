<?php

class NoteFormatError extends ErrorException
{
  public function __construct($note)
  {
    parent::__construct(sprintf('Unknown note format "%s"', $note));
  }
}