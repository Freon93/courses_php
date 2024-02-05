CREATE DATABASE taxi_park;

USE taxi_park;

CREATE TABLE parks
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(255) NOT NULL
);

CREATE TABLE cars
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    park_id INT,
    model   VARCHAR(255) NOT NULL,
    price   FLOAT        NOT NULL,
    CONSTRAINT cars_parks_id_fk FOREIGN KEY (park_id) REFERENCES parks (id)
);

CREATE TABLE drivers
(
    id     INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT          NOT NULL,
    name   VARCHAR(255) NOT NULL,
    phone  VARCHAR(255),
    CONSTRAINT drivers_car_id_fk FOREIGN KEY (car_id) REFERENCES cars (id)
);

CREATE TABLE customers
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(255) NOT NULL,
    phone VARCHAR(255)
);

CREATE TABLE orders
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    driver_id   INT NOT NULL,
    customer_id INT NOT NULL,
    start       TIMESTAMP,
    finish      TIMESTAMP,
    total       FLOAT,
    CONSTRAINT orders_driver_id_fk FOREIGN KEY (driver_id) REFERENCES drivers (id),
    CONSTRAINT orders_customer_id_fk FOREIGN KEY (customer_id) REFERENCES customers (id)
);
