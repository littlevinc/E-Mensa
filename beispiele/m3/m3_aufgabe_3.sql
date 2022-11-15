SELECT * FROM gericht;

SELECT erfasst_am FROM gericht;

SELECT erfasst_am, name AS "Gerichtname" FROM gericht
    ORDER BY name;

SELECT name, beschreibung FROM gericht
    ORDER BY name ASC 
    LIMIT 5;

SELECT name, beschreibung FROM gericht
    ORDER BY name ASC
    OFFSET 5 ROWS
    FETCH NEXT 10 ROWS ONLY;

SELECT typ FROM allergen
    GROUP BY typ;

SELECT name FROM gericht
    WHERE name LIKE "K%";

SELECT id, name FROM gericht
    WHERE name LIKE '%suppe%';

SELECT * FROM kategorie
    WHERE eltern_id IS NULL;

UPDATE allergen
SET name = 'Kamut'
WHERE code = 'a6';

INSERT INTO `gericht` (`id`, `name`, `beschreibung`, `erfasst_am`, `vegan`, `vegetarisch`, `preis_intern`, `preis_extern`) VALUES
(21, 'Currywurst mit Pommes', 'Ein Klassiker der Gerichte', '2022-11-05', 0, 0, 2.5, 4.5);

INSERT INTO gericht_hat_kategorie(gericht_id, kategorie_id) VALUES (21, 3);






