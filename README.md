
# Projet de Calculatrice en PHP

## Description

Ce projet consiste à développer une calculatrice en ligne de commande en PHP, en utilisant une architecture logicielle propre avec Composer et des principes .

## Arborescence du Projet

L'arborescence du projet est la suivante :

```
Calculatrice/
├── public/
├── src/
│   ├── Calculator.php
│   └── Operations/
│       ├── OperationInterface.php
│       ├── Addition.php
│       ├── Subtraction.php
│       ├── Multiplication.php
│       └── Division.php
├── Tests/
├── Vendor/
├── calc.php
├── composer.json
├── composer.lock
├── plan.txt
└── .gitignore
```

- **`public/`** : Dossier destiné aux éventuels fichiers accessibles publiquement (non utilisé dans ce projet).
- **`src/`** : Contient le code source principal, y compris la classe `Calculator.php` et les opérations de calcul.
- **`Tests/`** : Contient les tests unitaires (si ajoutés ultérieurement et non utilisé dans ce projet).
- **`Vendor/`** : Contient les dépendances installées par Composer.
- **`calc.php`** : Point d'entrée pour exécuter la calculatrice en ligne de commande.
- **`composer.json`** et **`composer.lock`** : Fichiers de configuration de Composer.
- **`.gitignore`** : Fichier pour exclure certains fichiers et dossiers de Git, comme `vendor/`.

## Étapes de Conception et de Réalisation

### 1. Initialisation du Projet avec Composer

1. **Créer un nouveau projet avec Composer** :
   - Exécutez `composer init` pour initialiser Composer dans le dossier du projet et configurer le fichier `composer.json`.
   - Fournissez les informations requises, telles que le nom du projet, la description, le type, l'auteur, la licence, etc.
   - Choisissez `project` comme type de package, et `MIT` (ou autre) comme licence.

2. **Ajouter l'autoloading PSR-4** :
   - Dans `composer.json`, ajoutez la configuration suivante sous la clé `"autoload"` :
     ```json
     "autoload": {
         "psr-4": {
             "App\": "src/"
         }
     }
     ```
   - Cela indique à Composer de charger automatiquement les classes sous le namespace `App` à partir du dossier `src/`.

3. **Générer l’autoloader** :
   - Exécutez `composer dump-autoload` pour créer le fichier `vendor/autoload.php`, qui chargera automatiquement les classes.
   - Cela permet d'importer les classes sans utiliser `require` ou `include` pour chaque fichier.

### 2. Création de l'Interface des Opérations

1. **Interface `OperationInterface.php`** :
   - Créez un fichier `OperationInterface.php` dans `src/Operations/`.
   - Cette interface définit une méthode `calculate` pour standardiser et avoir un modèle pour les classes de calcul.

### 3. Création des Classes d'Opérations

1. **Créer les fichiers d'opérations** :
   - Créez les fichiers `Addition.php`, `Subtraction.php`, `Multiplication.php`, et `Division.php` dans `src/Operations/`.
   - Chaque classe implémente `OperationInterface` et définit la logique de calcul pour chaque opération (`+`, `-`, `*`, `/`).

2. **Implémenter chaque opération** :
   - Exemple pour l'addition (`Addition.php`) :
     ```php
     <?php
     namespace App\Operations;

     class Addition implements OperationInterface {
         public function calculate($a, $b) {
             return $a + $b;
         }
     }
     ```

3. **Gérer les erreurs spécifiques** :
   - Dans `Division.php`, ajoutez une gestion d'exception pour éviter la division par zéro (à faire).

### 4. Création de la Classe Principale `Calculator`

1. **Créer `Calculator.php`** dans `src/` :
   - Cette classe est responsable de l'interprétation des expressions mathématiques et d'exécuter les opérations en utilisant les classes `Addition`, `Subtraction`, etc.

2. **Méthode `calculate` dans `Calculator.php`** :
   - Cette méthode analyse l'expression et applique chaque opération dans l'ordre des arguments.
   - Exemple d'utilisation :
     ```php
     $calculator = new Calculator();
     echo $calculator->calculate("12 + 32 - 54");
     ```

### 5. Création du Fichier Principal `calc.php`

1. **Créer `calc.php` à la racine du projet** :
   - Ce fichier est le point d’entrée pour utiliser la calculatrice en ligne de commande.

2. **Utilisation de `calc.php`** :
   - Combine les arguments de la ligne de commande en une expression mathématique.
   - Appelle la classe `Calculator` pour exécuter le calcul.
   - Exemple de commande :
     ```bash
     php calc.php 12 + 32 - 54
     ```

### 6. Configuration de Git

1. **Initialiser Git** :
   - Exécutez `git init` dans le dossier du projet.
   - Ajoutez un fichier `.gitignore` pour ignorer `vendor/` et d’autres fichiers générés.

2. **Commit Initial** :
   - Commitez les fichiers du projet après chaque étape importante pour garder un historique clair.

### 7. Tests et Débogage

1. **Tests manuels** :
   - Testez différentes expressions pour vous assurer que chaque opération est correctement calculée.
2. **Tests unitaires (optionnel)** :
   - Si vous le souhaitez, ajoutez des tests unitaires dans le dossier `Tests/` en utilisant une bibliothèque comme PHPUnit pour valider les fonctionnalités.

### 8. Résumé des Commandes Importantes

- **`composer init`** : Initialiser Composer pour créer `composer.json`.
- **`composer install`** : Installer les dépendances du projet.
- **`composer dump-autoload`** : Générer l'autoloader de Composer pour charger automatiquement les classes.
- **`php calc.php <expression>`** : Exécuter le fichier `calc.php` pour calculer une expression.
