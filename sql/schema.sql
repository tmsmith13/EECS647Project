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

DROP TABLE IF EXISTS vehicles;
CREATE TABLE vehicles (
    vehicle_id            INT             NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    model_id              INT             NOT NULL,
    engine_id             INT             NOT NULL,
    transmission_id       INT             NOT NULL,
    brake_id              INT             NOT NULL,
    vin                   VARCHAR(25)     NOT NULL,
    year                  INT UNSIGNED    NOT NULL,
    vehicle_condition     VARCHAR(12)     NOT NULL,
    body_color            VARCHAR(20)     NOT NULL,
    hwy_mpg               FLOAT           NOT NULL,
    city_mpg              FLOAT           NOT NULL,
    fuel_tank_size        INT UNSIGNED    NOT NULL,
    dealer_purchase_price FLOAT           NOT NULL,
    advertised_sale_price FLOAT           NOT NULL,
    miles                 INT UNSIGNED    NOT NULL,
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
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB
;

SET foreign_key_checks = 1;
