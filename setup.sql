DROP DATABASE IF EXISTS jobboard;
CREATE DATABASE jobboard DEFAULT CHARACTER SET utf8;

USE jobboard;

DROP TABLE IF EXISTS listing;
DROP TABLE IF EXISTS employer;

CREATE TABLE employer (
	employer_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	email VARCHAR(255),
	password VARCHAR(255),
	name VARCHAR(255),
	organization VARCHAR(255),
	PRIMARY KEY (employer_id)
 ) ENGINE = InnoDB DEFAULT CHARSET=utf8;
 
CREATE TABLE listing (
    listing_id MEDIUMINT NOT NULL AUTO_INCREMENT,
    employer_id MEDIUMINT,
	title VARCHAR(255),
	remote TINYINT,
	paid TINYINT,
	hours MEDIUMINT,
	post_date DATE,
	end_date DATE,
	link VARCHAR(255),
	description LONGTEXT,
	skills LONGTEXT,
	name VARCHAR(255),
	email VARCHAR(255),
	
	PRIMARY KEY (listing_id),
	FOREIGN KEY (employer_id) REFERENCES employer (employer_id)
	
   ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO employer (email, password, name, organization) VALUES (
	'gandalf@lordoftherings.net', 'white', 'Gandalf', 'Fellowship of the Ring');
INSERT INTO employer (email, password, name, organization) VALUES (
	'sauron@lordoftherings.net', 'ring', 'Sauron', 'Mordor Enterprises');

INSERT INTO listing (employer_id, title, remote, paid, hours, post_date, end_date, link, description, skills, name, email) VALUES (
	'1', 'Test Listing 1', '1', '0', '8', '20010101', '20020101', 'http://www.lordoftherings.net/', 'Description goes here.', 'HTML, CSS, Javascript', 'Gandalf', 'gandalf@lordoftherings.net');
INSERT INTO listing (employer_id, title, remote, paid, hours, post_date, end_date, link, description, skills, name, email) VALUES (
	'1', 'Test Listing 1_1', '1', '0', '8', '20010101', '20020101', 'http://www.lordoftherings.net/', 'Description goes here.', 'HTML, CSS, Javascript', 'Gandalf', 'gandalf@lordoftherings.net');
INSERT INTO listing (employer_id, title, remote, paid, hours, post_date, end_date, link, description, skills, name, email) VALUES (
	'2', 'Test Listing 2', '0', '1', '40', '20010101', '20020101', 'http://www.lordoftherings.net/', 'Description goes here.', 'PHP, MySQL', 'Sauron', 'sauron@lordoftherings.net');