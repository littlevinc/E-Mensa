use emensawerbeseite;

CREATE TABLE wunschgerichte(

    id int PRIMARY KEY AUTO_INCREMENT,
    gericht_name varchar(80) NOT NULL,
    gericht_beschreibung varchar(200) NOT NULL,
    ersteller_name varchar(80) NOT NULL default 'anonym',
    ersteller_mail varchar(80) NOT NULL default 'anonym'
);



INSERT INTO wunschgerichte (gericht_name, gericht_beschreibung, ersteller_name, ersteller_mail) VALUES ('Pilzrisotto 3', 'cremiges Risotto mit 3erlei Pilzen', '' ,'');

/*DROP TABLE wunschgerichte;*/