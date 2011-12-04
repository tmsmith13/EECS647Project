SET foreign_key_checks = 0;

LOAD DATA LOCAL INFILE 'locations.csv'
INTO TABLE locations
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(zip, city, state);

LOAD DATA LOCAL INFILE 'customers.csv'
INTO TABLE customers
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(first_name, last_name, date_of_birth, street, zip, phone_number);

LOAD DATA LOCAL INFILE 'employees.csv'
INTO TABLE employees
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(first_name, last_name, ssn, date_of_birth, email, street, zip, phone_number);

LOAD DATA LOCAL INFILE 'brakes.csv'
INTO TABLE brakes
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(brake_abs_system, front_brake_type, rear_brake_type);

LOAD DATA LOCAL INFILE 'transmissions.csv'
INTO TABLE transmissions
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(drivetrain, transmission_type, num_gears);

LOAD DATA LOCAL INFILE 'engines.csv'
INTO TABLE engines
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(displacement, fuel_system, horsepower, torque, cylinders, shape);

LOAD DATA LOCAL INFILE 'makes.csv'
INTO TABLE makes
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(make_name);

LOAD DATA LOCAL INFILE 'models.csv'
INTO TABLE models
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(model_name, make_id, trim, body_type);

LOAD DATA LOCAL INFILE 'features.csv'
INTO TABLE features
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(string_position,feature) ;

LOAD DATA LOCAL INFILE 'vehicles.csv'
INTO TABLE vehicles
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(@feature_num, model_id, engine_id, transmission_id, brake_id, vin, model_year,
 vehicle_condition, body_color, hwy_mpg, city_mpg, fuel_tank_size,
 dealer_purchase_price, advertised_sale_price, miles, date_received)
SET feature_set = CAST(@feature_num AS UNSIGNED)
;

LOAD DATA LOCAL INFILE 'sales.csv'
INTO TABLE sales
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(customer_id, employee_id, vehicle_id, subtotal, total, commission, sale_date);

LOAD DATA LOCAL INFILE 'transactions.csv'
INTO TABLE transactions
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(sale_id, payment_amount, transaction_date);

LOAD DATA LOCAL INFILE 'card_transactions.csv'
INTO TABLE card_transactions
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(transaction_id,card_type,card_number,card_expiration);

LOAD DATA LOCAL INFILE 'cash_transactions.csv'
INTO TABLE cash_transactions
FIELDS TERMINATED BY ','
(transaction_id);

LOAD DATA LOCAL INFILE 'check_transactions.csv'
INTO TABLE check_transactions
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(transaction_id, routing_number, account_number);

SET foreign_key_checks = 1;
