/* Lógico_1: */
DROP DATABASE IF EXISTS promel04;
CREATE DATABASE promel04;
USE promel04;

CREATE TABLE produto (
    produto_ID int PRIMARY KEY AUTO_INCREMENT,
    Preco_Und int,
    Qtd_stock int,
    Qnt_vend int,
    Status_prdt varchar(60),
    Descricao varchar(2000),
    Nome_produto varchar(60),
    imagem varchar(60),
    fk_Admin_ID int,
    fk_categoria_ID int
);

CREATE TABLE cliente (
    cliente_ID int PRIMARY KEY AUTO_INCREMENT,
    Email varchar(200),
    Senha varchar(60),
    Nome varchar(60),
    Telefone varchar(60),
    Info varchar(200),
    Rua varchar(300),
    Cidade varchar(100),
    Estado varchar(100),
    endereco varchar(200),
    fk_Admin_ID int
);

CREATE TABLE Admin (
    admin_ID int PRIMARY KEY AUTO_INCREMENT,
    Email varchar(200),
    Senha varchar(60),
    Telefone varchar(60)
);

CREATE TABLE Pedido (
    pedido_ID int PRIMARY KEY AUTO_INCREMENT,
    Qtd_produtos int,
    Valor_Total int,
    fk_cliente_ID int,
    fk_Admin_ID int
);

CREATE TABLE Produto_Pedido_possui (
    Produto_Pedido_ID int PRIMARY KEY AUTO_INCREMENT,
    fk_produto_ID int,
    fk_Pedido_ID int
);

CREATE TABLE categoria (
    categoria_ID int PRIMARY KEY AUTO_INCREMENT,
    Nome varchar(60),
    Cor_Caixa varchar(20)
);

CREATE TABLE possui (
    fk_Admin_ID int,
    fk_categoria_ID int
);

CREATE TABLE Carrinho (
    carrinho_ID int PRIMARY KEY AUTO_INCREMENT,
    fk_cliente_ID int,
    fk_produto_ID int,
    quantidade int,
    FOREIGN KEY (fk_cliente_ID) REFERENCES cliente(cliente_ID),
    FOREIGN KEY (fk_produto_ID) REFERENCES produto(produto_ID)
);
 
ALTER TABLE produto ADD CONSTRAINT FK_produto_2
    FOREIGN KEY (fk_Admin_ID)
    REFERENCES Admin (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE produto ADD CONSTRAINT FK_produto_3
    FOREIGN KEY (fk_categoria_ID)
    REFERENCES categoria (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE cliente ADD CONSTRAINT FK_cliente_2
    FOREIGN KEY (fk_Admin_ID)
    REFERENCES Admin (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE Pedido ADD CONSTRAINT FK_Pedido_2
    FOREIGN KEY (fk_cliente_ID)
    REFERENCES cliente (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE Pedido ADD CONSTRAINT FK_Pedido_3
    FOREIGN KEY (fk_Admin_ID)
    REFERENCES Admin (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE Produto_Pedido_possui ADD CONSTRAINT FK_Produto_Pedido_possui_2
    FOREIGN KEY (fk_produto_ID)
    REFERENCES produto (ID);
 
ALTER TABLE Produto_Pedido_possui ADD CONSTRAINT FK_Produto_Pedido_possui_3
    FOREIGN KEY (fk_Pedido_ID)
    REFERENCES Pedido (ID);
 
ALTER TABLE possui ADD CONSTRAINT FK_possui_1
    FOREIGN KEY (fk_Admin_ID)
    REFERENCES Admin (ID)
    ON DELETE SET NULL;
 
ALTER TABLE possui ADD CONSTRAINT FK_possui_2
    FOREIGN KEY (fk_categoria_ID)
    REFERENCES categoria (ID)
    ON DELETE SET NULL;