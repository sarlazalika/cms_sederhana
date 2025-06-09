-- Hapus foreign key constraint jika ada
ALTER TABLE artikel
DROP FOREIGN KEY IF EXISTS artikel_ibfk_1;

-- Hapus kolom kategori_id
ALTER TABLE artikel
DROP COLUMN IF EXISTS kategori_id;

-- Hapus tabel kategori
DROP TABLE IF EXISTS kategori;

-- Perbarui struktur tabel artikel
ALTER TABLE artikel
MODIFY COLUMN judul VARCHAR(255) NOT NULL,
MODIFY COLUMN isi TEXT NOT NULL,
MODIFY COLUMN tanggal DATE NOT NULL DEFAULT CURRENT_DATE,
ADD COLUMN IF NOT EXISTS slug VARCHAR(255) NOT NULL AFTER judul,
ADD COLUMN IF NOT EXISTS gambar VARCHAR(255) NULL AFTER isi;

-- Update slug untuk artikel yang sudah ada
UPDATE artikel 
SET slug = LOWER(REPLACE(REPLACE(REPLACE(judul, ' ', '-'), '.', ''), ',', ''))
WHERE slug IS NULL OR slug = '';

-- Tambahkan indeks untuk optimasi pencarian
ALTER TABLE artikel
ADD INDEX idx_slug (slug),
ADD INDEX idx_tanggal (tanggal);

-- Tambahkan kolom created_at dan updated_at untuk tracking
ALTER TABLE artikel
ADD COLUMN IF NOT EXISTS created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN IF NOT EXISTS updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP; 