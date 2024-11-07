<?php
namespace App\Operations;

/**
 * Classe pour l'opération de multiplication
 */
class Multiplication implements OperationInterface {
    /**
     * Effectue la multiplication de deux valeurs
     *
     * @param mixed $a Première valeur
     * @param mixed $b Deuxième valeur
     * @return mixed Résultat de la multiplication
     */
    public function calculate($a, $b) {
        return $a * $b;
    }
}