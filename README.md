# Appro_automobile  test Monsieur ZAPO 
solution_test

#clone ou télécharger le projet  via le bouton vers code (cloner ou télécharger via zip)
# se mettre sur le chemin avec cd Appro puis entrez  la commande (composer install) pour installer toutes les dépendances dans vendor
# faire cd Appro => chemin/appro =>taper composer install
# le fichier .env definit déja  la creation de ma base de données Mysql  le nom :my_list_toto

=> taper  la commandes cli php bin/console doctrine:database:create

=> lancer la commandes php bin/console doctrine:schema:update --force qui va  mettre à jour automatiquement la base de donnée pour les migrations existante 


NB : j'ai rajouté 2 champs Name et Numbers  dans la migration table toto, vous trouvez ci joints une image de mes test qui présente le fonctionnel nickel  et le dossier zip du projet Symfony 

=> démarrez le projet avec la commande  symfony serve

=>l'objectif etait d'identifier le projet sur codelginter qui était la création des action crud avec l'entité de model toto.(create,update,delete,listing..).
