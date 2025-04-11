CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE admins (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,     
    adminname VARCHAR(50) NOT NULL UNIQUE,       
    password VARCHAR(255) NOT NULL,             
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
);



