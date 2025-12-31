CREATE DATABASE `pendaftaran_siswa`;

CREATE TABLE `pendaftaran_siswa`.`calon_siswa` (
    `id` INT NOT NULL AUTO_INCREMENT ,  
    `nama` VARCHAR(64) NOT NULL ,  
    `alamat` VARCHAR(255) NOT NULL ,  
    `jenis_kelamin` VARCHAR(16) NOT NULL ,  
    `agama` VARCHAR(16) NOT NULL ,  
    `sekolah_asal` VARCHAR(64) NOT NULL ,    
    PRIMARY KEY  (`id`)
) ENGINE = InnoDB;

INSERT INTO `calon_siswa` (`id`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `sekolah_asal`) VALUES (NULL, 'Lia', 'Jl. Mangga No. 3, Mataram', 'perempuan', 'islam', 'SMPN 32 Ampenan');