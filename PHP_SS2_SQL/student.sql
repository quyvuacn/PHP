create database student;
use student;
create table student(
    rollNo varchar(10) not null ,
    stu_name varchar(50) not null ,
    stu_dob date,
    primary key (rollNo)
);


insert into student values
    ('TH2109016','Vũ Viết Quý','2003-01-09'),
    ('TH2109017','Nguyễn Đắc Dũng','2003-02-08'),
    ('TH2109018','Tạ Duy Linh','2003-07-15'),
    ('TH2109019','Nguyễn Danh Hưng','2003-02-06'),
    ('TH2109020','Đinh Quang Anh','1999-12-12'),
    ('TH2109021','Nguyễ Mai Quân','2003-06-09');

delete from student where rollNo like 'T%';