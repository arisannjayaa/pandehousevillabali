CREATE DATABASE db_pandehousevillabali;

USE db_pandehousevillabali;

CREATE TABLE tb_villa(
	id_villa INT PRIMARY KEY AUTO_INCREMENT,
	nama VARCHAR(100),
	deskripsi TEXT,
	harga INT,
	created_at TIMESTAMP,
	updated_at TIMESTAMP
);

CREATE TABLE tb_galeri(
	id_galeri INT PRIMARY KEY AUTO_INCREMENT,
	foto VARCHAR(100),
	id_villa INT,
	FOREIGN KEY (id_villa) REFERENCES tb_villa(id_villa),
	created_at TIMESTAMP,
	updated_at TIMESTAMP
)
