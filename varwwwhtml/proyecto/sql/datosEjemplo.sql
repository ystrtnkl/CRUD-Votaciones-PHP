INSERT INTO USUARIO (uuid, nombre, contrasegna, fechaCreado, esAdmin) VALUES
('11111111-1111-1111-1111-111111111111', 'Alice', 'hashed_pw_alice', NOW(), 's'),
('22222222-2222-2222-2222-222222222222', 'Bob', 'hashed_pw_bob', NOW(), 'n'),
('33333333-3333-3333-3333-333333333333', 'Charlie', 'hashed_pw_charlie', NOW(), 'n'),
('44444444-4444-4444-4444-444444444444', 'Diana', 'hashed_pw_diana', NOW(), 'n'),
('55555555-5555-5555-5555-555555555555', 'Eve', 'hashed_pw_eve', NOW(), 'n'),
('66666666-6666-6666-6666-666666666666', 'Frank', 'hashed_pw_frank', NOW(), 'n'),
('77777777-7777-7777-7777-777777777777', 'Grace', 'hashed_pw_grace', NOW(), 'n'),
('88888888-8888-8888-8888-888888888888', 'Heidi', 'hashed_pw_heidi', NOW(), 'n'),
('99999999-9999-9999-9999-999999999999', 'Ivan', 'hashed_pw_ivan', NOW(), 'n'),
('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 'Judy', 'hashed_pw_judy', NOW(), 'n');

INSERT INTO ENCUESTA (nombre, contenido, uuid_USUARIO, uuidsPermisos, tipoPermisos) VALUES
('Encuesta Satisfacción Cliente', 'aa', '11111111-1111-1111-1111-111111111111', '22222222-2222-2222-2222-222222222222,33333333-3333-3333-3333-333333333333', 'w'),
('Encuesta Producto', 'aa', '22222222-2222-2222-2222-222222222222', '', 'n'),
('Encuesta Servicios IT', 'aa', '33333333-3333-3333-3333-333333333333', '44444444-4444-4444-4444-444444444444,55555555-5555-5555-5555-555555555555', 'w'),
('Encuesta Recursos Humanos', 'aa', '44444444-4444-4444-4444-444444444444', '33333333-3333-3333-3333-333333333333', 'b'),
('Encuesta Marketing', 'aa', '55555555-5555-5555-5555-555555555555', '', 'n'),
('Encuesta Educación', 'aa', '66666666-6666-6666-6666-666666666666', '88888888-8888-8888-8888-888888888888', 'b'),
('Encuesta Seguridad', 'aa', '77777777-7777-7777-7777-777777777777', '55555555-5555-5555-5555-555555555555,66666666-6666-6666-6666-666666666666', 'w'),
('Encuesta Transporte', 'aa', '88888888-8888-8888-8888-888888888888', '11111111-1111-1111-1111-111111111111,22222222-2222-2222-2222-222222222222', 'b'),
('Encuesta Alimentación', 'aa', '99999999-9999-9999-9999-999999999999', '33333333-3333-3333-3333-333333333333,44444444-4444-4444-4444-444444444444', 'w'),
('Encuesta Tecnología', 'aa', 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', '77777777-7777-7777-7777-777777777777,88888888-8888-8888-8888-888888888888', 'b');

INSERT INTO RESPUESTA (contenido, uuid_USUARIO, id_ENCUESTA) VALUES
('Muy buena experiencia, volveré a comprar.', '22222222-2222-2222-2222-222222222222', 1),
('El producto es excelente.', '11111111-1111-1111-1111-111111111111', 2),
('El soporte fue rápido y eficiente.', '44444444-4444-4444-4444-444444444444', 3),
('El ambiente laboral es positivo.', '33333333-3333-3333-3333-333333333333', 4),
('El nuevo logo me gusta mucho.', '99999999-9999-9999-9999-999999999999', 5),
('Me gustaría que incluyeran más talleres prácticos.', '88888888-8888-8888-8888-888888888888', 6),
('Sí, me siento seguro en el edificio.', '55555555-5555-5555-5555-555555555555', 7),
('Uso principalmente el transporte público.', '11111111-1111-1111-1111-111111111111', 8),
('Recomiendo incluir más opciones vegetarianas.', '44444444-4444-4444-4444-444444444444', 8),
('Principalmente uso mi teléfono móvil.', '77777777-7777-7777-7777-777777777777', 1);
