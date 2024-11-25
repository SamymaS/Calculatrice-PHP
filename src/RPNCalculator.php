<?php
namespace App;

use App\Operations\Addition;
use App\Operations\Subtraction;
use App\Operations\Multiplication;
use App\Operations\Division;

class RPNCalculator {
    private $operations;

    public function __construct() {
        /**
         * Associe les opérateurs aux classes correspondantes
         */
        $this->operations = [
            '+' => new Addition(),
            '-' => new Subtraction(),
            '*' => new Multiplication(),
            '/' => new Division()
        ];
    }

    /**
     * Valide une expression mathématique avant conversion en RPN.
     *
     * @param string $expression L'expression mathématique en notation infixe
     * @throws \Exception Si l'expression est invalide
     */
    private function validateExpression($expression) {
        // Vérifie les caractères non valides
        if (!preg_match('/^[\d\s\+\-\*\/\(\)]+$/', $expression)) {
            throw new \Exception("Expression invalide. Caractères non autorisés.");
        }

        // Vérifie les parenthèses équilibrées
        $parentheses = 0;
        foreach (str_split($expression) as $char) {
            if ($char === '(') $parentheses++;
            if ($char === ')') $parentheses--;
            if ($parentheses < 0) {
                throw new \Exception("Parenthèses déséquilibrées.");
            }
        }

        if ($parentheses !== 0) {
            throw new \Exception("Parenthèses non fermées.");
        }
    }

    /**
     * Convertit une expression infixe en notation polonaise inversée (RPN).
     *
     * @param string $expression L'expression mathématique en notation infixe
     * @return array L'expression convertie en RPN sous forme de tableau
     */
    public function toRPN($expression) {
        $this->validateExpression($expression); // Valide l'expression avant la conversion

        $output = [];
        $stack = [];
        $tokens = preg_split('/\s+/', $expression);

        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                // Ajoute les nombres directement à la sortie
                $output[] = $token;
            } elseif ($token === '(') {
                // Empile les parenthèses ouvrantes
                $stack[] = $token;
            } elseif ($token === ')') {
                // Dépile jusqu'à la parenthèse ouvrante correspondante
                while (end($stack) !== '(') {
                    $output[] = array_pop($stack);
                }
                array_pop($stack); // Retire la parenthèse ouvrante
            } else {
                // Vérifie que l'opérateur est valide
                if (!isset($this->operations[$token])) {
                    throw new \Exception("Opérateur inconnu : $token");
                }
                // Gère la priorité des opérateurs
                while (!empty($stack) && $this->getPrecedence(end($stack)) >= $this->getPrecedence($token)) {
                    $output[] = array_pop($stack);
                }
                $stack[] = $token;
            }
        }

        // Ajoute les opérateurs restants dans la pile à la sortie
        while (!empty($stack)) {
            $output[] = array_pop($stack);
        }

        return $output;
    }

    /**
     * Évalue une expression RPN.
     *
     * @param array $tokens Expression en notation polonaise inversée
     * @return float|int Résultat de l'expression
     * @throws \Exception Si l'expression est mal formée ou un opérateur est inconnu
     */
    public function evaluateRPN($tokens) {
        $stack = [];

        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                // Empile les nombres
                $stack[] = $token;
            } else {
                // Vérifie l'existence de l'opérateur
                if (!isset($this->operations[$token])) {
                    throw new \Exception("Opérateur inconnu : $token");
                }
                // Vérifie qu'il y a assez d'opérandes dans la pile
                if (count($stack) < 2) {
                    throw new \Exception("Expression RPN mal formée.");
                }

                $b = array_pop($stack);
                $a = array_pop($stack);
                // Applique l'opération
                $result = $this->operations[$token]->calculate($a, $b);
                $stack[] = $result;
            }
        }

        // Vérifie que la pile contient exactement un élément (le résultat final)
        if (count($stack) !== 1) {
            throw new \Exception("Expression RPN mal formée.");
        }

        return array_pop($stack);
    }

    /**
     * Renvoie la priorité de l'opérateur.
     *s
     * @param string $operator L'opérateur mathématique
     * @return int La priorité de l'opérateur
     */
    private function getPrecedence($operator) {
        switch ($operator) {
            case '+':
            case '-':
                return 1; // Priorité faible
            case '*':
            case '/':
                return 2; // Priorité moyenne
            default:
                return 0; // Opérateur inconnu
        }
    }
}