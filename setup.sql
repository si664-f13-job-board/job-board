drop database if exists jobboard;
create database jobboard DEFAULT CHARACTER SET utf8;

use jobboard;

drop table if exists employer;
drop table if exists listing;

CREATE TABLE employer (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	first VARCHAR(255),
	last VARCHAR(255),
	email VARCHAR(255),
	organization VARCHAR(255),
	username VARCHAR(255),
	password VARCHAR(255),
	PRIMARY KEY (id)
 ) ENGINE = InnoDB DEFAULT CHARSET=utf8;
 
 CREATE TABLE listing (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    employer_id MEDIUMINT,
	title VARCHAR(255),
	remote TINYINT,
	paid TINYINT,
	hours MEDIUMINT,
	date DATE,
	end_date DATE,
	remote TINYINT,
	link VARCHAR(255),
	description LONGTEXT,
	skills LONGTEXT,
	link VARCHAR(255),
	email VARCHAR(255),
	name VARCHAR(255),
	
	CONSTRAINT `employer_ref`
	  FOREIGN KEY (`employer_id`)
	  REFERENCES `employer` (`id`),
	  
	PRIMARY KEY (id)
	
   ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

insert into employer (first, last, email, organization, username, password) values (
	'test_first', 'test_last', 'test_email', 'test_org', 'test_user', 'test_pw');

insert into listing (employer_id, title, remote, paid, hours, date, end_date, description, skills) values (
	'1', 'test_title', '1', '1', '10', '20010101', '20020101', 'test_long_descrpt', 'test_long_skills');
insert into listing (employer_id, title, remote, paid, hours, date, end_date, description, skills) values (
	'1', 'test_title222', '1', '1', '10', '20010101', '20020101', 'test_long_descrpt', 'test_long_skills')