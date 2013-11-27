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
 
-- added position and salary field
CREATE TABLE listing (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	employer_id MEDIUMINT,
	position VARCHAR(255),
	salary VARCHAR(255),
	date DATE,
	end_date DATE,
	location VARCHAR(255),
	link VARCHAR(255),
	descr VARCHAR(4096),
	PRIMARY KEY (id)
 ) ENGINE = InnoDB DEFAULT CHARSET=utf8;