<?php
namespace App\Operations;

/**
 * Classe pour l'opération de soustraction.
 */
class Subtraction implements OperationInterface {
    /**
     * Effectue la soustraction de deux valeurs.
     *
     * @param float|int $a Première valeur
     * @param float|int $b Deuxième valeur
     * @return float|int Résultat de la soustraction
     */
    public function calculate($a, $b) {
        return (float)$a - (float)$b;
    }
}