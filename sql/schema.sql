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

DROP TABLE IF EXISTS employees;
CREATE TABLE employees (
    employee_id     INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    first_name      VARCHAR(50)     NOT NULL,
    last_name       VARCHAR(50)     NOT NULL,
    password        CHAR(40)        NOT NULL DEFAULT "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8",
    ssn             CHAR(9)         NOT NULL,
    date_of_birth   DATE            NOT NULL,
    email           VARCHAR(40)     NOT NULL,
    street          VARCHAR(50)     NOT NULL,
    zip             INT(2) UNSIGNED NOT NULL,
    phone_number    VARCHAR(25),
    manager_flag    INT(1)          NOT NULL DEFAULT 0,
    active_account  INT(1)          NOT NULL DEFAULT 1,
    INDEX (last_name),
    FOREIGN KEY (zip)
        REFERENCES locations(zip)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB
;

SET foreign_key_checks = 1;
