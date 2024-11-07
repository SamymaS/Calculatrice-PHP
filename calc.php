<?php
require 'vendor/autoload.php';

use App\Calculator;

// Crée une instance de Calculator
$calculator = new Calculator();

// Récupère l'expression passée en arguments de la ligne de commande
$expression = implode(' ', array_slice($argv, 1));

try {
    // Calcule et affiche le résultat
    $result = $calculator->calculate($expression);
    echo "Résultat : " . $result . PHP_EOL;
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}
