/*Aufgabge 1*/
SELECT G.id, G.name, G.beschreibung, GROUP_CONCAT(H.code) AS "Allergen Code", GROUP_CONCAT(A.name) AS "Allergene"
FROM gericht G 
LEFT JOIN gericht_hat_allergen H ON G.id = H.gericht_id
LEFT JOIN allergen A On H.code = A.code
GROUP BY id
ORDER BY G.id;

/*Aufgabge 2*/
SELECT id, name, beschreibung, GROUP_CONCAT(code)
FROM gericht G LEFT JOIN gericht_hat_allergen H ON G.id = H.gericht_id
GROUP BY id
ORDER BY G.id;

/*Aufgabge 3*/
SELECT *
FROM gericht G 
RIGHT JOIN gericht_hat_allergen H ON G.id = H.gericht_id
RIGHT JOIN allergen A ON H.code = A.code
ORDER BY id;

/*Aufgabge 4*/
SELECT A.name AS "Kategorie", COUNT(G.name) AS "Anzahl Gerichte"
FROM gericht G
JOIN gericht_hat_kategorie K ON G.id = K.gericht_id
JOIN kategorie A ON A.id = K.kategorie_id
GROUP BY A.name;

/*Aufgabge 5*/
SELECT A.name AS "Kategorie", COUNT(G.name) AS "Anzahl Gerichte"
FROM gericht G
JOIN gericht_hat_kategorie K ON G.id = K.gericht_id
JOIN kategorie A ON A.id = K.kategorie_id
GROUP BY A.name
HAVING COUNT(G.name) > 2; 