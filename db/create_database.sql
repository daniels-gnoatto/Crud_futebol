CREATE DATABASE futebol_db;
USE futebol_db;

CREATE TABLE times (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL
);

CREATE TABLE jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    posicao VARCHAR(30) NOT NULL,
    numero_camisa INT NOT NULL,
    time_id INT,
    FOREIGN KEY (time_id) REFERENCES times(id)
);

CREATE TABLE partidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    time_casa_id INT NOT NULL,
    time_fora_id INT NOT NULL,
    data_jogo DATE NOT NULL,
    gols_casa INT DEFAULT 0,
    gols_fora INT DEFAULT 0,
    FOREIGN KEY (time_casa_id) REFERENCES times(id),
    FOREIGN KEY (time_fora_id) REFERENCES times(id)
);


INSERT INTO times (nome, cidade) VALUES
('Palmeiras', 'São Paulo'),
('Flamengo', 'Rio de Janeiro'),
('Santos', 'Santos'),
('Corinthians', 'São Paulo'),
('Cruzeiro', 'Belo Horizonte'),
('Atlético-MG', 'Belo Horizonte'),
('Internacional', 'Porto Alegre'),
('Grêmio', 'Porto Alegre'),
('Fluminense', 'Rio de Janeiro'),
('Botafogo', 'Rio de Janeiro'),
('Vasco da Gama', 'Rio de Janeiro'),
('Fortaleza', 'Fortaleza'),
('Ceará', 'Fortaleza'),
('Bahia', 'Salvador'),
('Mirassol', 'Mirassol'),
('Sport', 'Recife'),
('Bragantino', 'Bragança'),
('Vitória', 'Salvador'),
('Juventude', 'Caxias'),
('São Paulo', 'São Paulo');

INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES
('Weverton', 'GOL', 21, 1),
('Bruno Fuchs', 'ZAG', 3, 1),
('Felipe Anderson', 'MEI', 7, 1),
('Flaco López', 'ATA', 42, 1),

('Rossi', 'GOL', 21, 2),
('Léo Pereira', 'ZAG', 4, 2),
('Allan', 'VOL', 29, 2),
('Pedro', 'ATA', 9, 2),

('João Paulo', 'GOL', 1, 3),
('Zé Ivaldo', 'ZAG', 2, 3),
('Robinho Junior', 'MEI', 7, 3),
('Neymar', 'ATA', 10, 3),

('Hugo Souza', 'GOL', 22, 4),
('Gustavo Henrique', 'ZAG', 13, 4),
('Rodrigo Garro', 'MEI', 8, 4),
('Yuri Alberto', 'ATA', 9, 4),

('Cássio', 'GOL', 1, 5),
('Fabrício Bruno', 'ZAG', 15, 5),
('Matheus Pereira', 'MEI', 10, 5),
('Gabigol', 'ATA', 9, 5),

('Everson', 'GOL', 22, 6),
('Mauricio Lemos', 'ZAG', 4, 6),
('Gustavo Scarpa', 'MEI', 10, 6),
('Hulk', 'ATA', 7, 6),

('Rochet', 'GOL', 33, 7),
('Vitão', 'ZAG', 44, 7),
('Alan Patrick', 'MEI', 10, 7),
('Enner Valencia', 'ATA', 13, 7),

('Marchesín', 'GOL', 1, 8),
('Kannemann', 'ZAG', 4, 8),
('Franco Cristaldo', 'MEI', 19, 8),
('Diego Costa', 'ATA', 19, 8),

('Thiago Volpi', 'GOL', 1, 8),
('Kannemann', 'ZAG', 4, 8),
('Franco Cristaldo', 'MEI', 10, 8),
('Carlos Vinicius', 'ATA', 95, 8),

('Fábio', 'GOL', 1, 9),
('Thiago Silva', 'ZAG', 3, 9),
('Ganso', 'MEI', 10, 9),
('Germán Cano', 'ATA', 14, 9),

('John', 'GOL', 12, 10),
('Bastos', 'ZAG', 15, 10),
('Marlon Freitas', 'MEI', 17, 10),
('Joaquín Correa', 'ATA', 30, 10),

('Léo Jardim', 'GOL', 1, 11),
('Lucas Oliveira', 'ZAG', 28, 11),
('Hugo Moura', 'MEI', 25, 11),
('Pablo Vegetti', 'ATA', 99, 11),

('João Ricardo', 'GOL', 1, 12),
('Brítez', 'ZAG', 33, 12),
('Yago Pikachu', 'MEI', 22, 12),
('Lucero', 'ATA', 9, 12),

('Richard', 'GOL', 1, 13),
('Éder', 'ZAG', 33, 13),
('Fernando Sobral', 'MEI', 88, 13),
('Pedro Raúl', 'ATA', 9, 13),

('Danilo Fernandes', 'GOL', 1, 14),
('Kanu', 'ZAG', 4, 14),
('Cauly', 'MEI', 8, 14),
('William José', 'ATA', 12, 14),

('Muralha', 'GOL', 23, 15),
('Reinaldo', 'ZAG', 6, 15),
('Yago Felipe', 'MEI', 41, 15),
('Negueba', 'ATA', 11, 15),

('Caíque', 'GOL', 22, 16),
('Chico', 'ZAG', 44, 16),
('Du Queiroz', 'MEI', 37, 16),
('Pablo', 'ATA', 92, 16),

('Cleiton', 'GOL', 1, 17),
('Eduardo Santos', 'ZAG', 3, 17),
('Eric Ramires', 'MEI', 10, 17),
('Thiago Borbas', 'ATA', 18, 17),

('Lucas Arcanjo', 'GOL', 1, 18),
('Zè Marcos', 'ZAG', 3, 18),
('Pepê', 'MEI', 6, 18),
('Osvaldo', 'ATA', 11, 18),

('Gustavo', 'GOL', 12, 19),
('Cipriano', 'ZAG', 5, 19),
('Nenê', 'MEI', 10, 19),
('Gilberto', 'ATA', 9, 19),

('Rafael', 'GOL', 23, 20),
('Arboleda', 'ZAG', 5, 20),
('Lucas Moura', 'MEI', 7, 20),
('Calleri', 'ATA', 9, 20)
;

INSERT INTO partidas (time_casa_id, time_fora_id, data_jogo, gols_casa, gols_fora) VALUES

(13, 16, '2025-05-17', 2, 0),
(11, 12, '2025-05-17', 3, 0),
(20, 8, '2025-05-17', 2, 1),
(14, 18, '2025-05-18', 2, 1),
(4, 3, '2025-05-18', 1, 0),
(19, 9, '2025-05-18', 1, 1),
(17, 1, '2025-05-18', 1, 2),
(2, 10, '2025-05-18', 0, 0),
(7, 15, '2025-05-18', 1, 1),
(5, 6, '2025-05-18', 0, 0);