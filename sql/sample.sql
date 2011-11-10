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
