    
SELECT
    atelier.numero as numeroAtelier,
    atelier.theme as themeAtelier,
    atelier.date_heure as dateHeureAtelier,
    responsable.nom as nomResponsable,
    client.numero as numClient,
    client.prenom as prenomClient,
    participer.date_inscription as dateInscription
FROM atelier as atelier
    JOIN responsable as responsable
        ON atelier.responsable = responsable.numero
    JOIN participer as participer
        ON participer.atelier = atelier.numero
    JOIN client as client
        ON client.numero = participer.client
WHERE client.numero = 3 
    OR participer.atelier !=
        (SELECT atelier from participer where client = 3);  

SELECT
    atelier.numero as numeroAtelier,
    atelier.theme as themeAtelier,
    atelier.date_heure as dateHeureAtelier,
    responsable.nom as nomResponsable,
    client.numero as numClient,
    client.prenom as prenomClient,
    participer.date_inscription as dateInscription
FROM atelier as atelier
    JOIN responsable as responsable
        ON atelier.responsable = responsable.numero
    RIGHT OUTER JOIN participer as participer
        ON participer.atelier = atelier.numero
    JOIN client as client
        ON client.numero = participer.client
WHERE client.numero = 3 