LOAD DATA LOCAL INFILE 'customers.csv'          INTO TABLE customers(first_name,last_name,date_of_birth,street,zip,phone_number);

LOAD DATA LOCAL INFILE 'locations.csv'          INTO TABLE locations(zip,city,state);

LOAD DATA LOCAL INFILE 'employees.csv'          INTO TABLE employees(first_name,last_name,password,ssn,date_of_birth,email,street,zip,phone_number);

LOAD DATA LOCAL INFILE 'brakes.csv'             INTO TABLE brakes;

LOAD DATA LOCAL INFILE 'transmissions.csv'      INTO TABLE transmissions;

LOAD DATA LOCAL INFILE 'engines.csv'            INTO TABLE engines;

LOAD DATA LOCAL INFILE 'makes.csv'              INTO TABLE makes;

LOAD DATA LOCAL INFILE 'models.csv'             INTO TABLE models;

LOAD DATA LOCAL INFILE 'vehicles.csv'           INTO TABLE vehicles;

LOAD DATA LOCAL INFILE 'sales.csv'              INTO TABLE sales;

LOAD DATA LOCAL INFILE 'transactions.csv'       INTO TABLE transactions;

LOAD DATA LOCAL INFILE 'card_transactions.csv'  INTO TABLE card_transactions;

LOAD DATA LOCAL INFILE 'cash_transactions.csv'  INTO TABLE cash_transactions;

LOAD DATA LOCAL INFILE 'check_transactions.csv' INTO TABLE check_transactions;
