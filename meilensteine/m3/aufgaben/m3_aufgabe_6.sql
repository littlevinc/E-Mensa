SELECT id, name, beschreibung, GROUP_CONCAT(code)
FROM gericht G JOIN gericht_hat_allergen H ON G.id = H.gericht_id
GROUP BY id
ORDER BY G.id;

SELECT id, name, beschreibung, GROUP_CONCAT(code)
FROM gericht G LEFT JOIN gericht_hat_allergen H ON G.id = H.gericht_id
GROUP BY id
ORDER BY G.id;

SELECT *
FROM gericht G 
RIGHT JOIN gericht_hat_allergen H ON G.id = H.gericht_id
RIGHT JOIN allergen A ON H.code = A.code
ORDER BY id;

SELECT A.name AS "Kategorie", COUNT(G.name) AS "Anzahl Gerichte"
FROM gericht G
JOIN gericht_hat_kategorie K ON G.id = K.gericht_id
JOIN kategorie A ON A.id = K.kategorie_id
GROUP BY A.name;

SELECT A.name AS "Kategorie", COUNT(G.name) AS "Anzahl Gerichte"
FROM gericht G
JOIN gericht_hat_kategorie K ON G.id = K.gericht_id
JOIN kategorie A ON A.id = K.kategorie_id
GROUP BY A.name
HAVING COUNT(G.name) > 2; 