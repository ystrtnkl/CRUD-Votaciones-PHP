db.respuestas.deleteMany({});
db.encuestas.deleteMany({});
db.usuarios.deleteMany({});

db.usuarios.insertMany([
  {
    uuid: "11111111-1111-1111-1111-111111111111",
    nombre: "Alice",
    correo: "usr1@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1011/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "22222222-2222-2222-2222-222222222222",
    nombre: "Bob",
    correo: "usr2@gma.com",
    contrasegna: "hash_pw2...AAA",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1012/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "33333333-3333-3333-3333-333333333333",
    nombre: "Charlie",
    correo: "usr3@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1013/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "44444444-4444-4444-4444-444444444444",
    nombre: "Diana",
    correo: "usr4@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "s",
    urlFoto: "https://picsum.photos/id/1014/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "55555555-5555-5555-5555-555555555555",
    nombre: "Eve",
    correo: "usr5@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1015/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "66666666-6666-6666-6666-666666666666",
    nombre: "Frank",
    correo: "usr6@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1016/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "77777777-7777-7777-7777-777777777777",
    nombre: "Grace",
    correo: "usr7@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1017/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "88888888-8888-8888-8888-888888888888",
    nombre: "Heidi",
    correo: "usr8@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1018/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "99999999-9999-9999-9999-999999999999",
    nombre: "Ivan",
    correo: "usr9@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "s",
    urlFoto: "https://picsum.photos/id/1019/200",
    fechaCreado: "1762273040"
  },
  {
    uuid: "aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",
    nombre: "Judy",
    correo: "usr0@gma.com",
    contrasegna: "$2y$10$ZKdCZowfgt21Ve9k.kAbeOgMbsRvFzeE852ifKkt65StzFJVXWJ1i",
    esAdmin: "n",
    urlFoto: "https://picsum.photos/id/1020/200",
    fechaCreado: "1762273040"
  }
]);

db.encuestas.insertMany([
  {
    id: "e1111111-1111-1111-1111-111111111111",
    nombre: "Satisfacción laboral",
    contenido: "Encuesta sobre el ambiente de trabajo.",
    uuid_USUARIO: "11111111-1111-1111-1111-111111111111",
    uuidsPermisos: "22222222-2222-2222-2222-222222222222,33333333-3333-3333-3333-333333333333",
    tipoPermisos: "w",
    foto: "foto1.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e2222222-2222-2222-2222-222222222222",
    nombre: "Preferencias musicales",
    contenido: "Géneros musicales favoritos.",
    uuid_USUARIO: "22222222-2222-2222-2222-222222222222",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto2.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e3333333-3333-3333-3333-333333333333",
    nombre: "Comida favorita",
    contenido: "Encuesta sobre gustos gastronómicos.",
    uuid_USUARIO: "33333333-3333-3333-3333-333333333333",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto3.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e4444444-4444-4444-4444-444444444444",
    nombre: "Tecnología y uso diario",
    contenido: "Dispositivos que usas a diario.",
    uuid_USUARIO: "44444444-4444-4444-4444-444444444444",
    uuidsPermisos: "55555555-5555-5555-5555-555555555555",
    tipoPermisos: "b",
    foto: "foto4.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e5555555-5555-5555-5555-555555555555",
    nombre: "Películas preferidas",
    contenido: "Géneros y directores favoritos.",
    uuid_USUARIO: "55555555-5555-5555-5555-555555555555",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto5.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e6666666-6666-6666-6666-666666666666",
    nombre: "Redes sociales",
    contenido: "Tiempo en redes sociales por día.",
    uuid_USUARIO: "66666666-6666-6666-6666-666666666666",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto6.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e7777777-7777-7777-7777-777777777777",
    nombre: "Viajes soñados",
    contenido: "Destinos turísticos favoritos.",
    uuid_USUARIO: "77777777-7777-7777-7777-777777777777",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto7.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e8888888-8888-8888-8888-888888888888",
    nombre: "Hábitos de lectura",
    contenido: "Libros y géneros preferidos.",
    uuid_USUARIO: "88888888-8888-8888-8888-888888888888",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto8.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "e9999999-9999-9999-9999-999999999999",
    nombre: "Deportes practicados",
    contenido: "Encuesta sobre deportes frecuentes.",
    uuid_USUARIO: "99999999-9999-9999-9999-999999999999",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto9.jpg",
    fechaCreado: "1762273040"
  },
  {
    id: "eaaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaa",
    nombre: "Metas personales",
    contenido: "Planes para el futuro cercano.",
    uuid_USUARIO: "aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",
    uuidsPermisos: "",
    tipoPermisos: "n",
    foto: "foto10.jpg",
    fechaCreado: "1762273040"
  }
]);

