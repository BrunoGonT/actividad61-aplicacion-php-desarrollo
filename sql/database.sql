CREATE DATABASE IF NOT EXISTS actividad61BGT;
USE actividad61BGT;
CREATE TABLE personajes_rc (
  personajes_rc_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  especie VARCHAR(100) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  edad INT UNSIGNED NOT NULL,
  rol VARCHAR(100) NOT NULL,
  nivel_amenaza VARCHAR(50) NOT NULL DEFAULT 'Desconocido' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Lombax', 'Ratchet', 25, 'Héroe y mecánico', 'Bajo');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Robot', 'Clank', 34, 'Compañero y asistente', 'Bajo');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Blarg', 'Chairman Drek', 45, 'Dictador corporativo', 'Alto');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Cragmite', 'Emperor Tachyon', 56, 'Conquistador galáctico', 'Alto');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Humanoide', 'Captain Qwark', 31, 'Falso héroe', 'Medio');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Robot', 'Dr. Nefarious', 63, 'Científico malvado', 'Alto');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Robot', 'Mr. Zurkon', 19, 'Mercenario de combate', 'Medio');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Lombax', 'Rivet', 27, 'Héroe y luchadora', 'Bajo');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Blarg', 'Nevil', 38, 'Líder militar', 'Medio');

INSERT INTO personajes_rc (especie, nombre, edad, rol, nivel_amenaza) 
VALUES ('Cragmite', 'General Azimuth', 50, 'Comandante rebelde', 'Alto');


