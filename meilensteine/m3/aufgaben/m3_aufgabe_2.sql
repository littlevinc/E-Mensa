CREATE DATABASE emensawerbeseite CHARACTER SET UTF8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE gericht (
    id TINYINT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    beschreibung VARCHAR(800) NOT NULL,
    erfasst_am DATE NOT NULL,
    vegetarisch BOOLEAN NOT NULL,
    vegan BOOLEAN NOT NULL,
    preis_intern DOUBLE NOT NULL,
    preis_extern DOUBLE NOT NULL,
    CONSTRAINT controll_price CHECK (preis_extern > preis_intern)
);

CREATE TABLE allergen (
    code CHAR(4) PRIMARY KEY,
    name VARCHAR(300) NOT NULL,
    typ VARCHAR(20) NOT NULL
);

CREATE TABLE kategorie (
    id TINYINT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    eltern_id TINYINT,
    bildname VARCHAR(200),
    FOREIGN KEY (eltern_id) REFERENCES kategorie(id)
);

CREATE TABLE gericht_hat_allergen (
    code CHAR(4),
    gericht_id TINYINT NOT NULL,
    FOREIGN KEY (code) REFERENCES allergen(code),
    FOREIGN KEY (gericht_id) REFERENCES gericht(id),
    PRIMARY KEY (code, gericht_id)
);

CREATE TABLE gericht_hat_kategorie (
    gericht_id TINYINT NOT NULL,
    kategorie_id TINYINT NOT NULL, 
    FOREIGN KEY (gericht_id) REFERENCES gericht(id),
    FOREIGN KEY (kategorie_id) REFERENCES kategorie(id),
    PRIMARY KEY (gericht_id, kategorie_id)
);

/* Aufgabe 3 Teilaufgabe 4) */
SELECT count(*) AS "COUNT DATASETS" FROM gericht;
SELECT count(*) AS "COUNT DATASETS" FROM allergen;
SELECT count(*) AS "COUNT DATASETS" FROM kategorie;
SELECT count(*) AS "COUNT DATASETS" FROM gericht_hat_allergen;
SELECT count(*) AS "COUNT DATASETS" FROM gericht_hat_kategorie;


/* Erweiterung durch Aufgabe 7 - Referentille Integrität und Constraints */

/* UNIQUE CONSTRAINTS für Tabellen*/

ALTER TABLE gericht ADD UNIQUE (id);
ALTER TABLE kategorie ADD UNIQUE (id);

/* Table for Task 9 to keep track of user Stats */
CREATE TABLE access_log (
    logID INT PRIMARY KEY AUTO_INCREMENT, 
    access_time TIME,
    log_type VARCHAR(100) NOT NULL
);