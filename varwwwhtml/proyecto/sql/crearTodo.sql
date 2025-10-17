DROP TABLE IF EXISTS RESPUESTA;
DROP TABLE IF EXISTS ENCUESTA;
DROP TABLE IF EXISTS USUARIO;

CREATE TABLE USUARIO (
    uuid CHAR(36) PRIMARY KEY, -- uuid
    nombre VARCHAR(63) NOT NULL,
    contrasegna VARCHAR(128) NOT NULL,
    fechaCreado TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- registrada aqui o en php
    esAdmin CHAR(1), -- inmodificable
    CONSTRAINT chk_esAdmin CHECK (esAdmin IN ('s','n'))

);

CREATE TABLE ENCUESTA (
    id INT AUTO_INCREMENT PRIMARY KEY, -- uuid
    nombre VARCHAR(127),
    contenido VARCHAR(1023),
    uuid_USUARIO CHAR(36), -- uuid otro usuario
    uuidsPermisos VARCHAR(4095), -- uuids usuarios permitidos separados por comas
    tipoPermisos CHAR(1), -- b: blacklist, n: no, w: whitelist
    CONSTRAINT fk_ENCUESTA_uuid_USUARIO FOREIGN KEY (uuid_USUARIO) REFERENCES USUARIO(uuid),
    CONSTRAINT chk_tipoPermisos CHECK (tipoPermisos IN ('b','n','w')),
    foto VARCHAR(127),
    fechaCreado TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- registrada aqui o en php
);

CREATE TABLE RESPUESTA (
    id INT AUTO_INCREMENT PRIMARY KEY, -- uuid
    contenido VARCHAR(4095),
    uuid_USUARIO CHAR(36), -- uuid otro usuario
    id_ENCUESTA INT, -- uuid otra encuesta
    CONSTRAINT fk_RESPUESTA_uuid_USUARIO FOREIGN KEY (uuid_USUARIO) REFERENCES USUARIO(uuid),
    CONSTRAINT fk_RESPUESTA_id_ENCUESTA FOREIGN KEY (id_ENCUESTA) REFERENCES ENCUESTA(id),
    fechaCreado TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- registrada aqui o en php
);

-- ALTER TABLE USUARIO AUTO_INCREMENT = 1;
ALTER TABLE ENCUESTA AUTO_INCREMENT = 1;
ALTER TABLE RESPUESTA AUTO_INCREMENT = 1;
