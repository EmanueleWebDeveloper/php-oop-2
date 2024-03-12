<?php

class OutOfStockException extends Exception
{
    public function __construct($message = "Il prodotto è esaurito", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
