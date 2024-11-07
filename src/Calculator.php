<?php
namespace App;

use App\Operations\Addition;
use App\Operations\Subtraction;
use App\Operations\Multiplication;
use App\Operations\Division;

/**
 * Classe principale pour effectuer les calculs
 */
class Calculator {
    /**
     * Interprète et calcule une expression mathématique
     *
     * @param string $expression Expression mathématique
     * @return mixed Résultat du calcul
     * @throws \Exception Si l'opérateur n'est pas reconnu
     */
    public function calculate($expression) {
        // Divise l'expression en parties
        $tokens = explode(' ', $expression);
        
        // Initialise le résultat avec la première valeur
        $result = array_shift($tokens);

        // Boucle à travers les opérateurs et les valeurs
        while (count($tokens) > 1) {
            $operator = array_shift($tokens);
            $operand = array_shift($tokens);

            // Effectue l'opération en fonction de l'opérateur
            switch ($operator) {
                case '+':
                    $result = (new Addition())->calculate($result, $operand);
                    break;
                case '-':
                    $result = (new Subtraction())->calculate($result, $operand);
                    break;
                case '*':
                    $result = (new Multiplication())->calculate($result, $operand);
                    break;
                case '/':
                    $result = (new Division())->calculate($result, $operand);
                    break;
                default:
                    throw new \Exception("Opérateur non pris en charge : $operator");
            }
        }

        return $result;
    }
}
