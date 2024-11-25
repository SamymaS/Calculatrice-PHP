<?php
namespace App\Operations;

/**
 * Classe pour l'opération d'addition.
 */
class Addition implements OperationInterface {
    /**
     * Effectue l'addition de deux valeurs.
     *
     * @param float|int $a Première valeur
     * @param float|int $b Deuxième valeur
     * @return float|int Résultat de l'addition
     */
    public function calculate($a, $b) {
        return (float)$a + (float)$b;
    }
}