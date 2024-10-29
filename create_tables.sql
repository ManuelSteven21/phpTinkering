CREATE TABLE films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    director VARCHAR(255),
    year INT,
    description VARCHAR(255),
    genre VARCHAR(20),
    duration INT,
    cast VARCHAR(100)
);

CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    developers VARCHAR(255),
    year INT,
    genre VARCHAR(20),
    description VARCHAR(255),
);
