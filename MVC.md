# L'architecture MVC
    On considère cette architecture comme un design pattern

## Clarifier son code

On organise notre code en 3 parties:

    - Model: Class gérant la connexion entre la BDD et notre projet
    - View: Contient les templates de notre site
    - Controller: class centrale qui gère le transfert de données du model vers la view et inversement

### Les models

    Les models sont utilisés pour récupérer des données de la BDD ou envoyer des données traitées vers la celle-ci.
    
    Les données sont envoyées ou proviennent du controller.

### Les views
    Ce sont les templates de notre site. Ils ne contiennent que l'HTML et assurent l'affichage des données formatées reçues du controller.

### Les controllers
    Les controllers sont les noyaux du fonctionnement de l'architecture. Ils interceptent les données provenant des views ou des models et vont s'assurer
    de leur intégrité avant de les envoyer pour le traitement suivant.

    Il est l'entremetteur entre les views et les models.

