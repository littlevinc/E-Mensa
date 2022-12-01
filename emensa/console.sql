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