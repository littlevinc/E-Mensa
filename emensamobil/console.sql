use emensawerbeseite;

SELECT name FROM kategorie;

SELECT name, preis_intern FROM gericht WHERE preis_intern > 2 ORDER BY name desc;

#A4.1
# SQL ist ein Standard welcher rel. DB erlauben soll
# SQL != rel. DB - ist keine direkte Abbildung der Theorie daher
# können in einer DB auch mehrere gleiche Tuples existieren

#A4.2 Hinzufügen einer Indexierung für name(gericht) INDEX
ALTER TABLE gericht ADD INDEX gericht_index (name);

#A4.3
ALTER TABLE gericht_hat_allergen DROP CONSTRAINT gericht_hat_allergen_ibfk_2;
ALTER TABLE gericht_hat_kategorie DROP CONSTRAINT gericht_hat_kategorie_ibfk_1;

ALTER TABLE gericht_hat_allergen
    ADD CONSTRAINT gericht_hat_allergen_ibfk_2
    FOREIGN KEY (gericht_id)
    REFERENCES gericht(id)
    ON DELETE CASCADE;

ALTER TABLE gericht_hat_kategorie
    ADD CONSTRAINT gericht_hat_kategorie_ibfk_1
        FOREIGN KEY (gericht_id)
            REFERENCES gericht(id)
            ON DELETE CASCADE;

#A4.4 Eine Kategorie kann nur dann gelöscht werden,
# wenn 1) dieser keine Gerichte zugeordnet sind und
# 2) diese keine Kindkategorien besitzt.

ALTER TABLE gericht_hat_kategorie
    ADD FOREIGN KEY (kategorie_id) REFERENCES kategorie(id)
        ON UPDATE CASCADE ON DELETE RESTRICT;

/* Aufgabe 4. Teilaufgabe 4) Teil 2. */
ALTER TABLE kategorie
    ADD FOREIGN KEY (eltern_id) REFERENCES kategorie(id)
        ON UPDATE CASCADE ON DELETE RESTRICT;

#A4.5 Wird der Code eines Allergens verändert, so sich
# dieser Code automatisch in den referenzierenden Datensätzen.
# --> Alle Children von Allergens erhalten ein ON UPDATE CASCADE?
ALTER TABLE gericht_hat_allergen DROP CONSTRAINT gericht_hat_allergen_ibfk_1;

ALTER TABLE gericht_hat_allergen
    ADD CONSTRAINT gericht_hat_allergen_ibfk_1
        FOREIGN KEY (code)
            REFERENCES allergen(code)
            ON UPDATE CASCADE;

#A4.6 Eine Kombination aus gericht_id und
# kategorie_id in gericht_hat_kategorie soll als Primärschlüssel dienen.
# Ist da nicht das gleiche wie 4.1?


#A5.1
CREATE TABLE benutzer
(
    id INT8 PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    passwort VARCHAR(200) NOT NULL,
    admin BOOLEAN NOT NULL DEFAULT FALSE,
    anzahlfehler INT NOT NULL DEFAULT 0,
    anzahlanmeldungen INT NOT NULL DEFAULT 0,
    letzteanmeldung DATETIME,
    letzterfehler DATETIME
);

INSERT INTO benutzer (name, email, passwort, admin) VALUES('admin', 'admin@gmail.com', '12ed4f6fb2bd6c8b4b7ebc6c25c6e165479ad080', true);

use emensawerbeseite;
SELECT COUNT(*) AS login FROM benutzer WHERE email='admin@gmail.com' AND passwort = '12ed4f6fb2bd6c8b4b7ebc6c25c6e165479ad080';


#A5.2
ALTER TABLE gericht ADD COLUMN bildname VARCHAR(200) DEFAULT (NULL);

UPDATE gericht SET gericht.bildname = '01_bratkartoffel.jpg' WHERE id = 1;
UPDATE gericht SET gericht.bildname = '03_bratkartoffel.jpg' WHERE id = 3;
UPDATE gericht SET gericht.bildname = '04_tofu.jpg' WHERE id = 4;
UPDATE gericht SET gericht.bildname = '00_image_missing.jpg' WHERE id = 5;
UPDATE gericht SET gericht.bildname = '06_lasagne.jpg' WHERE id = 6;
UPDATE gericht SET gericht.bildname = '00_image_missing.jpg' WHERE id = 7;
UPDATE gericht SET gericht.bildname = '00_image_missing.jpg' WHERE id = 8;
UPDATE gericht SET gericht.bildname = '09_suppe.jpg' WHERE id = 9;
UPDATE gericht SET gericht.bildname = '10_forelle.jpg' WHERE id = 10;
UPDATE gericht SET gericht.bildname = '11_soup.jpg' WHERE id = 11;
UPDATE gericht SET gericht.bildname = '12_kassler.jpg' WHERE id = 12;
UPDATE gericht SET gericht.bildname = '13_reibekuchen.jpg' WHERE id = 13;
UPDATE gericht SET gericht.bildname = '00_image_missing.jpg' WHERE id = 14;
UPDATE gericht SET gericht.bildname = '15_pilze.jpg' WHERE id = 15;
UPDATE gericht SET gericht.bildname = '00_image_missing.jpg' WHERE id = 16;
UPDATE gericht SET gericht.bildname = '17_broetchen.jpg' WHERE id = 17;
UPDATE gericht SET gericht.bildname = '00_image_missing.jpg' WHERE id = 18;
UPDATE gericht SET gericht.bildname = '19_mousse.jpg' WHERE id = 19;
UPDATE gericht SET gericht.bildname = '20_suppe.jpg' WHERE id = 20;
UPDATE gericht SET gericht.bildname = '00_image_missing.jpg' WHERE id = 21;


#M5.4
#A
CREATE VIEW view_suppengerichte AS
    SELECT * FROM gericht
             WHERE name LIKE '%suppe%';

SELECT * FROM view_suppengerichte;

#B
CREATE VIEW view_anmeldungen AS
    SELECT name, anzahlanmeldungen FROM benutzer
    ORDER BY anzahlanmeldungen DESC;

SELECT * FROM view_anmeldungen;

#C
CREATE VIEW view_gerichte_vegetarisch AS
    SELECT id, name AS gerichtname FROM gericht WHERE vegetarisch = 1;

CREATE VIEW view_kategoriegerichte_vegetarisch AS
    SELECT  k.name AS kategoriename, gerichtname
    FROM view_gerichte_vegetarisch as vgv
    JOIN gericht_hat_kategorie ghk ON ghk.gericht_id = vgv.id
    RIGHT JOIN kategorie k ON ghk.kategorie_id=k.id;

SELECT * FROM view_kategoriegerichte_vegetarisch;
SELECT * FROM view_gerichte_vegetarisch;

#M5.5
CREATE PROCEDURE procedure_increment_logins(IN b_id INTEGER)
BEGIN
    UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen +1 WHERE id = b_id;
END;

CALL procedure_increment_logins(1);

# M6
CREATE TABLE bewertung (
                           idBewertung INT8 PRIMARY KEY AUTO_INCREMENT,
                           gericht_id TINYINT,
                           benutzer_id INT8,
                           bemerkung VARCHAR(250),
                           sterne ENUM('sehr gut','gut','schlecht','sehr schlecht'),
                           bewertungszeitpunkt DATETIME,
                           hervorgehoben BOOLEAN DEFAULT FALSE,
                           CONSTRAINT fkey_gericht FOREIGN KEY (gericht_id) REFERENCES gericht(id),
                           CONSTRAINT fkey_benutzer FOREIGN KEY (benutzer_id) REFERENCES benutzer(id)
);
