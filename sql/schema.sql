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

DROP TABLE IF EXISTS vehicles;
CREATE TABLE vehicles (
    vehicle_id            INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    model_id              INT             NOT NULL,
    engine_id             INT             NOT NULL,
    transmission_id       INT             NOT NULL,
    brake_id              INT             NOT NULL,
    vin                   VARCHAR(25)     NOT NULL,
    model_year            YEAR            NOT NULL,
    vehicle_condition     VARCHAR(12)     NOT NULL,
    body_color            VARCHAR(20)     NOT NULL,
    hwy_mpg               FLOAT           NOT NULL,
    city_mpg              FLOAT           NOT NULL,
    fuel_tank_size        INT UNSIGNED    NOT NULL,
    dealer_purchase_price FLOAT           NOT NULL,
    advertised_sale_price FLOAT           NOT NULL,
    miles                 INT UNSIGNED    NOT NULL,
    date_recieved         DATE            NOT NULL,
    INDEX (vin),
    INDEX (model_id), -- Might not be needed
    FOREIGN KEY (vehicle_id)
        REFERENCES features(vehicle_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
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
) ENGINE=InnoDB
;

DROP TABLE IF EXISTS features;
CREATE TABLE features (
    vehicle_id       INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    power_door       BOOLEAN         NOT NULL,
    keyless_entry    BOOLEAN         NOT NULL,
    rear_view_camera BOOLEAN         NOT NULL,
    gps              BOOLEAN         NOT NULL,
    power_window     BOOLEAN         NOT NULL,
    satellite_radio  BOOLEAN         NOT NULL,
    hybrid           BOOLEAN         NOT NULL,
    window_tint      BOOLEAN         NOT NULL,
    sunroof          BOOLEAN         NOT NULL,
    FOREIGN KEY (vehicle_id)
        REFERENCES vehicles(vehicle_id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB
;

DROP TABLE IF EXISTS sales;
CREATE TABLE sales (
    sale_id         INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    customer_id     INT             NOT NULL,
    employee_id     INT             NOT NULL,
    vehicle_id      INT             NOT NULL,
    subtotal        DECIMAL(9,2)    NOT NULL,
    total           DECIMAL(9,2)    NOT NULL,
    commission      DECIMAL(9,2)    NOT NULL    DEFAULT 0.0,
    FOREIGN KEY (customer_id)
        REFERENCES customers(customer_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (employee_id)
        REFERENCES employees(employee_id)
        ON UPDATE CASCADE ON DELETE RESTRICT
    -- TODO:  vehicle_id references vehicles(vehicle.id)
) ENGINE=InnoDB
;

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
) ENGINE=InnoDB
;

DROP TABLE IF EXISTS card_transactions;
CREATE TABLE card_transactions (
    transaction_id  INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    card_type       VARCHAR(20)     NOT NULL,
    card_number     VARCHAR(20)     NOT NULL,
    card_expiration DATE            NOT NULL,
    FOREIGN KEY (transaction_id)
        REFERENCES transactions(transaction_id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB
;

SET foreign_key_checks = 1;
