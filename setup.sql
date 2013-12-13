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
	'mjohood.umich.edu', 'proquest', 'Mallory', 'ProQuest');
INSERT INTO employer (email, password, name, organization) VALUES (
	'swanbrow@umich.edu', 'web', 'Diane', 'Institute for Social Research');

INSERT INTO listing (employer_id, title, remote, paid, hours, post_date, end_date, link, description, skills, name, email) VALUES (
	'1', 'Account Manager - Library Market', '0', '1', '40', '20131210', '20130228', 'http://www.proquest.com/', 'The Account Manager - Inside leads and coordinates sales activity for an assigned territory, utilizing expertise and other resources such as product specialists and field marketing teams to meet and exceed sales targets.', 'Bachelors’ degree plus at least 3 years’ related experience as a direct sales professional or equivalent combination of education and experience.', 'Mallory Jane Hood', 'mjhood@umich.edu');
INSERT INTO listing (employer_id, title, remote, paid, hours, post_date, end_date, link, description, skills, name, email) VALUES (
	'2', 'Web Assistant', '1', '1', '10-15', '20131205', '20140106', 'Web assistant for WordPress website, working in busy Communications office. Candidate will be responsible for posting new content and for routine maintenance and upkeep of website.', 'Wordpress, PhotoShop/Illustrator, user testing experience, HTML, CSS, PHP, FTP', 'Diane', 'swanbrow@umich.edu');
INSERT INTO listing (employer_id, title, remote, paid, hours, post_date, end_date, link, description, skills, name, email) VALUES (	
	'1', 'Test Listing 1', '1', '0', '8', '20010101', '20020101', 'http://www.lordoftherings.net/', 'Description goes here.', 'HTML, CSS, Javascript', 'Gandalf', 'gandalf@lordoftherings.net');
INSERT INTO listing (employer_id, title, remote, paid, hours, post_date, end_date, link, description, skills, name, email) VALUES (
	'2', 'Test Listing 2', '0', '1', '40', '20010101', '20020101', 'http://www.lordoftherings.net/', 'Description goes here.', 'PHP, MySQL', 'Sauron', 'sauron@lordoftherings.net');

