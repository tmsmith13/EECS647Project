-- Transactions between certain dates, card transaction, payment_amount constraint, order descending
SELECT transactions.*, transaction_type
FROM (
	 SELECT transaction_id, 'card transaction' AS transaction_type
) trans
NATURAL JOIN transactions
WHERE transaction_date BETWEEN '2011-11-11' AND '2011-11-23' AND payment_amount > 100
ORDER BY -payment_amount;

-- Commission earned by employees between two dates, in ascending order
SELECT employee_id, SUM(commission) 
FROM sales 
WHERE sale_date BETWEEN '2011-11-01' AND '2011-11-25' GROUP BY employee_id;

-- The number of sales per month in ascending order
SELECT COUNT(sales_date), MONTH(sales_date)
FROM sales
ORDER BY COUNT(sales_date);

-- The number of fords sold within a given price range


-- Return the five cheapest cars

