-- ===============================
-- DATABASE BIMBEL
-- ===============================
CREATE DATABASE IF NOT EXISTS bimbel_db;
USE bimbel_db;

-- ===============================
-- USERS (SISWA & ADMIN)
-- ===============================
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  gender VARCHAR(100) NOT NULL,
  username VARCHAR(100) NOT NULL,
  kelas VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  total_points INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, gender, username, kelas, email, password, total_points) VALUES
('Alya',   'Perempuan', 'alya01',   'Kelas X', 'alya@mail.com',   'alya123',   1200),
('Rizky',  'Laki-laki', 'rizky01',  'Kelas XI', 'rizky@mail.com',  'rizky123',  1100),
('Nabila', 'Perempuan', 'nabila01', 'Kelas X', 'nabila@mail.com', 'nabila123', 980),
('Naufa',  'Laki-laki', 'naufa01',  'Kelas XII', 'naufa@mail.com',  'naufa123',  975),
('Dani',   'Laki-laki', 'dani01',   'Kelas XII', 'dani@mail.com',   'dani123',   950);

-- ===============================
-- CLASSES (KELAS)
-- ===============================
CREATE TABLE classes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

INSERT INTO classes (name) VALUES
('Kelas X'),('Kelas XI'),('Kelas XII');

-- ===============================
-- SUBJECTS (MATA PELAJARAN)
-- ===============================
CREATE TABLE subjects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  class_id INT,
  FOREIGN KEY (class_id) REFERENCES classes(id)
);

INSERT INTO subjects (name,class_id) VALUES
('Matematika',3),
('Fisika',3),
('Bahasa Indonesia',3),
('Bahasa Inggris',3),
('Informatika',3),
('Biologi',3),
('Kimia',3);

-- ===============================
-- MATERIALS (MATERI BELAJAR)
-- ===============================
CREATE TABLE materials (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subject_id INT,
  title VARCHAR(150),
  content TEXT,
  video_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

-- ===============================
-- QUIZZES
-- ===============================
CREATE TABLE quizzes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subject_id INT,
  title VARCHAR(150),
  total_questions INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

INSERT INTO quizzes (subject_id,title,total_questions) VALUES
(1,'Quiz Matematika Dasar',10),
(2,'Quiz Fisika Gerak',10);

-- ===============================
-- QUESTIONS
-- ===============================
CREATE TABLE questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  quiz_id INT,
  question TEXT,
  correct_option CHAR(1),
  FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);

-- ===============================
-- OPTIONS (JAWABAN PILIHAN)
-- ===============================
CREATE TABLE options (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question_id INT,
  option_label CHAR(1),
  option_text VARCHAR(255),
  FOREIGN KEY (question_id) REFERENCES questions(id)
);

-- ===============================
-- QUIZ ATTEMPTS (HASIL QUIZ)
-- ===============================
CREATE TABLE quiz_attempts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  quiz_id INT,
  score INT,
  total_correct INT,
  total_wrong INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);

INSERT INTO quiz_attempts (user_id,quiz_id,score,total_correct,total_wrong) VALUES
(1,1,90,9,1),
(1,2,85,8,2),
(2,1,80,8,2);

-- ===============================
-- QUIZ ANSWERS (DETAIL JAWABAN)
-- ===============================
CREATE TABLE quiz_answers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  attempt_id INT,
  question_id INT,
  selected_option CHAR(1),
  is_correct BOOLEAN,
  FOREIGN KEY (attempt_id) REFERENCES quiz_attempts(id),
  FOREIGN KEY (question_id) REFERENCES questions(id)
);

-- ===============================
-- FEEDBACK (PENGATURAN / SARAN)
-- ===============================
CREATE TABLE feedback (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

