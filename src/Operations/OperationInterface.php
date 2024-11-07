<?php
namespace App\Operations;

/**
 * Interface pour toutes les opérations de calcul
 */
interface OperationInterface {
    /**
     * Méthode pour effectuer le calcul
     *
     * @param mixed $a Première valeur
     * @param mixed $b Deuxième valeur
     * @return mixed Résultat de l'opération
     */
    public function calculate($a, $b);
}
