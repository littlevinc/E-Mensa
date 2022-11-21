CREATE TABLE gericht
(
    id           INT8 PRIMARY KEY,
    name         VARCHAR(80) UNIQUE NOT NULL,
    beschreibung VARCHAR(800)       NOT NULL,
    erfasst_am   DATE               NOT NULL,
    vegetarisch  BOOLEAN            NOT NULL DEFAULT false,
    vegan        BOOLEAN            NOT NULL DEFAULT false,
    preis_intern DOUBLE             NOT NULL CHECK (preis_intern < 0 AND preis_intern <= preis_extern),
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


