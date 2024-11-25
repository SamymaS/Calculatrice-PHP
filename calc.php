<?php
/**
 * Point d'entrée pour exécuter la calculatrice en ligne de commande.
 * 
 * Utilisation : php calc.php "3 + 4 * 2 / ( 1 - 5 )"
 */

require 'vendor/autoload.php';

use App\RPNCalculator;

$calculator = new RPNCalculator();

try {
    // Récupère l'expression saisie en ligne de commande
    $expression = implode(' ', array_slice($argv, 1));

    // Convertit l'expression en RPN
    $rpnExpression = $calculator->toRPN($expression);

    // Évalue l'expression RPN
    $result = $calculator->evaluateRPN($rpnExpression);

    // Affiche le résultat
    echo "Résultat : " . $result . PHP_EOL;
} catch (Exception $e) {
    // Affiche les erreurs rencontrées
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}