student

CREATE TABLE std_dt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(50),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    class VARCHAR(50),
    student_id VARCHAR(50) UNIQUE
)ENGINE=INNODB DEFAULT CHARSET=utf8;


SELECT * FROM attendance LIMIT 10;
ALTER TABLE std_dt ADD COLUMN percentage DECIMAL(5, 2) DEFAULT NULL;


INSERT INTO std_dt (student_number, first_name, last_name, class, student_id)
VALUES 
(1, 'นายกนกพล', 'กิตติพรประชา', 'สทส.2', '66309010001'),
(2, 'นายณชาศิลป์', 'นาเคณฑ์', 'สทส.2', '66309010002'),
(3, 'นายณัฐวัฒน์', 'รัตนเรืองโรจน์', 'สทส.2', '66309010003'),
(4, 'นายธนภัทร', 'โสตาราช', 'สทส.2', '66309010004'),
(5, 'นายธนวัฒน์', 'สมพงษ์', 'สทส.2', '66309010005'),
(6, 'นายธีรวัฒน์', 'บุญปก', 'สทส.2', '66309010006'),
(7, 'นายพชวุฒิ', 'รัชชะจิตติ', 'สทส.2', '66309010007'),
(8, 'นายพิเชษฐไชย', 'สมเทพ', 'สทส.2', '66309010008'),
(9, 'นายมานะ', 'เดชแพง', 'สทส.2', '66309010009'),
(10, 'นายรวิภาส', 'เทียนถาวร', 'สทส.2', '66309010010'),
(11, 'นายอานัส', 'ศิลปศร', 'สทส.2', '66309010011'),
(12, 'นางสาวกัลยรัตน์', 'สอนพลู', 'สทส.2', '66309010012'),
(13, 'นางสาวฉัตรชนก', 'ทวีวรรณ์', 'สทส.2', '66309010013'),
(14, 'นางสาวนิศาชล', 'มีสุข', 'สทส.2', '66309010014'),
(15, 'นางสาวพิมพ์ชนก', 'ชุ่มจันทร์', 'สทส.2', '66309010015'),
(16, 'นางสาวพิยดา', 'ลวยพิมาย', 'สทส.2', '66309010016'),
(17, 'นางสาวมาริณีย์', 'สายรัตนทองคำ', 'สทส.2', '66309010017'),
(18, 'นางสาววรรณิภา', 'รัตนพงค์', 'สทส.2', '66309010018'),
(19, 'นางสาวศิริรัตน์', 'กลั่นภูมีศรี', 'สทส.2', '66309010019'),
(20, 'นางสาวสุรีพร', 'สีอุ้ย', 'สทส.2', '66309010020'),
(21, 'นายชาญณรงค์', 'วงษ์แก้ว', 'สทส.2', '66309010021');




CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,
    attendance_date DATE NOT NULL,
    status ENUM('Present', 'Absent') NOT NULL,
    FOREIGN KEY (student_id) REFERENCES std_dt(student_id)
);


ALTER TABLE attendance
ADD COLUMN date DATE;
SELECT * FROM attendance LIMIT 10;