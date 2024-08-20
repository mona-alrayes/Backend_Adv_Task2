# to create new database named blog_db exeute the down below command 
CREATE DATABASE blog_db;
#before creating new table we must choose the right database from mysql database by using the following command
USE blog_db;
#now create posts table with all the needed columns and constrains needed by executing the down command
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
#to drop database that's the command 
DROP DATABASE blog_db;

