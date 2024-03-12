<?php

include './OutOfStockException.php';
include './trait.php';
include './product.php';
include './animal_product.php';
include './sub_products.php';

$products = [];

$products[] = new FoodProduct("carne secca", 2.99, "Cane");
$products[] = new FoodProduct("pesce secco ", 3.50, "Gatto");

$products[] = new ToyProduct("osso per cani", 5.90, "Cane");
$products[] = new ToyProduct("palla", 5.50, "Gatto");

$products[] = new ShelterProduct("cuscino", 15.99, "Cane");
$products[] = new ShelterProduct("guinzaglio", 5.50, "Gatto");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Classes 2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-capitalize">my pet shop</h1>
    <div class='container'>
        <div class='row'>
            <?php

            foreach ($products as $product) {

                $category_name = '';
                $class_stock = '';

                if ($product instanceof FoodProduct) {
                    $category_name = 'Food';
                } elseif ($product instanceof ToyProduct) {
                    $category_name = 'Game';
                } elseif ($product instanceof ShelterProduct) {
                    $category_name = 'Product';
                }

                $rand_num = rand(0, 40);
                $stock_product = $product->setQuantity($rand_num);

                if ($rand_num < 10) {
                    $class_stock = 'text-danger';
                } elseif ($rand_num < 25) {
                    $class_stock = 'text-warning';
                } else {
                    $class_stock = 'text-success';
                }

                echo "<div class='card col-4'>
                        <img class='card-img-top' src='https://picsum.photos/200/300' alt='Title' />
                        <div class='card-body'>
                            <h4 class='card-title'>{$product->getName()}</h4>
                            <p class='card-text'>{$product->getPrice()}€</p>
                            <div class='d-flex justify-content-between'>
                                <span class='card-text'>Type: {$category_name}</span>
                                <span class='card-text'>{$product->getAnimalType()}</span>";

                try {
                    if ($rand_num === 0) {
                        throw new OutOfStockException();
                    }

                    echo "<span class='{$class_stock}'>{$stock_product}</span>                       
                            </div>
                        </div>
                    </div>";
                } catch (OutOfStockException $e) {
                    echo "<span class='{$class_stock}'>{$e->getMessage()}</span>
                        </div>
                    </div>
                </div>";
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
