SET foreign_key_checks = 0;

DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
    zip             INT(2) UNSIGNED NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    city            VARCHAR(50)     NOT NULL,
    state           VARCHAR(50)     NOT NULL
) ENGINE=InnoDB
;

DROP TABLE IF EXISTS customers;
CREATE TABLE customers (
    customer_id     INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    first_name      VARCHAR(50)     NOT NULL,
    last_name       VARCHAR(50)     NOT NULL,
    date_of_birth   DATE            NOT NULL,
    street          VARCHAR(50)     NOT NULL,
    zip             INT(2) UNSIGNED NOT NULL,
    phone_number    VARCHAR(25),
    INDEX (last_name),
    FOREIGN KEY (zip)
        REFERENCES locations(zip)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB
;

SET foreign_key_checks = 1;
