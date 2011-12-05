--list of all employees and details
SELECT EMP# = count(*),employee_id AS Employee ID, 
		first_name AS First_Name,last_name AS Last_Name,
		ssn AS SSN,date_of_birth AS DOB,email as Email, 
		concat(street,',',zip) as Address, phone_number AS Phone
FROM EMPLOYEES
WHERE active_account == 1


--find the most expensive car in store
SELECT * FROM VEHICLES WHERE advertised_sale_price == MAX(advertised_sale_price)

--where our employees are from


--get all the cars that do not have any features, each of the bits represent a feature
SELECT * FROM  VEHICLES  WHERE feature_set = 0

--get all cars that have GPS
SELECT * FROM  VEHICLES  WHERE feature_set & 0b1 

