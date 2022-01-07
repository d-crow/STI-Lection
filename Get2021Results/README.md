# Web scrapper

Les fichiers dans ce dossier nous ont permi de récupérer les données de 2021 directement depuis le site du gouvernement en interprétant les différentes pages en html pour extraire les données nécessaires au format csv.

## Prérequis

Vérifiez que vous avez bien installé [Scrapy](https://scrapy.org)
```bash
python -m pip install scrapy
```

## Utilisation

Pour extraire les données au niveau cantonnal, il faut utiliser la commande suivante :

```bash
scrapy runspider GetCantons.py -O cantons.csv
```

Pour les autres échelles il suffit d'adapter la commande.


**Attention, le script dépend entièrement du site web du gouvernement, qui peut changer à tout moment. Avant utilisation veuillez adapter le script aux éventuels changements.**
