/* Aufgabe 4. Teilaufgabe 4) Teil 1. */
ALTER TABLE gericht_hat_kategorie 
    ADD FOREIGN KEY (kategorie_id) REFERENCES kategorie(id) 
    ON UPDATE CASCADE ON DELETE RESTRICT;



/* Aufgabe 4. Teilaufgabe 4) Teil 2. */
ALTER TABLE kategorie
    ADD FOREIGN KEY (eltern_id) REFERENCES kategorie(id)
    ON UPDATE CASCADE ON DELETE RESTRICT;