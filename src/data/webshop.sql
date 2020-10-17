/* Create webshop DB */
CREATE DATABASE IF NOT EXISTS webshop DEFAULT CHARSET UTF8;

USE webshop;

/* Create category table */
CREATE TABLE IF NOT EXISTS category (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

/* Create article table */
CREATE TABLE IF NOT EXISTS article (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_id INT UNSIGNED NOT NULL DEFAULT 0,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(250),
    stock INT UNSIGNED NOT NULL,
    price FLOAT UNSIGNED NOT NULL
);

/* Create user table */
CREATE TABLE IF NOT EXISTS user (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50)
);
