<?php
namespace App\Operations;

/**
 * Classe pour l'opération de division
 */
class Division implements OperationInterface {
    /**
     * Effectue la division de deux valeurs
     *
     * @param mixed $a Première valeur
     * @param mixed $b Deuxième valeur
     * @return mixed Résultat de la division
     */
    public function calculate($a, $b) {
        return $a / $b;
    }
}
