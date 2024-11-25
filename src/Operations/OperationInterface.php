<?php
namespace App\Operations;

/**
 * Interface pour les opérations mathématiques.
 */
interface OperationInterface {
    /**
     * Effectue une opération entre deux opérandes.
     *
     * @param float|int $a Première opérande
     * @param float|int $b Deuxième opérande
     * @return float|int Résultat de l'opération
     */
    public function calculate($a, $b);
}