DROP TABLE IF EXISTS RESPUESTA;
DROP TABLE IF EXISTS ENCUESTA;
DROP TABLE IF EXISTS USUARIO;

CREATE TABLE USUARIO (
    uuid CHAR(36) PRIMARY KEY, -- uuid
    nombre VARCHAR(63) NOT NULL,
    correo VARCHAR(63) UNIQUE NOT NULL,
    contrasegna VARCHAR(128) NOT NULL,
    fechaCreado VARCHAR(12) DEFAULT CURRENT_TIMESTAMP, -- registrada aqui o en php
    esAdmin CHAR(1), -- inmodificable
    fotoUrl VARCHAR(255), 
    CONSTRAINT chk_esAdmin CHECK (esAdmin IN ('s','n'))
) ENGINE=InnoDB;

CREATE TABLE ENCUESTA (
    id CHAR(36) PRIMARY KEY, -- uuid
    nombre VARCHAR(127) NOT NULL,
    contenido VARCHAR(1023) NOT NULL,
    uuid_USUARIO CHAR(36) NOT NULL, -- uuid otro usuario
    uuidsPermisos VARCHAR(4095), -- uuids usuarios permitidos separados por comas
    tipoPermisos CHAR(1), -- b: blacklist, n: no, w: whitelist
    CONSTRAINT fk_ENCUESTA_uuid_USUARIO FOREIGN KEY (uuid_USUARIO) REFERENCES USUARIO(uuid),
    CONSTRAINT chk_tipoPermisos CHECK (tipoPermisos IN ('b','n','w')),
    foto VARCHAR(127),
    fechaCreado VARCHAR(12) DEFAULT CURRENT_TIMESTAMP -- registrada aqui o en php
) ENGINE=InnoDB;

CREATE TABLE RESPUESTA (
    id CHAR(36) PRIMARY KEY, -- uuid
    contenido VARCHAR(4095) NOT NULL,
    uuid_USUARIO CHAR(36) NOT NULL, -- uuid otro usuario
    id_ENCUESTA CHAR(36) NOT NULL, -- uuid otra encuesta
    CONSTRAINT fk_RESPUESTA_uuid_USUARIO FOREIGN KEY (uuid_USUARIO) REFERENCES USUARIO(uuid),
    CONSTRAINT fk_RESPUESTA_id_ENCUESTA FOREIGN KEY (id_ENCUESTA) REFERENCES ENCUESTA(id),
    fechaCreado VARCHAR(12) DEFAULT CURRENT_TIMESTAMP -- registrada aqui o en php
) ENGINE=InnoDB;

