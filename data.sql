-- Create database and use it
CREATE DATABASE IF NOT EXISTS bookstore;
USE bookstore;

-- Create penerbit table
CREATE TABLE IF NOT EXISTS penerbit (
    id_penerbit VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(50),
    alamat VARCHAR(100),
    kota VARCHAR(50),
    telepon VARCHAR(15)
);

-- Insert data into penerbit table
INSERT INTO penerbit VALUES
("SP01", "Penerbit Informatika", "Jl. Buah Batu No. 121", "Bandung", "0813-2220-1946"),
("SP02", "Andi Offset", "Jl. Suryalaya IX No. 3", "Bandung", "0878-3903-0688"),
("SP03", "Danendra", "Jl. Moch. Toha 441", "Bandung", "022-5201215");

-- Create buku table
CREATE TABLE IF NOT EXISTS buku (
    id_buku VARCHAR(10) PRIMARY KEY,
    kategori VARCHAR(50),
    harga INT,
    stok INT,
    penerbit VARCHAR(10),
    nama_buku VARCHAR(100),
    FOREIGN KEY (penerbit) REFERENCES penerbit(id_penerbit)
);

-- Insert data into buku table
INSERT INTO buku VALUES
("K1001", "Keilmuan", 50000, 60, "SP01", "Analisis & Perancangan Sistem Informasi"),
("K1002", "Keilmuan", 45000, 60, "SP01", "Artificial Intelligence"),
("K2003", "Keilmuan", 40000, 25, "SP01", "Autocad 3 Dimensi"),
("B1001", "Bisnis Online", 75000, 9, "SP01", "Keilmuan"),
("K3004", "Keilmuan", 85000, 15, "SP01", "Cloud Computing Technology"),
("81002", "Bisnis", 67500, 20, "SP01", "Etika Bisnis dan Tanggung Jawab Sosial"),
("N1001", "Novel", 68000, 10, "SP02", "Cahaya Di Penjuru Rati"),
("N1002", "Novel", 48000, 12, "SP03", "Aku Ingin Cerita");
