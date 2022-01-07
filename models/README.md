# Entrainement de nouveau modeles

Il est possible de générer de nouveaux modèles en prenant en compte de nouveaux datasets. 
La liste **loadDataPath** est une liste de chemin de fichier qui doivent être chargés pour former le dataset.
Le notebook ne prend en compte que des fichiers au format csv relatif bureaux votes.

La cellule *Creation de modele* permet de générer des modèles et de les évaluer. Si les performances de l'ensemble des modèles ne vous convient pas il est possible de trouver de meilleurs modèles en re-lancant la cellule *Creation de modele*.  (temps d'exécution moyen: 15 min). Il est aussi possible de trouver un meilleur modèle pour un nombre spécifique de duel, dans ce cas il faut préciser au paramètre **duelList** de la fonction **getBestModel()** les duels pour lesquels on veut générer de meilleurs modèles. 

Pour tester d'autres fonctions d'activations lors de la recherche du meilleur modèle, il est possible de spécifier le nom de ces fonctions dans la liste **activations** (Cf la documentation de keras pour avoir le nom des fonctions utilisables).

Lorsque tous les modèles vous conviennent, vous pouvez enregistrer vos modèles à l'aide de la fonction **trainFinalModels()**.
Les modèles enregistrés de cette façon doivent être convertis à l'aide du fichier **convertKerasModelToJS.py** afin que le le site web puisse charger nos modèles. Il faut ensuite déplacer le contenu du dossier js dans le dossier **../web/models**.


Remarque : la cellule **fake prédiction** dans **Stilection_Bvot_model.ipynb** simule une prédiction sur les données des élections de 2015 car nous n'avons pas eu le temps d'intégrer les données de 2021 dans la base de données du site. Les prédictions du site sont faites à partir des données d'entrainement de l'IA.