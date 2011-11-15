SET foreign_key_checks = 0;

DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
    zip             INT(2) UNSIGNED NOT NULL    PRIMARY KEY,
    city            VARCHAR(50)     NOT NULL,
    state           VARCHAR(50)     NOT NULL
);

DROP TABLE IF EXISTS customers;
CREATE TABLE customers (
    customer_id     INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    first_name      VARCHAR(50)     NOT NULL,
    last_name       VARCHAR(50)     NOT NULL,
    date_of_birth   DATE            NOT NULL,
    street          VARCHAR(50)     NOT NULL,
    zip             INT(2) UNSIGNED NOT NULL,
    phone_number    VARCHAR(16), -- Can be up to '+XX-YYY-ZZZ-ZZZZ'
    INDEX (last_name),
    FOREIGN KEY (zip)
        REFERENCES locations(zip)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

DROP TABLE IF EXISTS employees;
CREATE TABLE employees (
    employee_id     INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    first_name      VARCHAR(50)     NOT NULL,
    last_name       VARCHAR(50)     NOT NULL,
    password        BINARY(20)      NOT NULL    DEFAULT 0x5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8,
    ssn             CHAR(9)         NOT NULL,
    date_of_birth   DATE            NOT NULL,
    email           VARCHAR(40)     NOT NULL,
    street          VARCHAR(50)     NOT NULL,
    zip             INT(2) UNSIGNED NOT NULL,
    phone_number    VARCHAR(16), -- Can be up to '+XX-YYY-ZZZ-ZZZZ'
    manager_flag    INT(1)          NOT NULL    DEFAULT 0,
    active_account  INT(1)          NOT NULL    DEFAULT 1,
    INDEX (last_name),
    FOREIGN KEY (zip)
        REFERENCES locations(zip)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

DROP TABLE IF EXISTS brakes;
CREATE TABLE brakes (
    brake_id            INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    brake_abs_system    INT(1)          NOT NULL    DEFAULT 1,
    front_brake_type    INT(1)          NOT NULL    DEFAULT 1,
    rear_brake_type     INT(1)          NOT NULL    DEFAULT 1
);

DROP TABLE IF EXISTS transmissions;
CREATE TABLE transmissions (
    transmission_id     INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    drivetrain          VARCHAR(20)     NOT NULL,
    transmission_type   VARCHAR(20)     NOT NULL,
    num_gears           INT             NOT NULL
);

DROP TABLE IF EXISTS engines;
CREATE TABLE engines (
    engine_id           INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    displacement        FLOAT           NOT NULL,
    fuel_system         VARCHAR(20)     NOT NULL,
    horsepower          INT             NOT NULL,
    torque              INT             NOT NULL,
    cylinders           INT,
    shape               VARCHAR(20)     NOT NULL    DEFAULT "V-shaped"
);

DROP TABLE IF EXISTS makes;
CREATE TABLE makes (
    make_id             INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    make_name           VARCHAR(40)     NOT NULL,
    INDEX (make_name)
);

DROP TABLE IF EXISTS models;
CREATE TABLE models (
    model_id            INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    model_name          VARCHAR(40)     NOT NULL,
    make_id             INT             NOT NULL,
    trim                VARCHAR(20)     NOT NULL,
    body_type           VARCHAR(24)     NOT NULL,
    INDEX (model_name),
    FOREIGN KEY (make_id)
        REFERENCES makes(make_id)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

DROP TABLE IF EXISTS vehicles;
CREATE TABLE vehicles (
    vehicle_id            INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    feature_set           BIT(9)          NOT NULL,
    model_id              INT             NOT NULL,
    engine_id             INT             NOT NULL,
    transmission_id       INT             NOT NULL,
    brake_id              INT             NOT NULL,
    vin                   VARCHAR(25)     NOT NULL,
    model_year            YEAR            NOT NULL,
    vehicle_condition     VARCHAR(12)     NOT NULL, -- new,used-clean,used-average,used-rough,salvage
    body_color            VARCHAR(20)     NOT NULL,
    hwy_mpg               FLOAT           NOT NULL,
    city_mpg              FLOAT           NOT NULL,
    fuel_tank_size        INT UNSIGNED    NOT NULL,
    dealer_purchase_price DECIMAL(9,2)    NOT NULL,
    advertised_sale_price DECIMAL(9,2)    NOT NULL,
    miles                 INT UNSIGNED    NOT NULL,
    date_recieved         DATE            NOT NULL,
    INDEX (vin),
    FOREIGN KEY (model_id)
        REFERENCES models(model_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (engine_id)
        REFERENCES engines(engine_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (model_id)
        REFERENCES transmissions(transmission_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (brake_id)
        REFERENCES brakes(brake_id)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

DROP TABLE IF EXISTS features;
CREATE TABLE features (
       string_position TINYINT UNSIGNED NOT NULL PRIMARY KEY,
       feature         VARCHAR(25)      NOT NULL,
       INDEX (feature)
);

DROP TABLE IF EXISTS sales;
CREATE TABLE sales (
    sale_id         INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    customer_id     INT             NOT NULL,
    employee_id     INT             NOT NULL,
    vehicle_id      INT             NOT NULL,
    subtotal        DECIMAL(9,2)    NOT NULL,
    total           DECIMAL(9,2)    NOT NULL,
    commission      DECIMAL(9,2)    NOT NULL    DEFAULT 0.0,
    sale_date       DATE            NOT NULL,
    FOREIGN KEY (customer_id)
        REFERENCES customers(customer_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (employee_id)
        REFERENCES employees(employee_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (vehicle_id)
        REFERENCES vehicles(vehicle_id)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

DROP TABLE IF EXISTS transactions;
CREATE TABLE transactions (
    transaction_id  INT             NOT NULL    AUTO_INCREMENT,
    sale_id         INT             NOT NULL,
    payment_amount  DECIMAL(9,2)    NOT NULL,
    transaction_date DATE           NOT NULL,
    PRIMARY KEY (transaction_id, sale_id),
    FOREIGN KEY (sale_id)
        REFERENCES sales(sale_id)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

DROP TABLE IF EXISTS card_transactions;
CREATE TABLE card_transactions (
    transaction_id  INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    card_type       VARCHAR(20)     NOT NULL,
    card_number     VARCHAR(20)     NOT NULL,
    card_expiration DATE            NOT NULL,
    FOREIGN KEY (transaction_id)
        REFERENCES transactions(transaction_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS cash_transactions;
CREATE TABLE cash_transactions (
    transaction_id  INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (transaction_id)
        REFERENCES transactions(transaction_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS check_transactions;
CREATE TABLE check_transactions (
    transaction_id  INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    routing_number  VARCHAR(15)     NOT NULL,
    account_number  VARCHAR(15)     NOT NULL,
    FOREIGN KEY (transaction_id)
        REFERENCES transactions(transaction_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

SET foreign_key_checks = 1;
