db.createCollection("usuarios", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["uuid", "nombre", "contrasegna", "fechaCreado", "esAdmin"],
      properties: {
        uuid: {
          bsonType: "string",
          description: "UUID del usuario"
        },
        nombre: {
          bsonType: "string",
          maxLength: 63
        },
        contrasegna: {
          bsonType: "string",
          maxLength: 128
        },
        fechaCreado: {
          bsonType: "date"
        },
        esAdmin: {
          enum: ["s", "n"],
          description: "Solo puede ser 's' o 'n'"
        }
      }
    }
  }
});

db.createCollection("encuestas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["nombre", "contenido", "uuid_USUARIO", "tipoPermisos"],
      properties: {
        nombre: {
          bsonType: "string",
          maxLength: 127
        },
        contenido: {
          bsonType: "string",
          maxLength: 1023
        },
        uuid_USUARIO: {
          bsonType: "string",
          description: "Referencia al usuario creador (uuid)"
        },
        uuidsPermisos: {
          bsonType: "array",
          items: { bsonType: "string" },
          description: "Lista de UUIDs con permisos"
        },
        tipoPermisos: {
          enum: ["b", "n", "w"],
          description: "Solo puede ser b, n o w"
        }
      }
    }
  }
});

db.createCollection("respuestas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["contenido", "uuid_USUARIO", "id_ENCUESTA"],
      properties: {
        contenido: {
          bsonType: "string",
          maxLength: 4095
        },
        uuid_USUARIO: {
          bsonType: "string",
          description: "Referencia al usuario que respondió"
        },
        id_ENCUESTA: {
          bsonType: "objectId",
          description: "Referencia a la encuesta respondida"
        }
      }
    }
  }
});
