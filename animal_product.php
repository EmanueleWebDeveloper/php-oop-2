<?php

abstract class AnimalProduct extends Product
{
    protected $animalType;

    public function __construct($name, $price, $animalType)
    {
        parent::__construct($name, $price);
        $this->animalType = $animalType;
    }

    public function getAnimalType()
    {
        return $this->animalType;
    }
}
