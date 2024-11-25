<?php
namespace App\Operations;

/**
 * Classe pour l'opération de division.
 */
class Division implements OperationInterface {
    /**
     * Effectue la division de deux valeurs.
     *
     * @param float|int $a Première valeur
     * @param float|int $b Deuxième valeur
     * @return float|int Résultat de la division
     * @throws \Exception Si la division par zéro est tentée
     */
    public function calculate($a, $b) {
        if ((float)$b === 0.0) {
            throw new \Exception("Division par zéro.");
        }
        return (float)$a / (float)$b;
    }
}