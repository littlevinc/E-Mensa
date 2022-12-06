CREATE TABLE wunschgerichte (
    id_gericht INT PRIMARY KEY AUTO_INCREMENT,
    gericht_name varchar(100) UNIQUE ,
    beschreibung varchar(1000),
    erstelldatum DATE,
    ersteller INT,
    FOREIGN KEY (ersteller) REFERENCES ersteller(id_ersteller)
    );

CREATE TABLE ersteller (
    id_ersteller INT PRIMARY KEY AUTO_INCREMENT,
    name varchar(100),
    email varchar(255),
    CONSTRAINT UNIQUE (name, email)
    );



/* 

>> Relationsschreibweise

Wunschgerichte: _ID_GERICHT_, 



*/