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
	description LONGTEXT,
	skills LONGTEXT,
	link VARCHAR(255),
	email VARCHAR(255),
	name VARCHAR(255),
	
	CONTRAINT `employer_ref`
		FOREIGN KEY (`employer_id`)
		REFERENCES `employer` (`id`),
		
	PRIMARY KEY (id)

 ) ENGINE = InnoDB DEFAULT CHARSET=utf8;
