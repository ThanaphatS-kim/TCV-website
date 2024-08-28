student
CREATE TABLE std_dt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(50),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    class VARCHAR(50),
    student_id VARCHAR(50) UNIQUE
) ENGINE=INNODB DEFAULT CHARSET=utf8;

ALTER TABLE std_dt
ADD COLUMN total_attendance INT DEFAULT 0;

INSERT INTO std_dt (student_number, first_name, last_name, class, student_id)
VALUES 
('66309010001', 'นายกนกพล', 'กิตติพรประชา', 'สทส.2', '66309010001'),
('66309010002', 'นายณชาศิลป์', 'นาเคณฑ์', 'สทส.2', '66309010002'),
('66309010003', 'นายณัฐวัฒน์', 'รัตนเรืองโรจน์', 'สทส.2', '66309010003'),
('66309010004', 'นายธนภัทร', 'โสตาราช', 'สทส.2', '66309010004'),
('66309010005', 'นายธนวัฒน์', 'สมพงษ์', 'สทส.2', '66309010005'),
('66309010006', 'นายธีรวัฒน์', 'บุญปก', 'สทส.2', '66309010006'),
('66309010007', 'นายพชวุฒิ', 'รัชชะจิตติ', 'สทส.2', '66309010007'),
('66309010008', 'นายพิเชษฐไชย', 'สมเทพ', 'สทส.2', '66309010008'),
('66309010009', 'นายมานะ', 'เดชแพง', 'สทส.2', '66309010009'),
('66309010010', 'นายรวิภาส', 'เทียนถาวร', 'สทส.2', '66309010010'),
('66309010011', 'นายอานัส', 'ศิลปศร', 'สทส.2', '66309010011'),
('66309010012', 'นางสาวกัลยรัตน์', 'สอนพลู', 'สทส.2', '66309010012'),
('66309010013', 'นางสาวฉัตรชนก', 'ทวีวรรณ์', 'สทส.2', '66309010013'),
('66309010014', 'นางสาวนิศาชล', 'มีสุข', 'สทส.2', '66309010014'),
('66309010015', 'นางสาวพิมพ์ชนก', 'ชุ่มจันทร์', 'สทส.2', '66309010015'),
('66309010016', 'นางสาวพิยดา', 'ลวยพิมาย', 'สทส.2', '66309010016'),
('66309010017', 'นางสาวมาริณีย์', 'สายรัตนทองคำ', 'สทส.2', '66309010017'),
('66309010018', 'นางสาววรรณิภา', 'รัตนพงค์', 'สทส.2', '66309010018'),
('66309010019', 'นางสาวศิริรัตน์', 'กลั่นภูมีศรี', 'สทส.2', '66309010019'),
('66309010020', 'นางสาวสุรีพร', 'สีอุ้ย', 'สทส.2', '66309010020'),
('66309010021', 'นายชาญณรงค์', 'วงษ์แก้ว', 'สทส.2', '66309010021');



CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- ไอดีประจำแต่ละเรคคอร์ด
    student_id VARCHAR(20) NOT NULL,       -- รหัสนักเรียน
    date DATE NOT NULL,                    -- วันที่เข้าเรียน
    status TINYINT(1) NOT NULL,            -- สถานะการเข้าเรียน (1 = เข้าพบ, 0 = ขาด)
    check_in_time TIME NOT NULL,           -- เวลาที่เข้ามา
    FOREIGN KEY (student_id) REFERENCES std_dt(student_id)  -- การเชื่อมโยงกับตารางนักเรียน
)ENGINE=INNODB DEFAULT CHARSET=utf8;











-- CREATE TABLE attendance (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     student_id VARCHAR(20) NOT NULL,
--     attendance_date DATE NOT NULL,
--     status ENUM('Present', 'Absent') NOT NULL,
--     FOREIGN KEY (student_id) REFERENCES std_dt(student_id)
-- );


-- ALTER TABLE attendance
-- ADD COLUMN date DATE;
-- SELECT * FROM attendance LIMIT 10;



CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,
    date DATE NOT NULL,
    status TINYINT(1) NOT NULL,
    check_in_time TIME NOT NULL,
    FOREIGN KEY (student_id) REFERENCES std_dt(student_id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;



CREATE TABLE std_dt (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- ใช้สำหรับรหัสเฉพาะของนักเรียน
    student_number VARCHAR(20) NOT NULL, -- หมายเลขประจำตัวนักเรียน
    first_name VARCHAR(50) NOT NULL,    -- ชื่อของนักเรียน
    last_name VARCHAR(50) NOT NULL,     -- นามสกุลของนักเรียน
    class VARCHAR(10) NOT NULL,         -- ชั้นเรียน
    student_id VARCHAR(20) UNIQUE NOT NULL, -- รหัสนักเรียน (ต้องไม่ซ้ำกัน)
    percentage DECIMAL(5, 2) DEFAULT 0, -- เปอร์เซ็นต์การเข้าร่วม
    UNIQUE (student_id)                 -- คำสั่งในการทำให้ student_id เป็นค่าที่ไม่ซ้ำกัน
);



CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(20) NOT NULL,
    date DATE NOT NULL,
    status TINYINT(1) NOT NULL, -- 1 for present, 0 for absent
    check_in_time TIME,
    week_number INT,
    year INT,
    FOREIGN KEY (student_number) REFERENCES std_dt(student_number)
)ENGINE=INNODB DEFAULT CHARSET=utf8;


CREATE TABLE std_dt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(20) UNIQUE NOT NULL,
    student_id VARCHAR(20) UNIQUE NOT NULL, -- If you still need this
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    class VARCHAR(20),
    total_days_attended INT DEFAULT 0
)ENGINE=INNODB DEFAULT CHARSET=utf8;
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