SET foreign_key_checks = 0; -- Has to be set or insert fails due to fk constraints

INSERT INTO locations(
    zip,
    city,
    state
) VALUES (
    12345,
    'Minneapolis',
    'Egypt'
);

INSERT INTO customers(
    first_name,
    last_name,
    date_of_birth,
    street,
    zip,
    phone_number
) VALUES (
    'Michael',
    'Jordan',
    '2011-11-09',
    '123 Jefferson',
    12345,
    '316-321-4567'
);

INSERT INTO employees(
    first_name,
    last_name,
    ssn,
    date_of_birth,
    email,
    street,
    zip,
    phone_number
) VALUES (
    'Jason',
    'Eslick',
    '123456789',
    '2011-11-09',
    'Jason.Eslick@JoesDealership.com',
    'Bernard',
    12345,
    '600-500-7000'
);
INSERT INTO employees(
    first_name,
    last_name,
    ssn,
    date_of_birth,
    email,
    street,
    zip,
    phone_number
) VALUES (
    'Dawit',
    'Askabe',
    '234567890',
    '2011-11-08',
    'Dawit.Askabe@JoesDealership.com',
    'Thomas',
    12345,
    '600-500-7000'
);
INSERT INTO employees(
    first_name,
    last_name,
    ssn,
    date_of_birth,
    email,
    street,
    zip,
    phone_number
) VALUES (
    'Jason',
    'Held',
    '345678901',
    '2011-11-07',
    'Jason.Held@JoesDealership.com',
    'Washington',
    12345,
    '600-500-7000'
);
INSERT INTO employees(
    first_name,
    last_name,
    ssn,
    date_of_birth,
    email,
    street,
    zip,
    phone_number
) VALUES (
    'Trevor',
    'Smith',
    '456789012',
    '2011-11-06',
    'Trevor.Smith@JoesDealership.com',
    'Roosevelt',
    12345,
    '600-500-7000'
);

INSERT INTO brakes(
    brake_abs_system,
    front_brake_type,
    rear_brake_type
) VALUES (
    1,
    1,
    1
);

INSERT INTO vehicles(
    model_id,
    engine_id,
    transmission_id,
    brake_id,
    vin,
    model_year,
    vehicle_condition,
    body_color,
    hwy_mpg,
    city_mpg,
    fuel_tank_size,
    dealer_purchase_price,
    advertised_sale_price,
    miles,
    date_recieved
) VALUES (
    1,
    1,
    1,
    1,
    '1234M5K6789',
    2011,
    'new',
    'black',
    7,
    5,
    2,
    12000.50,
    26000.75,
    5,
    '2010-11-01'
);

INSERT INTO features(
    power_door,
    keyless_entry,
    rear_view_camera,
    gps,
    power_window,
    satellite_radio,
    hybrid,
    window_tint,
    sunroof
) VALUES (
    1,
    1,
    0,
    1,
    1,
    0,
    0,
    1,
    1
);

INSERT INTO sales(
    customer_id,
    employee_id,
    vehicle_id,
    subtotal,
    total,
    commission
) VALUES (
    1,
    1,
    1,
    50.59,
    43987.00,
    30000.00
);

INSERT INTO transactions(
    sale_id,
    payment_amount,
    transaction_date
) VALUES (
    1,
    100,
    '2011-11-11'
);
INSERT INTO card_transactions(
    transaction_id,
    card_type,
    card_number,
    card_expiration
) VALUES (
    1,
    'visa',
    '1234876590126543',
    '2011-12-01'
);
INSERT INTO transactions(
    sale_id,
    payment_amount,
    transaction_date
) VALUES (
    1,
    200,
    '2011-11-12'
);
INSERT INTO cash_transactions(
    transaction_id
) VALUES (
    2
);
INSERT INTO transactions(
    sale_id,
    payment_amount,
    transaction_date
) VALUES (
    1,
    300,
    '2011-11-13'
);
INSERT INTO check_transactions(
    transaction_id,
    routing_number,
    account_number
) VALUES (
    3,
    '123987654',
    '1234567890'
);

SET foreign_key_checks = 1;
