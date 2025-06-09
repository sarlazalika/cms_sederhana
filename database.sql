-- Hapus tabel jika sudah ada
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS artikel;

-- Buat tabel admin
CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(255)
);

-- Insert data admin baru
INSERT INTO admin (username, password) VALUES ('sarla', MD5('12345'));

-- Buat tabel artikel
CREATE TABLE artikel (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(255),
  isi TEXT,
  tanggal DATE
);
