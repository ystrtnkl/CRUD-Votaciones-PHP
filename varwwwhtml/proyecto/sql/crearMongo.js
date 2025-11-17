db.createCollection("usuarios", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["uuid", "nombre", "correo", "contrasegna"],
      properties: {
        uuid: {
          bsonType: "string",
          description: "UUID primary key"
        },
        nombre: {
          bsonType: "string",
          maxLength: 63
        },
        correo: {
          bsonType: "string",
          maxLength: 63
        },
        contrasegna: {
          bsonType: "string",
          maxLength: 128
        },
        fechaCreado: {
          bsonType: "string"
        },
        esAdmin: {
          bsonType: "string",
          enum: ["s", "n"]
        },
        urlFoto: {
          bsonType: "string"
        }
      }
    }
  }
});
db.usuarios.createIndex({ correo: 1 }, { unique: true });
db.usuarios.createIndex({ uuid: 1 }, { unique: true });

db.createCollection("encuestas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["id", "nombre", "contenido", "uuid_USUARIO", "tipoPermisos"],
      properties: {
        id: {
          bsonType: "string"
        },
        nombre: {
          bsonType: "string",
          maxLength: 127
        },
        contenido: {
          bsonType: "string",
          maxLength: 1023
        },
        uuid_USUARIO: {
          bsonType: "string"
        },
        uuidsPermisos: {
          bsonType: "string"
        },
        tipoPermisos: {
          bsonType: "string",
          enum: ["b", "n", "w"]
        },
        foto: {
          bsonType: "string"
        },
        fechaCreado: {
          bsonType: "string"
        }
      }
    }
  }
});
db.encuestas.createIndex({ id: 1 }, { unique: true });
db.encuestas.createIndex({ uuid_USUARIO: 1 });

db.createCollection("respuestas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["id", "contenido", "uuid_USUARIO", "id_ENCUESTA"],
      properties: {
        id: {
          bsonType: "string"
        },
        contenido: {
          bsonType: "string",
          maxLength: 4095
        },
        uuid_USUARIO: {
          bsonType: "string"
        },
        id_ENCUESTA: {
          bsonType: "string"
        },
        fechaCreado: {
          bsonType: "string"
        }
      }
    }
  }
});
db.respuestas.createIndex({ id: 1 }, { unique: true });
db.respuestas.createIndex({ uuid_USUARIO: 1 });
db.respuestas.createIndex({ id_ENCUESTA: 1 });

