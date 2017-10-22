create database registeration;
use registeration;

CREATE TABLE Department (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    PRIMARY KEY (id)
);


CREATE TABLE User (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL, 
    email VARCHAR(250) NOT NULL,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    department_id INT,
    PRIMARY KEY(id),
    FOREIGN KEY (department_id) REFERENCES Department(id)
);

create table Course(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    instructor_name VARCHAR(100),
    credit_hours TINYINT NOT NULL,
    department_id INT,
    PRIMARY KEY(id),
    FOREIGN KEY (department_id) REFERENCES Department(id)
);

