INSERT INTO USUARIO (uuid, nombre, contrasegna)
VALUES
('11111111-1111-1111-1111-111111111111', 'Alice', 'passAlice123'),
('22222222-2222-2222-2222-222222222222', 'Bob', 'passBob123'),
('33333333-3333-3333-3333-333333333333', 'Charlie', 'passCharlie123'),
('44444444-4444-4444-4444-444444444444', 'Diana', 'passDiana123'),
('55555555-5555-5555-5555-555555555555', 'Eve', 'passEve123'),
('66666666-6666-6666-6666-666666666666', 'Frank', 'passFrank123'),
('77777777-7777-7777-7777-777777777777', 'Grace', 'passGrace123'),
('88888888-8888-8888-8888-888888888888', 'Henry', 'passHenry123'),
('99999999-9999-9999-9999-999999999999', 'Isabel', 'passIsabel123'),
('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 'Jack', 'passJack123');

INSERT INTO ENCUESTA (nombre, contenido, uuid_USUARIO)
VALUES
('Survey 1', 'This is the content of Survey 1', '11111111-1111-1111-1111-111111111111'),
('Survey 2', 'This is the content of Survey 2', '22222222-2222-2222-2222-222222222222'),
('Survey 3', 'This is the content of Survey 3', '33333333-3333-3333-3333-333333333333'),
('Survey 4', 'This is the content of Survey 4', '44444444-4444-4444-4444-444444444444'),
('Survey 5', 'This is the content of Survey 5', '55555555-5555-5555-5555-555555555555'),
('Survey 6', 'This is the content of Survey 6', '66666666-6666-6666-6666-666666666666'),
('Survey 7', 'This is the content of Survey 7', '77777777-7777-7777-7777-777777777777'),
('Survey 8', 'This is the content of Survey 8', '88888888-8888-8888-8888-888888888888'),
('Survey 9', 'This is the content of Survey 9', '99999999-9999-9999-9999-999999999999'),
('Survey 10', 'This is the content of Survey 10', 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa');

INSERT INTO RESPUESTA (contenido, uuid_USUARIO, id_ENCUESTA)
VALUES
('Answer 1 to Survey 1', '22222222-2222-2222-2222-222222222222', 1),
('Answer 2 to Survey 1', '33333333-3333-3333-3333-333333333333', 1),
('Answer 1 to Survey 2', '11111111-1111-1111-1111-111111111111', 2),
('Answer 2 to Survey 2', '44444444-4444-4444-4444-444444444444', 2),
('Answer 1 to Survey 3', '55555555-5555-5555-5555-555555555555', 3),
('Answer 1 to Survey 4', '66666666-6666-6666-6666-666666666666', 4),
('Answer 1 to Survey 5', '77777777-7777-7777-7777-777777777777', 5),
('Answer 1 to Survey 6', '88888888-8888-8888-8888-888888888888', 6),
('Answer 1 to Survey 7', '99999999-9999-9999-9999-999999999999', 7),
('Answer 1 to Survey 8', 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 8),
('Answer 1 to Survey 9', '11111111-1111-1111-1111-111111111111', 9),
('Answer 1 to Survey 10', '22222222-2222-2222-2222-222222222222', 10);
