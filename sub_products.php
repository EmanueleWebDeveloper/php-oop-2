<?php

class FoodProduct extends AnimalProduct
{
    public function __construct($name, $price, $animalType)
    {
        parent::__construct($name, $price, $animalType);
    }
}

// Sottoclasse per i giocattoli
class ToyProduct extends AnimalProduct
{
    public function __construct($name, $price, $animalType)
    {
        parent::__construct($name, $price, $animalType);
    }
}


class ShelterProduct extends AnimalProduct
{
    public function __construct($name, $price, $animalType)
    {
        parent::__construct($name, $price, $animalType);
    }
}
