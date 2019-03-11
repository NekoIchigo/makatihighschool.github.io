CREATE TABLE admin(
	adminId int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
	adminName varchar(30) NOT NULL,
	adminPwd varchar(30) NOT NULL
);

CREATE TABLE grade(
	gradeId int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
	grade varchar(30) NOT NULL
);

CREATE TABLE section(
	sectionId int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
	section varchar(30) NOT NULL
);

CREATE TABLE subject(
	subjectId int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
	subject varchar(30) NOT NULL
);

CREATE TABLE student(
	studentId int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
	fname varchar(30) NOT NULL,
	mname varchar(30) NOT NULL,
	lname varchar(30) NOT NULL,
	email varchar(30) NOT NULL,
	pwd varchar(30) NOT NULL,
	grdId int(11) NOT NULL,
	secId int(11) NOT NULL,
	FOREIGN KEY (grdId) REFERENCES grade(gradeId),
	FOREIGN KEY (secId) REFERENCES section(sectionId)
);

CREATE TABLE teacher(
	teacherId int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	fname varchar(30) NOT NULL,
	mname varchar(30) NOT NULL,
	lname varchar(30) NOT NULL,
	email varchar(30) NOT NULL,
	pwd varchar(30) NOT NULL,
	subId int(11) NOT NULL,
	grdId int(11) NOT NULL,
	secId int(11) NOT NULL,
	FOREIGN KEY (subId) REFERENCES subject(subjectId),
	FOREIGN KEY (grdId) REFERENCES grade(gradeId),
	FOREIGN KEY (secId) REFERENCES section(sectionId)
);

CREATE TABLE addSec(
	addId int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
	teacherId int(11) NOT NULL,
	grdId int(11) NOT NULL,
	secId int(11) NOT NULL,
	FOREIGN KEY (teacherId) REFERENCES teacher(teacherId),
	FOREIGN KEY (secId) REFERENCES section(sectionId),
	FOREIGN KEY (grdId) REFERENCES grade(gradeId)
);

CREATE TABLE addSub(
	addId int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
	teacherId int(11) NOT NULL,
	subId int(11) NOT NULL,
	FOREIGN KEY (teacherId) REFERENCES teacher(teacherId),
	FOREIGN KEY (subId) REFERENCES subject(subjectId)
);

CREATE TABLE grades(
	gradesId int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	1st int(2) NOT NULL,
	2nd int(2) NOT NULL,
	3rd int(2) NOT NULL,
	4th int(2) NOT NULL,
	f_grd int(2) NOT NULL,
	s_Id int(11) NOT NULL,
	t_Id int(11) NOT NULL,
	subId int(11) NOT NULL,
	FOREIGN KEY (s_Id) REFERENCES student(studentId),
	FOREIGN KEY (t_Id) REFERENCES teacher(teacherId),
	FOREIGN KEY (subId) REFERENCES subject(subjectId)
);

INSERT INTO grade (grade) VALUES (11);
INSERT INTO grade (grade) VALUES (12);
INSERT INTO section (section) VALUES ('TVL');
INSERT INTO section (section) VALUES ('HUMSS');
INSERT INTO section (section) VALUES ('ABM');
INSERT INTO section (section) VALUES ('STEM');
INSERT INTO subject (subject) VALUES ('MATH');
INSERT INTO subject (subject) VALUES ('SCIENCE');
INSERT INTO subject (subject) VALUES ('FILIPINO');
INSERT INTO subject (subject) VALUES ('ENGLISH');
INSERT INTO subject (subject) VALUES ('ARALIN PANLIPUNAN');
INSERT INTO subject (subject) VALUES ('TVL');
INSERT INTO subject (subject) VALUES ('VALUES');
