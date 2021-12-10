# Appro_automobile  test Monsieur ZAPO 
solution_test

#clone ou télécharger le projet  via le bouton vers code (cloner ou télécharger via zip)
# se mettre sur le chemin avec cd Appro puis entrez  la commande (composer install) pour installer toutes les dépendances dans vendor
# faire cd Appro => chemin/appro =>taper composer install
# recupérer le fichier .env dans mon email pour la création de la base de données avec symfony 

=> taper  les commandes cli php bin/console doctrine:database:create

=> lancer les commandes php bin/console doctrine:schema:update --force qui va  mettre à jour automatiquement la base de donnée pour les migrations existante 

l'entité toto existante.(table) vous pouvez aussi prendre le fichier toto.sql ci joints 

NB : j'ai rajouté 2 champs Name et Numbers  dans la migration table toto, vous trouvez ci joints une image de mes test qui présente le fonctionnel nickel  et le dossier zip du projet Symfony 

=> démarrez le projet avec la commande  symfony serve
