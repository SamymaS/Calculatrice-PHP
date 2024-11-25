<?php
namespace App\Operations;

/**
 * Classe pour l'opération de multiplication.
 */
class Multiplication implements OperationInterface {
    /**
     * Effectue la multiplication de deux valeurs.
     *
     * @param float|int $a Première valeur
     * @param float|int $b Deuxième valeur
     * @return float|int Résultat de la multiplication
     */
    public function calculate($a, $b) {
        return (float)$a * (float)$b;
    }
}