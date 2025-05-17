CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);

INSERT INTO users (username, password) VALUES
('admin', '12345');

-- Tabel jurusan
CREATE TABLE IF NOT EXISTS jurusan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jurusan VARCHAR(100),
    keterangan TEXT
);

INSERT INTO jurusan (nama_jurusan, keterangan) VALUES
('Teknik Informatika', 'Jurusan yang ada di STITEK'),
('Teknik Elektro', 'Jurusan yang ada di STITEK'),
('Sistem Informasi', 'Jurusan yang ada di STITEK'),
('Bisnis Digital', 'Jurusan yang ada di STITEK');
