-- Every transaction, and their type (card, cash or check)
SELECT transactions.*, transaction_type
FROM (
        SELECT transaction_id, 'card transactions' AS transaction_type
        FROM card_transactions
    UNION ALL
        SELECT transaction_id, 'cash transactions' AS transaction_type
        FROM cash_transactions
    UNION ALL
        SELECT transaction_id, 'check transactions' AS transaction_type
        FROM check_transactions
) trans
NATURAL JOIN transactions
ORDER BY transaction_date
;

-- The average payment amount for each transaction type
SELECT transaction_type, AVG(payment_amount) AS average_payment
FROM (
        SELECT transaction_id, 'card transactions' AS transaction_type
        FROM card_transactions
    UNION ALL
        SELECT transaction_id, 'cash transactions' AS transaction_type
        FROM cash_transactions
    UNION ALL
        SELECT transaction_id, 'check transactions' AS transaction_type
        FROM check_transactions
) trans
NATURAL JOIN transactions
GROUP BY transaction_type
;

-- Sales that have not been fully paid
SELECT SUM(t.payment_amount) AS total_paid, total AS sale_amount
FROM (
        SELECT transaction_id, 'card transactions' AS transaction_type
        FROM card_transactions
    UNION ALL
        SELECT transaction_id, 'cash transactions' AS transaction_type
        FROM cash_transactions
    UNION ALL
        SELECT transaction_id, 'check transactions' AS transaction_type
        FROM check_transactions
) innertrans
NATURAL JOIN transactions t
NATURAL JOIN sales s
GROUP BY sale_id
HAVING total_paid < sale_amount
;

-- The total commission earned per employee since 2011-11-16
SELECT first_name, last_name,
       COUNT(sales.sale_id) AS num_sales,
       SUM(commission) AS total_commission
FROM sales
NATURAL JOIN employees
WHERE sale_date >= '2011-11-16'
GROUP BY employees.employee_id
;

-- All return customers
SELECT first_name, last_name,
       COUNT(sales.sale_id) AS num_purchases,
       MAX(sale_date) AS last_purchase_date
FROM customers
NATURAL JOIN sales
GROUP BY customers.customer_id
HAVING COUNT(sales.sale_id) > 1
;

-- Profit of each sale, the dealer purchase price, the sale subtotal amount,
-- the date of the sale, the make, model, and year of the vehicle sold, and
-- the employee that sold the vehicle, ordered by sale date
SELECT sale_date,
       subtotal, dealer_purchase_price,
       subtotal - dealer_purchase_price AS sale_profit,
       make_name, model_name, model_year,
       first_name, last_name
FROM sales
NATURAL JOIN vehicles
NATURAL JOIN models
NATURAL JOIN makes
NATURAL JOIN employees
ORDER BY sale_date
;
