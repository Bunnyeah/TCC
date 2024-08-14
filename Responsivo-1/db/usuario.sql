-- Cria o banco de dados
CREATE DATABASE usuario;

-- Seleciona o banco de dados
USE usuario;

-- Cria a tabela usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    info TEXT,
    senha VARCHAR(30) NOT NULL
);