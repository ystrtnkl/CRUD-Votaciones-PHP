INSERT INTO USUARIO (uuid, nombre, correo, contrasegna, esAdmin, fotoUrl, fechaCreado) VALUES
('11111111-1111-1111-1111-111111111111', 'Alice', 'usr1@gma.com',  'hash_pw1...AAA', 'n', 'https://picsum.photos/id/1011/200', '1762273040'),
('22222222-2222-2222-2222-222222222222', 'Bob', 'usr2@gma.com',    'hash_pw2...AAA', 'n', 'https://picsum.photos/id/1012/200', '1762273040'),
('33333333-3333-3333-3333-333333333333', 'Charlie', 'usr3@gma.com', 'hash_pw3...AAA', 'n', 'https://picsum.photos/id/1013/200', '1762273040'),
('44444444-4444-4444-4444-444444444444', 'Diana', 'usr4@gma.com',  'hash_pw4...AAA', 's', 'https://picsum.photos/id/1014/200', '1762273040'),
('55555555-5555-5555-5555-555555555555', 'Eve', 'usr5@gma.com',    'hash_pw5...AAA', 'n', 'https://picsum.photos/id/1015/200', '1762273040'),
('66666666-6666-6666-6666-666666666666', 'Frank', 'usr6@gma.com',  'hash_pw6...AAA', 'n', 'https://picsum.photos/id/1016/200', '1762273040'),
('77777777-7777-7777-7777-777777777777', 'Grace', 'usr7@gma.com',  'hash_pw7...AAA', 'n', 'https://picsum.photos/id/1017/200', '1762273040'),
('88888888-8888-8888-8888-888888888888', 'Heidi', 'usr8@gma.com',  'hash_pw8...AAA', 'n', 'https://picsum.photos/id/1018/200', '1762273040'),
('99999999-9999-9999-9999-999999999999', 'Ivan', 'usr9@gma.com',   'hash_pw9...AAA', 's', 'https://picsum.photos/id/1019/200', '1762273040'),
('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 'Judy', 'usr0@gma.com',   'hash_pw10...AAA','n', 'https://picsum.photos/id/1020/200', '1762273040');

INSERT INTO ENCUESTA (id, nombre, contenido, uuid_USUARIO, uuidsPermisos, tipoPermisos, foto, fechaCreado) VALUES
('e1111111-1111-1111-1111-111111111111', 'Satisfacción laboral', 'Encuesta sobre el ambiente de trabajo.', '11111111-1111-1111-1111-111111111111', '22222222-2222-2222-2222-222222222222,33333333-3333-3333-3333-333333333333', 'w', 'foto1.jpg', '1762273040'),
('e2222222-2222-2222-2222-222222222222', 'Preferencias musicales', 'Géneros musicales favoritos.', '22222222-2222-2222-2222-222222222222', '', 'n', 'foto2.jpg', '1762273040'),
('e3333333-3333-3333-3333-333333333333', 'Comida favorita', 'Encuesta sobre gustos gastronómicos.', '33333333-3333-3333-3333-333333333333', '', 'n', 'foto3.jpg', '1762273040'),
('e4444444-4444-4444-4444-444444444444', 'Tecnología y uso diario', 'Dispositivos que usas a diario.', '44444444-4444-4444-4444-444444444444', '55555555-5555-5555-5555-555555555555', 'b', 'foto4.jpg', '1762273040'),
('e5555555-5555-5555-5555-555555555555', 'Películas preferidas', 'Géneros y directores favoritos.', '55555555-5555-5555-5555-555555555555', '', 'n', 'foto5.jpg', '1762273040'),
('e6666666-6666-6666-6666-666666666666', 'Redes sociales', 'Tiempo en redes sociales por día.', '66666666-6666-6666-6666-666666666666', '', 'n', 'foto6.jpg', '1762273040'),
('e7777777-7777-7777-7777-777777777777', 'Viajes soñados', 'Destinos turísticos favoritos.', '77777777-7777-7777-7777-777777777777', '', 'n', 'foto7.jpg', '1762273040'),
('e8888888-8888-8888-8888-888888888888', 'Hábitos de lectura', 'Libros y géneros preferidos.', '88888888-8888-8888-8888-888888888888', '', 'n', 'foto8.jpg', '1762273040'),
('e9999999-9999-9999-9999-999999999999', 'Deportes practicados', 'Encuesta sobre deportes frecuentes.', '99999999-9999-9999-9999-999999999999', '', 'n', 'foto9.jpg', '1762273040'),
('eaaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaa', 'Metas personales', 'Planes para el futuro cercano.', 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', '', 'n', 'foto10.jpg', '1762273040');

INSERT INTO RESPUESTA (id, contenido, uuid_USUARIO, id_ENCUESTA, fechaCreado) VALUES
('r1111111-1111-1111-1111-111111111111', 'Estoy satisfecho con mi trabajo.', '22222222-2222-2222-2222-222222222222', 'e1111111-1111-1111-1111-111111111111', '1762273040'),
('r2222222-2222-2222-2222-222222222222', 'Prefiero el rock y el jazz.', '33333333-3333-3333-3333-333333333333', 'e2222222-2222-2222-2222-222222222222', '1762273040'),
('r3333333-3333-3333-3333-333333333333', 'Mi comida favorita es la pizza.', '44444444-4444-4444-4444-444444444444', 'e3333333-3333-3333-3333-333333333333', '1762273040'),
('r4444444-4444-4444-4444-444444444444', 'Uso mi teléfono unas 4 horas al día.', '55555555-5555-5555-5555-555555555555', 'e4444444-4444-4444-4444-444444444444', '1762273040'),
('r5555555-5555-5555-5555-555555555555', 'Me encantan las películas de acción.', '66666666-6666-6666-6666-666666666666', 'e5555555-5555-5555-5555-555555555555', '1762273040'),
('r6666666-6666-6666-6666-666666666666', 'Paso unas 3 horas en redes.', '77777777-7777-7777-7777-777777777777', 'e6666666-6666-6666-6666-666666666666', '1762273040'),
('r7777777-7777-7777-7777-777777777777', 'Quiero viajar a Japón.', '88888888-8888-8888-8888-888888888888', 'e7777777-7777-7777-7777-777777777777', '1762273040'),
('r8888888-8888-8888-8888-888888888888', 'Leo al menos un libro al mes.', '99999999-9999-9999-9999-999999999999', 'e8888888-8888-8888-8888-888888888888', '1762273040'),
('r9999999-9999-9999-9999-999999999999', 'Practico fútbol y natación.', 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 'e9999999-9999-9999-9999-999999999999', '1762273040'),
('raaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 'Mi meta es aprender programación.', '11111111-1111-1111-1111-111111111111', 'eaaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaa', '1762273040');
