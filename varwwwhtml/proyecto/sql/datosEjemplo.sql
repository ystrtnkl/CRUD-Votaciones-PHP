INSERT INTO USUARIO (uuid, nombre, contrasegna, fechaCreado, esAdmin) VALUES
('11111111-1111-1111-1111-111111111111', 'Alice', 'hash_pw1', NOW(), 'n'),
('22222222-2222-2222-2222-222222222222', 'Bob', 'hash_pw2', NOW(), 'n'),
('33333333-3333-3333-3333-333333333333', 'Charlie', 'hash_pw3', NOW(), 'n'),
('44444444-4444-4444-4444-444444444444', 'Diana', 'hash_pw4', NOW(), 's'),
('55555555-5555-5555-5555-555555555555', 'Eve', 'hash_pw5', NOW(), 'n'),
('66666666-6666-6666-6666-666666666666', 'Frank', 'hash_pw6', NOW(), 'n'),
('77777777-7777-7777-7777-777777777777', 'Grace', 'hash_pw7', NOW(), 'n'),
('88888888-8888-8888-8888-888888888888', 'Heidi', 'hash_pw8', NOW(), 'n'),
('99999999-9999-9999-9999-999999999999', 'Ivan', 'hash_pw9', NOW(), 's'),
('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 'Judy', 'hash_pw10', NOW(), 'n');

INSERT INTO ENCUESTA (nombre, contenido, uuid_USUARIO, uuidsPermisos, tipoPermisos, foto, fechaCreado) VALUES
('Satisfacción del servicio', 'Encuesta para medir la satisfacción del cliente.', '11111111-1111-1111-1111-111111111111', '22222222-2222-2222-2222-222222222222,33333333-3333-3333-3333-333333333333', 'w', 'servicio.png', NOW()),
('Opinión sobre producto A', 'Queremos tu opinión sobre el producto A.', '22222222-2222-2222-2222-222222222222', '11111111-1111-1111-1111-111111111111', 'b', 'productoA.png', NOW()),
('Preferencias de comida', 'Selecciona tus comidas favoritas.', '33333333-3333-3333-3333-333333333333', '', 'n', 'comida.png', NOW()),
('Evaluación de desempeño', 'Autoevaluación trimestral de desempeño laboral.', '44444444-4444-4444-4444-444444444444', '55555555-5555-5555-5555-555555555555', 'w', 'desempeno.png', NOW()),
('Encuesta de vacaciones', '¿Cómo prefieres tus vacaciones?', '55555555-5555-5555-5555-555555555555', '', 'n', 'vacaciones.png', NOW()),
('Satisfacción del software', 'Valora la facilidad de uso del sistema.', '66666666-6666-6666-6666-666666666666', '77777777-7777-7777-7777-777777777777,88888888-8888-8888-8888-888888888888', 'w', 'software.png', NOW()),
('Uso de redes sociales', '¿Cuánto tiempo pasas en redes sociales?', '77777777-7777-7777-7777-777777777777', '', 'n', 'redes.png', NOW()),
('Opinión sobre la empresa', 'Queremos conocer tu opinión sobre la cultura empresarial.', '88888888-8888-8888-8888-888888888888', '', 'b', 'empresa.png', NOW()),
('Preferencias musicales', 'Selecciona tus géneros musicales favoritos.', '99999999-9999-9999-9999-999999999999', '', 'n', 'musica.png', NOW()),
('Sugerencias para mejora', 'Envía tus sugerencias para mejorar nuestros servicios.', 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', '11111111-1111-1111-1111-111111111111,22222222-2222-2222-2222-222222222222', 'w', 'sugerencias.png', NOW());

INSERT INTO RESPUESTA (contenido, uuid_USUARIO, id_ENCUESTA, fechaCreado) VALUES
('Muy satisfecho con el servicio.', '22222222-2222-2222-2222-222222222222', 1, NOW()),
('El producto A es excelente.', '33333333-3333-3333-3333-333333333333', 2, NOW()),
('Me gusta la comida italiana y mexicana.', '44444444-4444-4444-4444-444444444444', 3, NOW()),
('Considero que mi desempeño fue bueno.', '55555555-5555-5555-5555-555555555555', 4, NOW()),
('Prefiero vacaciones en la playa.', '66666666-6666-6666-6666-666666666666', 5, NOW()),
('El software es fácil de usar, pero puede mejorar.', '77777777-7777-7777-7777-777777777777', 6, NOW()),
('Uso redes sociales unas 2 horas al día.', '88888888-8888-8888-8888-888888888888', 7, NOW()),
('Me gusta trabajar aquí, el ambiente es positivo.', '99999999-9999-9999-9999-999999999999', 8, NOW()),
('Prefiero rock y jazz.', 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 9, NOW()),
('Sugiero mejorar la atención al cliente.', '11111111-1111-1111-1111-111111111111', 10, NOW());
