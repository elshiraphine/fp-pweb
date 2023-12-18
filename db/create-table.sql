CREATE TABLE calon_siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat TEXT,
    jenis_kelamin ENUM('laki-laki', 'perempuan') NOT NULL,
    agama VARCHAR(50) NOT NULL,
    sekolah_asal VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);