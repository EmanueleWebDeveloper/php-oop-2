<?php

trait Quantity
{
    public $stock_number;

    public function setQuantity($num)
    {
        return $this->stock_number = $num . ' units';
    }
}
