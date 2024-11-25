
# RPNCalculator : Notation Polonaise Inversée (RPN)

## Qu'est-ce que la RPN ?

La **notation polonaise inversée (RPN)** est une façon d'écrire des expressions mathématiques où les opérateurs (comme `+`, `-`, `*`, `/`) sont placés **après** les nombres, au lieu d'être entre eux comme en notation classique.

### Exemple :

- **Notation classique (infixe)** : `3 + 4 * 2`
- **Notation RPN (postfixe)** : `3 4 2 * +`

En RPN :
1. Les priorités des opérateurs (`*`, `/` avant `+`, `-`) sont déjà gérées par l'ordre des éléments.
2. Les parenthèses deviennent inutiles.

---

## Pourquoi utiliser la RPN dans `RPNCalculator` ?

La RPN permet de :
- Gérer les **priorités des opérateurs** et les **parenthèses** de manière implicite.
- Simplifier l'algorithme d'évaluation à l'aide d'une **pile**.
- Faciliter l'extension pour ajouter de nouvelles opérations.

---

## Fonctionnalités de `RPNCalculator`

1. **Conversion en RPN** :
   La méthode `toRPN($expression)` convertit une expression infixe en notation RPN.
   - Exemple : `3 + 4 * 2` → `3 4 2 * +`

2. **Évaluation des expressions RPN** :
   La méthode `evaluateRPN($tokens)` évalue une expression en RPN.
   - Exemple : `3 4 2 * +` → `11`

3. **Validation des expressions** :
   - Vérification des parenthèses équilibrées.
   - Vérification des caractères autorisés.

---

## Comment utiliser RPNCalculator dans votre code ?

### Étape 1 : Inclure le fichier `RPNCalculator`

Assurez-vous que `RPNCalculator.php` et ses dépendances (opérations) sont correctement inclus dans votre projet via Composer ou un autoloader.

### Étape 2 : Créer une instance de `RPNCalculator`

```php
use App\RPNCalculator;

$calculator = new RPNCalculator();
```

### Étape 3 : Convertir une expression en RPN

```php
$expression = "3 + 4 * 2 / ( 1 - 5 )";
$rpnExpression = $calculator->toRPN($expression);
print_r($rpnExpression);
// Résultat : [3, 4, 2, *, 1, 5, -, /, +]
```

### Étape 4 : Évaluer l'expression RPN

```php
$result = $calculator->evaluateRPN($rpnExpression);
echo "Résultat : " . $result . PHP_EOL;
// Résultat : 1
```

### Étape 5 : Gérer les erreurs

Ajoutez un bloc `try-catch` pour gérer les erreurs éventuelles, comme les opérateurs inconnus ou les expressions mal formées.

```php
try {
    $expression = "3 + 4 * 2 / ( 1 - 5 )";
    $rpnExpression = $calculator->toRPN($expression);
    $result = $calculator->evaluateRPN($rpnExpression);
    echo "Résultat : " . $result . PHP_EOL;
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}
```

---

## Exemple Complet

```php
<?php
require 'vendor/autoload.php';

use App\RPNCalculator;

try {
    $calculator = new RPNCalculator();
    $expression = "3 + 4 * 2 / ( 1 - 5 )";
    
    // Conversion en RPN
    $rpnExpression = $calculator->toRPN($expression);
    echo "Expression RPN : " . implode(' ', $rpnExpression) . PHP_EOL;

    // Évaluation
    $result = $calculator->evaluateRPN($rpnExpression);
    echo "Résultat : " . $result . PHP_EOL;
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}
```

---

## Avantages de la RPN

- **Clarté et efficacité** : Les parenthèses ne sont pas nécessaires.
- **Extensibilité** : Facile d'ajouter de nouvelles opérations.
- **Simplicité de calcul** : L'évaluation est réalisée en une seule passe grâce à une pile.

---

Pour toute question ou contribution, n'hésitez pas à contacter l'équipe de développement ou à ouvrir une issue sur le dépôt GitHub.
