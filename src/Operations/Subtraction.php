<?php
namespace App\Operations;

/**
 * Classe pour l'opération de soustraction
 */
class Subtraction implements OperationInterface {
    /**
     * Effectue la soustraction de deux valeurs
     *
     * @param mixed $a Première valeur
     * @param mixed $b Deuxième valeur
     * @return mixed Résultat de la soustraction
     */
    public function calculate($a, $b) {
        return $a - $b;
    }
}
