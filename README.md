# Sti'Lections

Ce projet a été réalisé dans le cadre du projet application à l'INSA Centre Val de Loire, qui a duré une semaine.
Le but est de réaliser des modèles d'intelligence artificielle afin de prédire les résultats d'élections. nous avons également réalisé une interface web interactive pour présenter nos résultats. Ce projet a été réalisé sur une raspberry pi et hébergé par nos soins, cependant il est possible de reproduire la même configuration pour tester le projet.

## Installation de l'interface web

1. Installer et configurer postgresql. Il faut créer un utilisateur pour le site et mettre les informations de connexion dans le fichier **web/traitement.php**. Cet utilisateur doit pouvoir lire les données de la base electionsdb.

2. Importer les bases de données en utilisant le fichier SQL.

3. Installer apache2, php et php-pgsql, et activer l'extension pdo-pgsql dans le fichier de configuration **php.ini**

4. Copier l'intégralité du contenu du dossier web/ dans **/var/www/hmtl**

## Récupérer des données non publiées au format csv (web scraping)

Voir **Get2021Result/README.md**

## Ajouter les données d'une nouvelle élection

1. Ajouter les données dans une nouvelle table sur la base de données, en s'assurant de respecter la convention de nommage et de format des données.

2. Modifier le fichier **web/traitement.php** pour ajouter une nouvelle année dans les switch/cases

## Entraîner de nouveaux modèles

Il est possible de traiter des données pour entraîner des modèles d'ia avec en utilisant le notebook jupyter **models/Stilection_Bvot_mmodel.ipynb** et toutes les fonctions qu'il implémente. Voir **models/README.md** pour plus d'informations.