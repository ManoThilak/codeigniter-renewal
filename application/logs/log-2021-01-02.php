<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-02 11:38:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        WHERE ...' at line 2 - Invalid query: SELECT SUM(invoice_payments.amount) AS payed_amount
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        WHERE invoice_payments.deleted=0 AND invoices.deleted=0  AND invoices.project_id=
ERROR - 2021-01-02 11:38:25 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Projects.php 942
ERROR - 2021-01-02 11:40:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        WHERE ...' at line 2 - Invalid query: SELECT SUM(invoice_payments.amount) AS payed_amount
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        WHERE invoice_payments.deleted=0 AND invoices.deleted=0  AND invoices.project_id=2
ERROR - 2021-01-02 11:40:24 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Projects.php 942
ERROR - 2021-01-02 11:40:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        WHERE ...' at line 2 - Invalid query: SELECT SUM(invoice_payments.amount) AS payed_amount
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        WHERE invoice_payments.deleted=0 AND invoices.deleted=0  AND invoices.project_id=2
ERROR - 2021-01-02 11:40:30 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Projects.php 942
ERROR - 2021-01-02 11:44:33 --> Severity: Warning --> print_r() expects parameter 2 to be bool, array given /home/myjellys/public_html/steproject/jelly_project/application/controllers/Projects.php 945
ERROR - 2021-01-02 11:44:38 --> Severity: Warning --> print_r() expects parameter 2 to be bool, array given /home/myjellys/public_html/steproject/jelly_project/application/controllers/Projects.php 945
ERROR - 2021-01-02 11:49:26 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/myjellys/public_html/steproject/jelly_project/application/controllers/Projects.php 945
ERROR - 2021-01-02 11:49:32 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/myjellys/public_html/steproject/jelly_project/application/controllers/Projects.php 945
ERROR - 2021-01-02 13:03:46 --> Could not find the language line "reports"
ERROR - 2021-01-02 13:03:50 --> Could not find the language line "reports"
ERROR - 2021-01-02 13:04:01 --> 404 Page Not Found: Projects/reports
ERROR - 2021-01-02 13:04:19 --> 404 Page Not Found: Projects/reports
ERROR - 2021-01-02 13:20:14 --> Severity: Compile Error --> Cannot redeclare Expenses_model::get_details() /home/myjellys/public_html/steproject/jelly_project/application/models/Expenses_model.php 125
ERROR - 2021-01-02 13:20:16 --> Severity: Compile Error --> Cannot redeclare Expenses_model::get_details() /home/myjellys/public_html/steproject/jelly_project/application/models/Expenses_model.php 125
ERROR - 2021-01-02 13:20:29 --> Severity: Compile Error --> Cannot redeclare Expenses_model::get_details() /home/myjellys/public_html/steproject/jelly_project/application/models/Expenses_model.php 125
ERROR - 2021-01-02 13:20:35 --> Severity: Compile Error --> Cannot redeclare Expenses_model::get_details() /home/myjellys/public_html/steproject/jelly_project/application/models/Expenses_model.php 125
ERROR - 2021-01-02 13:22:36 --> Query error: Unknown column 'invoice_payments.deleted' in 'where clause' - Invalid query: SELECT expenses.*, expense_categories.title as category_title, 
                 CONCAT(users.first_name, ' ', users.last_name) AS linked_user_name,
                 projects.title AS project_title,
                 tax_table.percentage AS tax_percentage,
                 tax_table2.percentage AS tax_percentage2
                 
        FROM expenses
        LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        LEFT JOIN projects ON projects.id= expenses.project_id
        LEFT JOIN users ON users.id= expenses.user_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table ON tax_table.id = expenses.tax_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table2 ON tax_table2.id = expenses.tax_id2
            
        WHERE invoice_payments.deleted=0 AND expenses.deleted=0 
ERROR - 2021-01-02 13:22:36 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 189
ERROR - 2021-01-02 13:23:23 --> Query error: Unknown table 'myjellys_jelly_project.invoice_payments' - Invalid query: SELECT  invoice_payments.*, expenses.*, expense_categories.title as category_title, 
                 CONCAT(users.first_name, ' ', users.last_name) AS linked_user_name,
                 projects.title AS project_title,
                 tax_table.percentage AS tax_percentage,
                 tax_table2.percentage AS tax_percentage2
                 
        FROM expenses
        LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        LEFT JOIN projects ON projects.id= expenses.project_id
        LEFT JOIN users ON users.id= expenses.user_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table ON tax_table.id = expenses.tax_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table2 ON tax_table2.id = expenses.tax_id2
            
        WHERE invoice_payments.deleted=0 AND expenses.deleted=0 
ERROR - 2021-01-02 13:23:23 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 189
ERROR - 2021-01-02 13:24:34 --> Query error: Unknown table 'myjellys_jelly_project.invoice_payments' - Invalid query: SELECT  invoice_payments.*, expenses.*, expense_categories.title as category_title, 
                 CONCAT(users.first_name, ' ', users.last_name) AS linked_user_name,
                 projects.title AS project_title,
                 tax_table.percentage AS tax_percentage,
                 tax_table2.percentage AS tax_percentage2
                 
        FROM expenses
        LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id
        LEFT JOIN invoices ON invoices.id=invoice_payments.invoice_id
        LEFT JOIN projects ON projects.id= expenses.project_id
        LEFT JOIN users ON users.id= expenses.user_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table ON tax_table.id = expenses.tax_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table2 ON tax_table2.id = expenses.tax_id2
            
        WHERE invoice_payments.deleted=0 AND expenses.deleted=0 
ERROR - 2021-01-02 13:24:34 --> Severity: error --> Exception: Call to a member function result() on bool /home/myjellys/public_html/steproject/jelly_project/application/controllers/Expenses.php 189
