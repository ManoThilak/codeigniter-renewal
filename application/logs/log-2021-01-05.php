<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-05 07:50:30 --> Query error: Table 'myjellys_jelly_project.sys_transactions' doesn't exist - Invalid query: SELECT * FROM ( (SELECT  invoice_payments.`amount` AS cr,  NULL AS dr, NULL AS description, invoice_payments.payment_date AS date FROM sys_transactions
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0 )
        UNION ALL 
            (SELECT expense_categories.title as description, expense_categories.`amount` AS dr,  NULL AS cr, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0 ) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 07:50:30 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 189
ERROR - 2021-01-05 07:50:52 --> Query error: Table 'myjellys_jelly_project.sys_transactions' doesn't exist - Invalid query: SELECT * FROM ( (SELECT  invoice_payments.`amount` AS cr,  NULL AS dr, NULL AS description, invoice_payments.payment_date AS date FROM sys_transactions
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0 )
        UNION ALL 
            (SELECT expense_categories.tite as description, expense_categories.`amount` AS dr,  NULL AS cr, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0 ) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 07:50:52 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 189
ERROR - 2021-01-05 07:51:40 --> Query error: Unknown column 'expense_categories.amount' in 'field list' - Invalid query: SELECT * FROM ( (SELECT  invoice_payments.`amount` AS cr,  NULL AS dr, NULL AS description, invoice_payments.payment_date AS date FROM invoice_payments
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0 )
        UNION ALL 
            (SELECT expense_categories.title as description, expense_categories.`amount` AS dr,  NULL AS cr, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0 ) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 07:51:40 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 189
ERROR - 2021-01-05 10:09:52 --> Query error: Unknown column 'expenses.amoun' in 'field list' - Invalid query: SELECT * FROM ( (SELECT NULL AS dr, invoice_payments.`amount` AS cr,   NULL AS description, invoice_payments.payment_date AS date FROM invoice_payments
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0 )
        UNION ALL 
            (SELECT expenses.`amoun` AS dr,  NULL AS cr,  expense_categories.title as description, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0 ) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 10:09:52 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 189
ERROR - 2021-01-05 10:13:58 --> 
ERROR - 2021-01-05 10:14:22 --> Array
ERROR - 2021-01-05 10:14:44 --> 1
ERROR - 2021-01-05 10:14:58 --> 1
ERROR - 2021-01-05 10:15:28 --> 
ERROR - 2021-01-05 10:15:49 --> 
ERROR - 2021-01-05 10:20:50 --> 
ERROR - 2021-01-05 10:21:34 --> 
ERROR - 2021-01-05 10:22:14 --> 
ERROR - 2021-01-05 10:28:26 --> 
ERROR - 2021-01-05 10:28:44 --> 
ERROR - 2021-01-05 10:28:47 --> 
ERROR - 2021-01-05 10:29:38 --> 
ERROR - 2021-01-05 10:30:34 --> 1
ERROR - 2021-01-05 10:31:12 --> 1
ERROR - 2021-01-05 10:32:53 --> 2
ERROR - 2021-01-05 10:32:53 --> Query error: Unknown column 'invoice_payments.project_id' in 'where clause' - Invalid query: SELECT * FROM ( (SELECT NULL AS dr, invoice_payments.`amount` AS cr,   NULL AS description, invoice_payments.payment_date AS date FROM invoice_payments
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0  AND invoice_payments.project_id=2)
        UNION ALL 
            (SELECT expenses.`amount` AS dr,  NULL AS cr,  expense_categories.title as description, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0  AND expenses.project_id=2) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 10:32:53 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 190
ERROR - 2021-01-05 10:32:55 --> 2
ERROR - 2021-01-05 10:32:55 --> Query error: Unknown column 'invoice_payments.project_id' in 'where clause' - Invalid query: SELECT * FROM ( (SELECT NULL AS dr, invoice_payments.`amount` AS cr,   NULL AS description, invoice_payments.payment_date AS date FROM invoice_payments
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0  AND invoice_payments.project_id=2)
        UNION ALL 
            (SELECT expenses.`amount` AS dr,  NULL AS cr,  expense_categories.title as description, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0  AND expenses.project_id=2) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 10:32:55 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 190
ERROR - 2021-01-05 10:32:58 --> 
ERROR - 2021-01-05 10:33:08 --> 2
ERROR - 2021-01-05 10:33:08 --> Query error: Unknown column 'invoice_payments.project_id' in 'where clause' - Invalid query: SELECT * FROM ( (SELECT NULL AS dr, invoice_payments.`amount` AS cr,   NULL AS description, invoice_payments.payment_date AS date FROM invoice_payments
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0  AND invoice_payments.project_id=2)
        UNION ALL 
            (SELECT expenses.`amount` AS dr,  NULL AS cr,  expense_categories.title as description, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0  AND expenses.project_id=2) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 10:33:08 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 190
ERROR - 2021-01-05 10:34:13 --> 2
ERROR - 2021-01-05 10:34:13 --> Query error: Unknown column 'invoice_payments.project_id' in 'where clause' - Invalid query: SELECT * FROM ( (SELECT NULL AS dr, invoice_payments.`amount` AS cr,   NULL AS description, invoice_payments.payment_date AS date FROM invoice_payments
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0  AND invoice_payments.project_id=2)
        UNION ALL 
            (SELECT expenses.`amount` AS dr,  NULL AS cr,  expense_categories.title as description, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0  AND invoices.project_id=2) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 10:34:13 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 190
ERROR - 2021-01-05 10:34:24 --> 2
ERROR - 2021-01-05 10:34:24 --> Query error: Unknown column 'invoice_payments.project_id' in 'where clause' - Invalid query: SELECT * FROM ( (SELECT NULL AS dr, invoice_payments.`amount` AS cr,   NULL AS description, invoice_payments.payment_date AS date FROM invoice_payments
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id WHERE invoice_payments.deleted=0  AND invoice_payments.project_id=2)
        UNION ALL 
            (SELECT expenses.`amount` AS dr,  NULL AS cr,  expense_categories.title as description, expenses.expense_date AS date FROM expenses
            LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id WHERE expenses.deleted=0  AND invoices.project_id=2) ) 
            results  ORDER BY date ASC
ERROR - 2021-01-05 10:34:24 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 190
ERROR - 2021-01-05 10:35:57 --> 2
ERROR - 2021-01-05 10:36:07 --> 
ERROR - 2021-01-05 10:36:08 --> 2
ERROR - 2021-01-05 10:36:10 --> 2
ERROR - 2021-01-05 10:36:17 --> 4
