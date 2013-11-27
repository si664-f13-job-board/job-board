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
<<<<<<< HEAD
	position VARCHAR(255),
	salary VARCHAR(255),
=======
	title VARCHAR(255),
	remote TINYINT,
	paid TINYINT,
	hours MEDIUMINT,
>>>>>>> 8ca14504ceecfae6cb0f90ec36bfc15cf70c6075
	date DATE,
	end_date DATE,
	description LONGTEXT,
	skills LONGTEXT,
	link VARCHAR(255),
<<<<<<< HEAD
	descr VARCHAR(4096),
=======
	email VARCHAR(255),
	name VARCHAR(255),
	
	CONTRAINT `employer_ref`
		FOREIGN KEY (`employer_id`)
		REFERENCES `employer` (`id`),
		
>>>>>>> 8ca14504ceecfae6cb0f90ec36bfc15cf70c6075
	PRIMARY KEY (id)

 ) ENGINE = InnoDB DEFAULT CHARSET=utf8;
