# projetWeb_B2_DuplicateurDePost
## Pour installer et lancer le projet:
-   ouvrir vs code, dans vs ouvrir le dossier du projet.
-   dans un terminal sur vs code, se placer dans le même dossier
-   commandes à exécuter :

    -   composer install
    -   npm install
    -   symfony console doctrine:database:drop --force (seulement en cas de problèmes avec cette base de donnée)
    -   symfony console doctrine:database:create
    -   symfony console doctrine:schema:update --force
    -   symfony console doctrine:fixtures:load

Ensuite, lancez votre serveur Xampp ou Mampp, puis lancez le serveur symfony en ligne de commande avec :

-   symfony server:start

Et rendez-vous sur votre navigateur, sur localhost:8000/connexion.