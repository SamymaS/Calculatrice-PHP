<?php
namespace App\Operations;

/**
 * Classe pour l'opération d'addition
 */
class Addition implements OperationInterface {
    /**
     * Effectue l'addition de deux valeurs
     *
     * @param mixed $a Première valeur
     * @param mixed $b Deuxième valeur
     * @return mixed Résultat de l'addition
     */
    public function calculate($a, $b) {
        return $a + $b;
    }
}
