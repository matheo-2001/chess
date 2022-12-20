#Cours POO 

## Projet en automonie : SOLID

### - S : Single Responsibility Principle (SRP)

Pour rappel : "Une classe ne doit avoir q'une seul et unique responsabilité"

**Pourquoi utiliser le principe de responsabilité unique ?**

Le principe de responsabilité unique permet de séparer par fichier les classes permettant :
- D'obtenir un code plus clair
- Chaque fichier a donc sa propre fonctionnalité
- Plus facile a récupérer par d'autres dev permettant de lui faciliter l'évolution du projet
- D'obtenir une meilleure arborescence du projet

### - O : Open/Closed Principle

Pour rappel : "Les entités doivent être ouvertes à l'extension et fermées à la modification"

**Pourquoi utiliser le principe ouvert/fermé ?**

Le principe ouvert/fermé permet d'étendre le comportement de la méthode et de ne pas changer le code source en fonction du paramètre reçu, j'ai donc utiliser implements permettant :
- D'obtenir un code plus clair
- D'obtenir moins de bugs

### - L : Liskov's Substitution Principle (LSP)

Pour rappel : "Les objets dans un programme doivent être remplaçables par des instances de leur sous-type sans pour autant altérer le bon fonctionnement du programme"

**Pourquoi utiliser le principe de substitution de Liskov ?**

Le principe de substitution de Liskov permet aux classes de respecter la définition du parent sans pour autant en faire plus ou moins. Il permet donc :
- D'obtenir une meilleure qualité du code
- D'éviter à un enfant de faire plus qu'un parent
