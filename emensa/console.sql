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