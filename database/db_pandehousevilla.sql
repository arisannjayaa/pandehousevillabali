CREATE DATABASE sip_project;

USE sip_project;

CREATE TABLE customer(
id_customer INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(50),
username VARCHAR(20),
PASSWORD VARCHAR(100),
nomer_telepon VARCHAR(20));

CREATE TABLE pemilik(
id_pemilik INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(50),
username VARCHAR(20),
PASSWORD VARCHAR(100)
);

CREATE TABLE contact_person(
id_contact_person INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
jenis_cp VARCHAR(30),
isi_cp VARCHAR(30),
id_pemilik INT,
FOREIGN KEY (id_pemilik) REFERENCES pemilik(id_pemilik));

CREATE TABLE transaksi(
id_transaksi INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
tipe_transaksi VARCHAR(15),
status_pembayaran VARCHAR(15),
status_pesanan VARCHAR(15),
kode_unik INT,
id_customer INT,
id_pemilik INT,
FOREIGN KEY (id_pemilik) REFERENCES pemilik(id_pemilik),
FOREIGN KEY (id_customer) REFERENCES customer(id_customer));

CREATE TABLE villa(
id_villa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(60),
deskripsi TEXT,
harga INT
);

CREATE TABLE ketersediaan(
id_ketersediaan INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
tanggal DATE,
STATUS VARCHAR(15),
id_villa INT,
id_pemilik INT,
FOREIGN KEY (id_pemilik) REFERENCES pemilik(id_pemilik),
FOREIGN KEY (id_villa) REFERENCES villa(id_villa));

CREATE TABLE detail_transaksi(
id_detail_transaksi INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_villa INT,
id_transaksi INT,
FOREIGN KEY (id_transaksi) REFERENCES transaksi(id_transaksi),
FOREIGN KEY (id_villa) REFERENCES villa(id_villa));

CREATE TABLE detail_villa(
id_detail_villa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
fasilitas VARCHAR(60),
deskripsi TEXT,
foto VARCHAR(100),
id_villa INT,
FOREIGN KEY (id_villa) REFERENCES villa(id_villa));

CREATE TABLE galeri(
id_galeri INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
foto VARCHAR(100),
id_villa INT,
FOREIGN KEY (id_villa) REFERENCES villa(id_villa));
