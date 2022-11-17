
/*
    join for task 5 subtask 2)
*/
SELECT id, name, preis_intern, preis_extern, GROUP_CONCAT(code) AS 'allergene'  FROM gericht G LEFT JOIN gericht_hat_allergen K ON G.id = K.gericht_id GROUP BY name ORDER BY id LIMIT 5;


/* JOIN THAT WAS NOT WORKING CORRECTLY*/
SELECT name, preis_intern, preis_extern, GROUP_CONCAT(code) AS 'allergene' 
FROM gericht G OUTERS JOIN gericht_hat_allergen K ON G.id = K.gericht_id
GROUP BY all LIMIT 5;



/*
    Join that only displays allergens that are listed in the meals table
*/
SELECT G.name, H.code, H.name AS 'allergene' 
FROM gericht G 
    INNER JOIN gericht_hat_allergen K ON G.id = K.gericht_id
    INNER JOIN allergen H ON H.code = K.code
LIMIT 5;



/* query that returns basic meal info as well as all contained allergens (Task 1. and 2. )*/
SELECT id, name, preis_intern, preis_extern, GROUP_CONCAT(code) AS 'allergene'  FROM gericht G LEFT JOIN gericht_hat_allergen K ON G.id = K.gericht_id GROUP BY name ORDER BY id LIMIT 5


/* query that only prints allergens contained in the top 5 meals from gericht table */
SELECT DISTINCT A.code, A.name, A.typ FROM gericht_hat_allergen GCA INNER JOIN (SELECT id FROM gericht LIMIT 5) AS G ON G.id = GCA.gericht_id JOIN allergen A ON GCA.code = A.code ORDER BY A.code;