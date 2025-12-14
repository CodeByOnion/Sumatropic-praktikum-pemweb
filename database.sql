

USE sumatropic_db;

-- 1. Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'member') DEFAULT 'member',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabel Flora & Fauna
CREATE TABLE flora (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lokal VARCHAR(100) NOT NULL,
    nama_ilmiah VARCHAR(100),
    status_konservasi VARCHAR(50), 
    deskripsi TEXT,
    asal_provinsi VARCHAR(100), -- Kolom baru
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE fauna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lokal VARCHAR(100) NOT NULL,
    nama_ilmiah VARCHAR(100),
    status_konservasi VARCHAR(50), 
    deskripsi TEXT,
    asal_provinsi VARCHAR(100), -- Kolom baru
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabel Berita (Disesuaikan dengan Desain Kartu)
CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,       
    deskripsi_singkat VARCHAR(255),    
    url_sumber TEXT NOT NULL,          
    gambar VARCHAR(255),               
    tanggal_tayang DATE,               
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Tabel Volunteer
CREATE TABLE volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,       
    deskripsi_singkat VARCHAR(255),    
    url_sumber TEXT NOT NULL,          
    gambar VARCHAR(255),          
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5. Tabel Donasi
CREATE TABLE donate(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    jumlah_donasi DECIMAL(10, 2) NOT NULL,
    metode_pembayaran VARCHAR(50) NOT NULL,
    gambar VARCHAR(255),
    tanggal_donasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 6. Insert Akun Admin (Password: admin123)
INSERT INTO users (username, email, password, role) 
VALUES ('Admin', 'admin@sumatropic.com', 'admin 123', 'admin');