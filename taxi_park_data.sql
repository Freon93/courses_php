USE taxi_park;

DROP TABLE orders;

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

ALTER TABLE orders
    MODIFY start VARCHAR(255) NOT NULL;

ALTER TABLE orders
    MODIFY finish VARCHAR(255) NOT NULL;

CREATE UNIQUE INDEX drivers_phone_uindex
    ON drivers (phone);

CREATE UNIQUE INDEX customers_phone_uindex
    ON customers (phone);

INSERT INTO parks (address)
VALUES ('Soludenka, 5'),
       ('Kreschatyk. 8'),
       ('Symyrenka, 25'),
       ('Koltsova, 15'),
       ('Borshahivska, 32');

INSERT INTO cars (park_id, model, price)
# park_id (1-5)
VALUES (5, 'BMW', 80),
       (3, 'Lanos', 40),
       (4, 'Ford', 60),
       (2, 'Mazda', 60),
       (1, 'Chery', 45);

INSERT INTO drivers (car_id, name, phone)
# car_id (1-5)
VALUES (4, 'Petro', '52545'),
       (5, 'Vasyl', '45695'),
       (2, 'Ivan', '45625'),
       (1, 'Dima', '12564'),
       (3, 'Pavlo', '65215');

INSERT INTO customers (name, phone)
VALUES ('Anna', '54695'),
       ('Serhyi', '56125'),
       ('Bohdan', '54925'),
       ('Lesya', '75651'),
       ('Orest', '12564');

INSERT INTO orders(driver_id, customer_id, start, finish, total)
# driver_id (1-5), customer_id (1-5)
VALUES (4, 4, 'Koltsova, 15', 'Borshahivska, 32', 154.45),
       (1, 2, 'Borshahivska, 32', 'Kreschatyk. 8', 122.38),
       (3, 1, 'Kreschatyk. 8', 'Symyrenka, 25', 115.45),
       (2, 3, 'Soludenka, 5', 'Koltsova, 15', 264.25),
       (5, 5, 'Symyrenka, 25', 'Koltsova, 15', 83.45),
       (5, 2, 'Kreschatyk. 8', 'Soludenka, 5', 165.35),
       (2, 1, 'Soludenka, 5', 'Kreschatyk. 8', 245.35),
       (3, 3, 'Koltsova, 15', 'Soludenka, 5', 126.25),
       (4, 4, 'Symyrenka, 25', 'Borshahivska, 32', 85.25),
       (1, 5, 'Borshahivska, 32', 'Symyrenka, 25', 165.34);

UPDATE parks
SET address = 'Irpinska, 48'
WHERE id = 3;

DELETE
FROM orders
WHERE id = 26;

# all distinct starts
SELECT DISTINCT(start)
FROM orders;

# quantity of finishes
SELECT finish, COUNT(finish) qty
FROM orders
GROUP BY finish;

# base info about orders
SELECT d.name driver, c.name customer, start, finish, total
FROM orders o
         JOIN drivers d on o.driver_id = d.id
         JOIN customers c ON o.customer_id = c.id;

# best driver
SELECT ROW_NUMBER() over (ORDER BY SUM(total) DESC) place, d.name, SUM(total) sum
FROM drivers d
         JOIN orders o on o.driver_id = d.id
GROUP BY name
ORDER BY sum DESC;

CREATE TABLE car_level
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

INSERT INTO car_level (name)
VALUES ('Econom'),
       ('Comfort'),
       ('Business');


ALTER TABLE cars
    ADD car_level_id INT DEFAULT 1 NOT NULL;

ALTER TABLE cars
    ADD CONSTRAINT cars_car_level_id_fk
        FOREIGN KEY (car_level_id) REFERENCES car_level (id);

UPDATE cars
SET cars.car_level_id = CASE
                            WHEN price > 70 THEN 3
                            WHEN price >= 50 AND price <= 70 THEN 2
                            WHEN price < 50 THEN 1
    END
WHERE id IS NOT NULL;

# get cars levels
SELECT c.model, cl.name
FROM cars c
         JOIN car_level cl on c.car_level_id = cl.id;

#get all taxi park cars levels quantity
SELECT cl.name, COUNT(c.car_level_id) qty
FROM cars c
         JOIN car_level cl on c.car_level_id = cl.id
GROUP BY cl.name;
