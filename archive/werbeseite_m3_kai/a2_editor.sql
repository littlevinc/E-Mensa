use emensawerbeseite;

CREATE TABLE gericht
(
    id           INT8 PRIMARY KEY,
    name         VARCHAR(80) UNIQUE NOT NULL,
    beschreibung VARCHAR(800)       NOT NULL,
    erfasst_am   DATE               NOT NULL,
    vegetarisch  BOOLEAN            NOT NULL DEFAULT false,
    vegan        BOOLEAN            NOT NULL DEFAULT false,
    preis_intern DOUBLE             NOT NULL CHECK (preis_intern > 0 AND preis_intern <= preis_extern),
    preis_extern DOUBLE             NOT NULL
);


CREATE TABLE allergen
(
    code CHAR(4) PRIMARY KEY,
    name VARCHAR(300) NOT NULL,
    typ  VARCHAR(20)  NOT NULL DEFAULT 'allergen'
);


CREATE TABLE kategorie
(
    id        INT8 PRIMARY KEY,
    name      VARCHAR(80) NOT NULL,
    eltern_id INT8 REFERENCES kategorie (id),
    bildname  VARCHAR(200)
);


CREATE TABLE gericht_hat_allergen(
                                     code CHAR(4) REFERENCES allergen(code),
                                     gericht_id INT8 NOT NULL REFERENCES kategorie(id)
);

CREATE TABLE gericht_hat_kategorie(
                                      gericht_id INT8 NOT NULL REFERENCES gericht(id),
                                      kategorie_id INT8 NOT NULL REFERENCES kategorie(id)
);

#LADEN VON GEGEBENEN DATEN

SELECT COUNT(*) FROM gericht;
SELECT COUNT(*) FROM allergen;
SELECT COUNT(*) FROM kategorie;
SELECT COUNT(*) FROM gericht_hat_allergen;
SELECT COUNT(*) FROM gericht_hat_kategorie;

#1

#2

#3

#4

#5

#6

#7

#8

#9

#10

#11

#1
SELECT * FROM gericht;
#2
SELECT erfasst_am FROM gericht;
#3
SELECT name AS Gerichtsname, erfasst_am FROM gericht ORDER BY Gerichtsname DESC;
#4
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5;
#5
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5 OFFSET 5;
#6
SELECT typ FROM allergen GROUP BY typ;
#7
SELECT name FROM gericht WHERE name LIKE 'K%';
#8
SELECT id, name FROM gericht WHERE name LIKE '%suppe%';
#9
SELECT * FROM kategorie WHERE eltern_id IS NULL;
#10
UPDATE allergen SET name= 'Kamut' WHERE code = 'a6';
#11
INSERT INTO gericht (id, name, beschreibung, erfasst_am, vegetarisch, vegan, preis_intern, preis_extern)
VALUES (21, 'Currywurst mit Pommes', 'Fast Food Speise', '2022-11-16', 0,0, 2.0, 2.5 );
#12
INSERT INTO gericht_hat_kategorie (gericht_id, kategorie_id) VALUES (21, 3);

#A5.1 Display von Gerichten und Allergenne
SELECT g.name AS name, g.preis_intern AS preis_intern, g.preis_extern AS preis_extern, GROUP_CONCAT(ga.code) AS allergene
    FROM gericht g JOIN gericht_hat_allergen ga ON g.id = ga.gericht_id GROUP BY g.name LIMIT 5;
#A5.2 Display von allen Allergenen der displayten Gerichte (Nachfrage Luke)
SELECT DISTINCT A.code, A.name, A.typ FROM gericht_hat_allergen GCA
    INNER JOIN (SELECT id FROM gericht LIMIT 5) AS G ON G.id = GCA.gericht_id
    JOIN allergen A ON GCA.code = A.code ORDER BY A.code;

#A6.1 - Alle Gerichte mit allen zugehörigen Allergenen.
SELECT g.name, GROUP_CONCAT(ga.code) AS "Allergene Code", GROUP_CONCAT(a.name) AS "Allergene Name" FROM gericht g
    JOIN gericht_hat_allergen ga ON g.id = ga.gericht_id
    JOIN allergen a ON ga.code = a.code
    GROUP BY name;
#A6.2 - Ändern Sie die vorherige Abfrage so ab, dass alle existierenden Gerichte dargestellt werden (auch wenn keine Allergene enthalten sind).
SELECT g.name, GROUP_CONCAT(ga.code) AS "Allergene Code", GROUP_CONCAT(a.name) AS "Allergene Name" FROM gericht g
    LEFT JOIN gericht_hat_allergen ga ON g.id = ga.gericht_id
    LEFT JOIN allergen a ON ga.code = a.code
    GROUP BY name;
#A6.3 - Ändern Sie die vorherige Abfrage so ab, so dass im Ergebnis alle existierenden Allergene dargestellt werden (auch wenn diese nicht einem Gericht zugeordnet sind).
SELECT g.name, ga.code AS "Allergene Code", a.name AS "Allergene Name" FROM gericht g
    RIGHT JOIN gericht_hat_allergen ga ON g.id = ga.gericht_id
    RIGHT JOIN allergen a ON ga.code = a.code
    ORDER BY name;


#A6.4 - Die Anzahl der Gerichte pro Kategorie aufsteigend sortiert nach Anzahl.
SELECT k.name AS "Kategorie", COUNT(g.name) AS "Anzahl Gerichte"
    FROM gericht g
    JOIN gericht_hat_kategorie ghk ON g.id = ghk.gericht_id
    JOIN kategorie k ON k.id = ghk.kategorie_id
    GROUP BY k.name
    ORDER BY "Anzahl Gerichte";

#A6.5 - Ändern Sie die vorherige Abfrage so ab,
#dass dabei nur die Kategorien dargestellt werden, die mehr als 2 Gerichte besitzen.
SELECT k.name AS "Kategorie", COUNT(g.name) AS "Anzahl Gerichte"
        FROM gericht g
        JOIN gericht_hat_kategorie ghk ON g.id = ghk.gericht_id
        JOIN kategorie k ON k.id = ghk.kategorie_id
        GROUP BY k.name
        HAVING COUNT(g.name) > 1
        ORDER BY "Anzahl Gerichte";

#A9.1
SELECT COUNT(id) FROM gericht;

#A9.3
CREATE TABLE besucher(
    id int PRIMARY KEY AUTO_INCREMENT
);

INSERT INTO besucher VALUES();

SELECT COUNT(id) FROM besucher;


