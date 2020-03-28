CREATE DATABASE IF NOT EXISTS sospet;

USE sospet;

CREATE TABLE usuario(
	
	id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    foto VARCHAR(100) NOT NULL DEFAULT'sem_foto.png',
    sexo ENUM('Masculino', 'Feminino') NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    telefone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    permissao INT NOT NULL DEFAULT 0,
	codigo_alteracao CHAR(32) DEFAULT 0
);

CREATE TABLE voluntario(

	id_voluntario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    sexo ENUM('Masculino', 'Feminino') NOT NULL,
	cpf VARCHAR(100) NOT NULL UNIQUE, 
    endereco VARCHAR(100) NOT NULL,
    telefone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    permissao INT NOT NULL DEFAULT 1,
    foto VARCHAR(100) NOT NULL DEFAULT'sem_foto.png',
	codigo_alteracao CHAR(32) DEFAULT 0
);

CREATE TABLE animal(
	
    id_animal INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tipo ENUM('Cachorro', 'Gato'),
    nome VARCHAR(50),
    foto varchar(50),
    raca VARCHAR(50),
    sexo ENUM('Macho', 'Femêa'),
    porte ENUM('Pequeno', 'Médio', 'Grande'),
    data_desaparecido VARCHAR(200),
    endereco_abandonado VARCHAR(1000),
    horario DATETIME,
    observacao_abandonado VARCHAR(1000),
    descricao_adocao varchar(1000),
    bairro_desaparecido VARCHAR(100),
    descricao_desaparecido VARCHAR(100),
    status ENUM('Abandonado', 'Adocao', 'Perdido', 'Achado', 'Adotado', 'Resgatado'),
    cod_usuario_cadastra INT,
    cod_usuario_anuncia INT,
    cod_usuario_adota INT,
    cod_voluntario INT,
    
    FOREIGN KEY(cod_usuario_cadastra) REFERENCES usuario(id_usuario) ON UPDATE CASCADE,
    FOREIGN KEY(cod_usuario_anuncia) REFERENCES usuario(id_usuario) ON UPDATE CASCADE,
    FOREIGN KEY(cod_usuario_adota) REFERENCES usuario(id_usuario) ON UPDATE CASCADE,
    FOREIGN KEY(cod_voluntario) REFERENCES voluntario(id_voluntario) ON UPDATE CASCADE
);

CREATE TABLE secao1(
	
    id_secao1 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);
CREATE TABLE secao2(
	
    id_secao2 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);
CREATE TABLE secao3(
	
    id_secao3 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);

CREATE TABLE secao4(
	
    id_secao4 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);

CREATE TABLE secao5(
	
    id_secao5 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);

CREATE TABLE secao6(
	
    id_secao6 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);

CREATE TABLE secao7(
	
    id_secao6 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);

CREATE TABLE secao8(
	
    id_secao8 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);

CREATE TABLE secao9(
	
    id_secao9 INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(9999) NOT NULL,
    conteudo VARCHAR(99999) NOT NULL
);

select * from usuario;

-- TRIGGERS



-- VIEWS

-- abandonados
CREATE OR REPLACE VIEW abandonado AS
	SELECT id_animal, tipo, endereco_abandonado, horario, observacao_abandonado, cod_usuario_cadastra, foto
    FROM animal
    WHERE status='Abandonado';
   

CREATE OR REPLACE VIEW resgatado AS
	SELECT id_animal, tipo, endereco_abandonado, horario, observacao_abandonado, cod_usuario_cadastra, foto, cod_voluntario
    FROM animal
    WHERE status='Resgatado';
   
-- adocao
CREATE OR REPLACE VIEW adocao AS
	SELECT id_animal, nome, tipo, raca, sexo, porte, descricao_adocao, foto, cod_usuario_cadastra
    FROM animal
    WHERE status='Adocao';

-- desaparecido
CREATE OR REPLACE VIEW desaparecido AS 
	SELECT animal.foto, animal.id_animal, animal.nome, animal.sexo ,animal.tipo, animal.raca, animal.bairro_desaparecido, animal.descricao_desaparecido, animal.data_desaparecido, usuario.nome 'nome_dono', usuario.telefone
    FROM animal INNER JOIN usuario
    ON cod_usuario_anuncia=id_usuario
    WHERE status='Perdido';
    
    select * from desaparecido;

-- UPDATES

-- SELECTS

select * from animal where cod_usuario_anuncia=1 or cod_usuario_adota=1 or (cod_usuario_cadastra=1 && status='Adocção');

 SELECT * FROM usuario;
 
 Select * from animal;
-- SELECT * FROM voluntario;
-- SELECT * FROM animal;
-- SELECT * FROM abandonado;
-- SELECT * FROM desaparecido;
-- SELECT * FROM adocao;

