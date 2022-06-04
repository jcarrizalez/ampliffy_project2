<?php

/**
* - Proyecto 2, depende de varios repositorios:
*		- Librería 2 (carrito de compras)
*			- Librería 4 (personas)
*				- Librería 7 (country-list)
*			- Librería 5 (carbon)
*		- Librería 6 country-list
*/

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once __DIR__.'/vendor/autoload.php';

use Ampliffy\Library2\ShoppingCart;
use Ampliffy\Library4\Person;
use Ampliffy\Library4\Person\GenrePerson;
use Carbon\Carbon;

#uso de Librería 4 y Librería 6
$genre = new GenrePerson(GenrePerson::MALE);
$codeCountry  = 'ARG';
$person = new Person('Juan', 'Carrizalez', 39, $genre, $codeCountry);

echo "\nPersona: {$person->getName()} {$person->getSurname()}";

#uso de Librería 2, Librería 1, Librería 7 y Librería 5
$shoppingCart = new ShoppingCart($person, $codeCountry);
$shoppingCart->addItem(1);
$shoppingCart->addItem(2);

echo "\nFecha Creacion: {$shoppingCart->getDate()}";

foreach ($shoppingCart->getItems() as $key => $comprar) {

	echo "\nCompra{$key}: {$comprar}";
}
#uso de Librería 3
echo "\nFecha Procesar: ".Carbon::now();
?>