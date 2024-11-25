
# Projet de Calculatrice en PHP

## Description

Ce projet consiste à développer une calculatrice en ligne de commande en PHP, en utilisant une architecture logicielle propre, respectant les principes **SOLID** et **DRY**, tout en tirant parti de la notation polonaise inversée (RPN) pour gérer les priorités des opérateurs et les parenthèses. Le projet utilise **Composer** pour l'autoloading et suit une structure modulaire et extensible.

---

## Arborescence du Projet

```
Calculatrice/
├── public/                  # Dossier destiné aux éventuels fichiers accessibles publiquement
├── src/                     # Code source principal
│   ├── RPNCalculator.php    # Gestion des calculs via notation polonaise inversée
│   ├── README_RPN.md        # En savoir plus sur la Notation Polonaise Inversée (RPN)
│   └── Operations/          # Modules pour chaque type d'opération mathématique
│       ├── OperationInterface.php
│       ├── Addition.php
│       ├── Subtraction.php
│       ├── Multiplication.php
│       └── Division.php
├── Tests/                   # (Optionnel) Tests unitaires et fonctionnels
├── Vendor/                  # Dépendances gérées par Composer
├── calc.php                 # Point d'entrée pour exécuter la calculatrice
├── composer.json            # Configuration de Composer
├── composer.lock            # Verrouillage des dépendances de Composer
└── .gitignore               # Exclusion de fichiers inutiles pour Git
```

---

## Fonctionnalités Implémentées

1. **Gestion des Opérations Mathématiques de Base** :
   - Addition (`+`)
   - Soustraction (`-`)
   - Multiplication (`*`)
   - Division (`/`), avec gestion des erreurs pour la division par zéro.

2. **Support des Priorités et Parenthèses** :
   - Utilisation de la notation polonaise inversée pour gérer les priorités (`*`, `/` avant `+`, `-`).
   - Prise en charge des expressions avec parenthèses imbriquées.

3. **Architecture Modulaire et Extensible** :
   - Chaque opération (`Addition`, `Subtraction`, etc.) est implémentée comme une classe distincte respectant une interface commune (`OperationInterface`).
   - Possibilité d'ajout de nouvelles opérations mathématiques (comme les puissances ou les fonctions trigonométriques).

4. **Validation des Expressions** :
   - Vérification des caractères valides.
   - Vérification des parenthèses équilibrées.

5. **CLI pour le Calcul** :
   - Permet de calculer des expressions directement depuis la ligne de commande, par exemple :
     ```bash
     php calc.php "3 + 4 * 2 / ( 1 - 5 )"
     ```

---

## Étapes de Conception et de Réalisation

### 1. Initialisation du Projet avec Composer

- **Créer le projet** : Exécuter `composer init` pour générer `composer.json`.
- **Configurer l'autoloading** :
  ```json
  "autoload": {
      "psr-4": {
          "App\": "src/"
      }
  }
  ```
- **Générer l'autoloader** : `composer dump-autoload`.

### 2. Implémentation des Opérations Mathématiques

- Interface commune `OperationInterface.php` :
  ```php
  public function calculate($a, $b);
  ```
- Implémentation des opérations :
  - `Addition.php`, `Subtraction.php`, `Multiplication.php`, `Division.php`.

### 3. Classe `RPNCalculator`

- Convertit les expressions infixes en RPN.
- Évalue les expressions RPN.

### 4. Fichier Principal `calc.php`

- Point d'entrée pour exécuter les calculs depuis la ligne de commande.

---

## Utilisation

1. **Exécuter une Expression** :
   ```bash
   php calc.php "3 + 4 * 2 / ( 1 - 5 )"
   ```
   Résultat attendu : `1`.

2. **Ajouter des Tests** :
   - Optionnellement, ajouter des tests unitaires pour valider les fonctionnalités.

---

## Principes Respectés

- **SOLID** :
  - Responsabilité unique : Chaque classe a une seule responsabilité.
  - Ouvert/Fermé : Les classes sont ouvertes à l'extension, fermées à la modification.
- **DRY** : Pas de duplication inutile dans le code.
- **KISS** : Structure simple et claire.

---

## À Faire

- Ajouter des tests unitaires (PHPUnit).
- Intégrer des fonctionnalités avancées comme les puissances ou les fonctions trigonométriques.
- Étendre les validations pour inclure des constantes comme `pi` ou `e`.

---

## Auteur

Projet développé par **Samy Boudaoud**.
