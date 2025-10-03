db.usuarios.insertMany([
  { uuid: "11111111-1111-1111-1111-111111111111", nombre: "Alice", contrasegna: "hashed_pw_alice", fechaCreado: new Date(), esAdmin: "s" },
  { uuid: "22222222-2222-2222-2222-222222222222", nombre: "Bob", contrasegna: "hashed_pw_bob", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "33333333-3333-3333-3333-333333333333", nombre: "Charlie", contrasegna: "hashed_pw_charlie", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "44444444-4444-4444-4444-444444444444", nombre: "Diana", contrasegna: "hashed_pw_diana", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "55555555-5555-5555-5555-555555555555", nombre: "Eve", contrasegna: "hashed_pw_eve", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "66666666-6666-6666-6666-666666666666", nombre: "Frank", contrasegna: "hashed_pw_frank", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "77777777-7777-7777-7777-777777777777", nombre: "Grace", contrasegna: "hashed_pw_grace", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "88888888-8888-8888-8888-888888888888", nombre: "Heidi", contrasegna: "hashed_pw_heidi", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "99999999-9999-9999-9999-999999999999", nombre: "Ivan", contrasegna: "hashed_pw_ivan", fechaCreado: new Date(), esAdmin: "n" },
  { uuid: "aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa", nombre: "Judy", contrasegna: "hashed_pw_judy", fechaCreado: new Date(), esAdmin: "n" }
]);

db.encuestas.insertMany([
  { nombre: "Encuesta Satisfacción Cliente", contenido: "aa", uuid_USUARIO: "11111111-1111-1111-1111-111111111111", uuidsPermisos: ["22222222-2222-2222-2222-222222222222","33333333-3333-3333-3333-333333333333"], tipoPermisos: "w" },
  { nombre: "Encuesta Producto", contenido: "aa", uuid_USUARIO: "22222222-2222-2222-2222-222222222222", uuidsPermisos: [], tipoPermisos: "n" },
  { nombre: "Encuesta Servicios IT", contenido: "aa", uuid_USUARIO: "33333333-3333-3333-3333-333333333333", uuidsPermisos: ["44444444-4444-4444-4444-444444444444","55555555-5555-5555-5555-555555555555"], tipoPermisos: "w" },
  { nombre: "Encuesta Recursos Humanos", contenido: "aa", uuid_USUARIO: "44444444-4444-4444-4444-444444444444", uuidsPermisos: ["33333333-3333-3333-3333-333333333333"], tipoPermisos: "b" },
  { nombre: "Encuesta Marketing", contenido: "aa", uuid_USUARIO: "55555555-5555-5555-5555-555555555555", uuidsPermisos: [], tipoPermisos: "n" },
  { nombre: "Encuesta Educación", contenido: "aa", uuid_USUARIO: "66666666-6666-6666-6666-666666666666", uuidsPermisos: ["88888888-8888-8888-8888-888888888888"], tipoPermisos: "b" },
  { nombre: "Encuesta Seguridad", contenido: "aa", uuid_USUARIO: "77777777-7777-7777-7777-777777777777", uuidsPermisos: ["55555555-5555-5555-5555-555555555555","66666666-6666-6666-6666-666666666666"], tipoPermisos: "w" },
  { nombre: "Encuesta Transporte", contenido: "aa", uuid_USUARIO: "88888888-8888-8888-8888-888888888888", uuidsPermisos: ["11111111-1111-1111-1111-111111111111","22222222-2222-2222-2222-222222222222"], tipoPermisos: "b" },
  { nombre: "Encuesta Alimentación", contenido: "aa", uuid_USUARIO: "99999999-9999-9999-9999-999999999999", uuidsPermisos: ["33333333-3333-3333-3333-333333333333","44444444-4444-4444-4444-444444444444"], tipoPermisos: "w" },
  { nombre: "Encuesta Tecnología", contenido: "aa", uuid_USUARIO: "aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa", uuidsPermisos: ["77777777-7777-7777-7777-777777777777","88888888-8888-8888-8888-888888888888"], tipoPermisos: "b" }
]);

db.respuestas.insertMany([
  { contenido: "Muy buena experiencia, volveré a comprar.", uuid_USUARIO: "22222222-2222-2222-2222-222222222222", id_ENCUESTA: 1 },
  { contenido: "El producto es excelente.", uuid_USUARIO: "11111111-1111-1111-1111-111111111111", id_ENCUESTA: 2 },
  { contenido: "El soporte fue rápido y eficiente.", uuid_USUARIO: "44444444-4444-4444-4444-444444444444", id_ENCUESTA: 3 },
  { contenido: "El ambiente laboral es positivo.", uuid_USUARIO: "33333333-3333-3333-3333-333333333333", id_ENCUESTA: 4 },
  { contenido: "El nuevo logo me gusta mucho.", uuid_USUARIO: "99999999-9999-9999-9999-999999999999", id_ENCUESTA: 5 },
  { contenido: "Me gustaría que incluyeran más talleres prácticos.", uuid_USUARIO: "88888888-8888-8888-8888-888888888888", id_ENCUESTA: 6 },
  { contenido: "Sí, me siento seguro en el edificio.", uuid_USUARIO: "55555555-5555-5555-5555-555555555555", id_ENCUESTA: 7 },
  { contenido: "Uso principalmente el transporte público.", uuid_USUARIO: "11111111-1111-1111-1111-111111111111", id_ENCUESTA: 8 },
  { contenido: "Recomiendo incluir más opciones vegetarianas.", uuid_USUARIO: "44444444-4444-4444-4444-444444444444", id_ENCUESTA: 8 },
  { contenido: "Principalmente uso mi teléfono móvil.", uuid_USUARIO: "77777777-7777-7777-7777-777777777777", id_ENCUESTA: 1 }
]);