db.respuestas.insertMany([
  {
    id: "r1111111-1111-1111-1111-111111111111",
    contenido: "Estoy satisfecho con mi trabajo.",
    uuid_USUARIO: "22222222-2222-2222-2222-222222222222",
    id_ENCUESTA: "e1111111-1111-1111-1111-111111111111",
    fechaCreado: "1762273040"
  },
  {
    id: "r2222222-2222-2222-2222-222222222222",
    contenido: "Prefiero el rock y el jazz.",
    uuid_USUARIO: "33333333-3333-3333-3333-333333333333",
    id_ENCUESTA: "e2222222-2222-2222-2222-222222222222",
    fechaCreado: "1762273040"
  },
  {
    id: "r3333333-3333-3333-3333-333333333333",
    contenido: "Mi comida favorita es la pizza.",
    uuid_USUARIO: "44444444-4444-4444-4444-444444444444",
    id_ENCUESTA: "e3333333-3333-3333-3333-333333333333",
    fechaCreado: "1762273040"
  },
  {
    id: "r4444444-4444-4444-4444-444444444444",
    contenido: "Uso mi teléfono unas 4 horas al día.",
    uuid_USUARIO: "55555555-5555-5555-5555-555555555555",
    id_ENCUESTA: "e4444444-4444-4444-4444-444444444444",
    fechaCreado: "1762273040"
  },
  {
    id: "r5555555-5555-5555-5555-555555555555",
    contenido: "Me encantan las películas de acción.",
    uuid_USUARIO: "66666666-6666-6666-6666-666666666666",
    id_ENCUESTA: "e5555555-5555-5555-5555-555555555555",
    fechaCreado: "1762273040"
  },
  {
    id: "r6666666-6666-6666-6666-666666666666",
    contenido: "Paso unas 3 horas en redes.",
    uuid_USUARIO: "77777777-7777-7777-7777-777777777777",
    id_ENCUESTA: "e6666666-6666-6666-6666-666666666666",
    fechaCreado: "1762273040"
  },
  {
    id: "r7777777-7777-7777-7777-777777777777",
    contenido: "Quiero viajar a Japón.",
    uuid_USUARIO: "88888888-8888-8888-8888-888888888888",
    id_ENCUESTA: "e7777777-7777-7777-7777-777777777777",
    fechaCreado: "1762273040"
  },
  {
    id: "r8888888-8888-8888-8888-888888888888",
    contenido: "Leo al menos un libro al mes.",
    uuid_USUARIO: "99999999-9999-9999-9999-999999999999",
    id_ENCUESTA: "e8888888-8888-8888-8888-888888888888",
    fechaCreado: "1762273040"
  },
  {
    id: "r9999999-9999-9999-9999-999999999999",
    contenido: "Practico fútbol y natación.",
    uuid_USUARIO: "aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",
    id_ENCUESTA: "e9999999-9999-9999-9999-999999999999",
    fechaCreado: "1762273040"
  },
  {
    id: "raaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",
    contenido: "Mi meta es aprender programación.",
    uuid_USUARIO: "11111111-1111-1111-1111-111111111111",
    id_ENCUESTA: "eaaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaa",
    fechaCreado: "1762273040"
  }
]);
