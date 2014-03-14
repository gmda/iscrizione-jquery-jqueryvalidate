/*tabella iscrizioni*/

CREATE TABLE iscritti 
(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
nome CHAR(25),
cognome CHAR(25),
username CHAR(25),
pass CHAR(25),
email CHAR(255),
numerocell INT(15)
)


/* inserimento per il popolamento della tabella*/

INSERT INTO  iscritti 
VALUES (
NULL ,  'mario',  'rossi',  'mario10',  '12345678',  'mario@rossi.com',  '3285566743'
)
