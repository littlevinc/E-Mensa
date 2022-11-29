CREATE TABLE wunschgerichte (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(50), 
    beschreibung VARCHAR(1000), 
    erstelldatum DATE, 
    ersteller VARCHAR(100), 
    email VARCHAR(200)
);



