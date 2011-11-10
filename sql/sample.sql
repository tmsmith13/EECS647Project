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

SET foreign_key_checks = 0; -- Has to be set or insert fails

INSERT INTO vehicles(
    model_id,
    engine_id,
    transmission_id,
    brake_id,
    vin,
    year,
    vehicle_condition,
    body_color,
    hwy_mpg,
    city_mpg,
    fuel_tank_size,
    dealer_purchase_price,
    advertised_sale_price,
    miles
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
    5
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

SET foreign_key_checks = 1;