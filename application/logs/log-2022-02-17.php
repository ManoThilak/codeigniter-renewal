<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-17 08:08:15 --> Query error: Unknown column 'pinvoice_details.payment_received' in 'field list' - Invalid query: SELECT suppliers.*, CONCAT(users.first_name, ' ', users.last_name) AS primary_contact, users.id AS primary_contact_id, users.image AS contact_avatar,  project_table.total_projects, IFNULL(pinvoice_details.payment_received,0) AS payment_received ,
                IF(((IFNULL(pinvoice_details.invoice_value,0) > IFNULL(pinvoice_details.payment_received,0)) AND (IFNULL(pinvoice_details.invoice_value,0) - IFNULL(pinvoice_details.payment_received,0)) <0.05), IFNULL(pinvoice_details.payment_received,0), IFNULL(pinvoice_details.invoice_value,0)) AS invoice_value,
                (SELECT GROUP_CONCAT(supplier_groups.title) FROM supplier_groups WHERE FIND_IN_SET(supplier_groups.id, suppliers.group_ids)) AS supplier_groups, lead_status.title AS lead_status_title,  lead_status.color AS lead_status_color,
                owner_details.owner_name, owner_details.owner_avatar
        FROM suppliers
        LEFT JOIN users ON users.client_id = suppliers.id AND users.deleted=0 AND users.is_primary_contact=1 
        LEFT JOIN (SELECT client_id, COUNT(id) AS total_projects FROM projects WHERE deleted=0 GROUP BY client_id) AS project_table ON project_table.client_id= suppliers.id
        LEFT JOIN (SELECT client_id, SUM(payments_table.payment_received) as payment_received, (SUM(
                IFNULL(items_table.invoice_value,0)+
                IF(pinvoices.discount_type='before_tax',  ((IFNULL(tax_table.percentage,0)/100* (IFNULL(items_table.invoice_value,0)- IF(pinvoices.discount_amount_type='percentage', IFNULL(pinvoices.discount_amount,0)/100* IF(pinvoices.discount_type='after_tax', (IFNULL(items_table.invoice_value,0) + (IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))), IFNULL(items_table.invoice_value,0) ), pinvoices.discount_amount)))+ (IFNULL(tax_table2.percentage,0)/100* (IFNULL(items_table.invoice_value,0)- IF(pinvoices.discount_amount_type='percentage', IFNULL(pinvoices.discount_amount,0)/100* IF(pinvoices.discount_type='after_tax', (IFNULL(items_table.invoice_value,0) + (IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))), IFNULL(items_table.invoice_value,0) ), pinvoices.discount_amount)))), ((IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))))
                - IF(pinvoices.discount_amount_type='percentage', IFNULL(pinvoices.discount_amount,0)/100* IF(pinvoices.discount_type='after_tax', (IFNULL(items_table.invoice_value,0) + (IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))), IFNULL(items_table.invoice_value,0) ), pinvoices.discount_amount)
               )) as invoice_value FROM pinvoices
                   LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table ON tax_table.id = pinvoices.tax_id
                   LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table2 ON tax_table2.id = pinvoices.tax_id2 
                   LEFT JOIN (SELECT invoice_id, SUM(amount) AS payment_received FROM expenses WHERE deleted=0 GROUP BY invoice_id) AS payments_table ON payments_table.invoice_id=pinvoices.id AND pinvoices.deleted=0 AND pinvoices.status='not_paid'
                   LEFT JOIN (SELECT invoice_id, SUM(total) AS invoice_value FROM pinvoice_items WHERE deleted=0 GROUP BY invoice_id) AS items_table ON items_table.invoice_id=pinvoices.id AND pinvoices.deleted=0 AND pinvoices.status='not_paid'
                   WHERE pinvoices.status='not_paid'
                   GROUP BY pinvoices.client_id    
                   ) AS invoice_details ON invoice_details.client_id= suppliers.id 
        LEFT JOIN lead_status ON suppliers.lead_status_id = lead_status.id 
        LEFT JOIN (SELECT users.id, CONCAT(users.first_name, ' ', users.last_name) AS owner_name, users.image AS owner_avatar FROM users WHERE users.deleted=0 AND users.user_type='staff') AS owner_details ON owner_details.id=suppliers.owner_id
                       
        WHERE suppliers.deleted=0  AND suppliers.is_lead=0
ERROR - 2022-02-17 08:08:15 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\Construction\application\controllers\Suppliers.php 149
ERROR - 2022-02-17 08:27:21 --> 404 Page Not Found: Expenses/get_invoice_suggestion
ERROR - 2022-02-17 08:33:35 --> Severity: Compile Error --> Can't use function return value in write context C:\xampp\htdocs\Construction\application\controllers\Expenses.php 138
ERROR - 2022-02-17 08:42:14 --> Severity: Error --> Call to undefined method stdClass::get_invoice_id() C:\xampp\htdocs\Construction\application\controllers\Expenses.php 366
ERROR - 2022-02-17 08:59:12 --> Query error: Unknown column 'date' in 'order clause' - Invalid query: SELECT expenses.*, expense_categories.title as category_title, 
                 CONCAT(users.first_name, ' ', users.last_name) AS linked_user_name,
                 projects.title AS project_title,
                  suppliers.company_name AS company_name,
                  payment_methods.title AS payment_method_title,
                 tax_table.percentage AS tax_percentage,
                 tax_table2.percentage AS tax_percentage2
                 
        FROM expenses
        LEFT JOIN expense_categories ON expense_categories.id= expenses.category_id
        LEFT JOIN projects ON projects.id= expenses.project_id
        LEFT JOIN suppliers ON suppliers.id= expenses.client_id
        LEFT JOIN users ON users.id= expenses.user_id
        LEFT JOIN payment_methods ON payment_methods.id = expenses.payment_method_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table ON tax_table.id = expenses.tax_id
        LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table2 ON tax_table2.id = expenses.tax_id2
            
        WHERE expenses.deleted=0  AND (expenses.expense_date BETWEEN '2022-02-01' AND '2022-02-28')  ORDER BY date ASC 
ERROR - 2022-02-17 08:59:12 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\Construction\application\controllers\Expenses.php 321
ERROR - 2022-02-17 09:07:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS invoice_details ON invoice_details.client_id= suppliers.id 
        LEFT J' at line 15 - Invalid query: SELECT suppliers.*, CONCAT(users.first_name, ' ', users.last_name) AS primary_contact, users.id AS primary_contact_id, users.image AS contact_avatar,  project_table.total_projects, IFNULL(invoice_details.payment_received,0) AS payment_received ,
                IF(((IFNULL(invoice_details.invoice_value,0) > IFNULL(invoice_details.payment_received,0)) AND (IFNULL(invoice_details.invoice_value,0) - IFNULL(invoice_details.payment_received,0)) <0.05), IFNULL(invoice_details.payment_received,0), IFNULL(invoice_details.invoice_value,0)) AS invoice_value,
                (SELECT GROUP_CONCAT(supplier_groups.title) FROM supplier_groups WHERE FIND_IN_SET(supplier_groups.id, suppliers.group_ids)) AS supplier_groups, lead_status.title AS lead_status_title,  lead_status.color AS lead_status_color,
                owner_details.owner_name, owner_details.owner_avatar
        FROM suppliers
        LEFT JOIN users ON users.client_id = suppliers.id AND users.deleted=0 AND users.is_primary_contact=1 
        LEFT JOIN (SELECT client_id, COUNT(id) AS total_projects FROM projects WHERE deleted=0 GROUP BY client_id) AS project_table ON project_table.client_id= suppliers.id
       
                   LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table ON tax_table.id = pinvoices.tax_id
                   LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table2 ON tax_table2.id = pinvoices.tax_id2 
                   LEFT JOIN (SELECT invoice_id, SUM(amount) AS payment_received FROM expenses WHERE deleted=0 GROUP BY invoice_id) AS payments_table ON payments_table.invoice_id=pinvoices.id AND pinvoices.deleted=0 AND pinvoices.status='not_paid'
                   LEFT JOIN (SELECT invoice_id, SUM(total) AS invoice_value FROM pinvoice_items WHERE deleted=0 GROUP BY invoice_id) AS items_table ON items_table.invoice_id=pinvoices.id AND pinvoices.deleted=0 AND pinvoices.status='not_paid'
                   WHERE pinvoices.status='not_paid'
                   GROUP BY pinvoices.client_id    
                   ) AS invoice_details ON invoice_details.client_id= suppliers.id 
        LEFT JOIN lead_status ON suppliers.lead_status_id = lead_status.id 
        LEFT JOIN (SELECT users.id, CONCAT(users.first_name, ' ', users.last_name) AS owner_name, users.image AS owner_avatar FROM users WHERE users.deleted=0 AND users.user_type='staff') AS owner_details ON owner_details.id=suppliers.owner_id
                       
        WHERE suppliers.deleted=0  AND suppliers.is_lead=0
ERROR - 2022-02-17 09:07:24 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\Construction\application\controllers\Suppliers.php 149
ERROR - 2022-02-17 09:08:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 20 - Invalid query: SELECT suppliers.*, CONCAT(users.first_name, ' ', users.last_name) AS primary_contact, users.id AS primary_contact_id, users.image AS contact_avatar,  project_table.total_projects, IFNULL(invoice_details.payment_received,0) AS payment_received ,
                IF(((IFNULL(invoice_details.invoice_value,0) > IFNULL(invoice_details.payment_received,0)) AND (IFNULL(invoice_details.invoice_value,0) - IFNULL(invoice_details.payment_received,0)) <0.05), IFNULL(invoice_details.payment_received,0), IFNULL(invoice_details.invoice_value,0)) AS invoice_value,
                (SELECT GROUP_CONCAT(supplier_groups.title) FROM supplier_groups WHERE FIND_IN_SET(supplier_groups.id, suppliers.group_ids)) AS supplier_groups, lead_status.title AS lead_status_title,  lead_status.color AS lead_status_color,
                owner_details.owner_name, owner_details.owner_avatar
        FROM suppliers
        LEFT JOIN users ON users.client_id = suppliers.id AND users.deleted=0 AND users.is_primary_contact=1 
        LEFT JOIN (SELECT client_id, COUNT(id) AS total_projects FROM projects WHERE deleted=0 GROUP BY client_id) AS project_table ON project_table.client_id= suppliers.id
        LEFT JOIN (SELECT client_id, SUM(payments_table.payment_received) as payment_received, (SUM(
                IFNULL(items_table.invoice_value,0)+
                IF(pinvoices.discount_type='before_tax',  ((IFNULL(tax_table.percentage,0)/100* (IFNULL(items_table.invoice_value,0)- IF(pinvoices.discount_amount_type='percentage', IFNULL(pinvoices.discount_amount,0)/100* IF(pinvoices.discount_type='after_tax', (IFNULL(items_table.invoice_value,0) + (IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))), IFNULL(items_table.invoice_value,0) ), pinvoices.discount_amount)))+ (IFNULL(tax_table2.percentage,0)/100* (IFNULL(items_table.invoice_value,0)- IF(pinvoices.discount_amount_type='percentage', IFNULL(pinvoices.discount_amount,0)/100* IF(pinvoices.discount_type='after_tax', (IFNULL(items_table.invoice_value,0) + (IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))), IFNULL(items_table.invoice_value,0) ), pinvoices.discount_amount)))), ((IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))))
                - IF(pinvoices.discount_amount_type='percentage', IFNULL(pinvoices.discount_amount,0)/100* IF(pinvoices.discount_type='after_tax', (IFNULL(items_table.invoice_value,0) + (IFNULL(tax_table.percentage,0)/100*IFNULL(items_table.invoice_value,0)) + (IFNULL(tax_table2.percentage,0)/100*IFNULL(items_table.invoice_value,0))), IFNULL(items_table.invoice_value,0) ), pinvoices.discount_amount)
               )) as invoice_value FROM pinvoices
                   LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table ON tax_table.id = pinvoices.tax_id
                   LEFT JOIN (SELECT taxes.* FROM taxes) AS tax_table2 ON tax_table2.id = pinvoices.tax_id2 
                   LEFT JOIN (SELECT invoice_id, SUM(amount) AS payment_received FROM expenses WHERE deleted=0 GROUP BY invoice_id) AS payments_table ON payments_table.invoice_id=pinvoices.id AND pinvoices.deleted=0 AND pinvoices.status='not_paid'
                   
        LEFT JOIN lead_status ON suppliers.lead_status_id = lead_status.id 
        LEFT JOIN (SELECT users.id, CONCAT(users.first_name, ' ', users.last_name) AS owner_name, users.image AS owner_avatar FROM users WHERE users.deleted=0 AND users.user_type='staff') AS owner_details ON owner_details.id=suppliers.owner_id
                       
        WHERE suppliers.deleted=0  AND suppliers.is_lead=0
ERROR - 2022-02-17 09:08:20 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\Construction\application\controllers\Suppliers.php 149
ERROR - 2022-02-17 12:56:34 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 12:56:38 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 12:58:45 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 12:59:09 --> 404 Page Not Found: Stock/index
ERROR - 2022-02-17 13:00:09 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 13:02:00 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 13:02:42 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 13:03:34 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 13:03:59 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 13:04:44 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 115
ERROR - 2022-02-17 13:05:34 --> Severity: Parsing Error --> syntax error, unexpected ',' C:\xampp\htdocs\Construction\application\views\includes\left_menu.php 114
ERROR - 2022-02-17 13:05:47 --> Could not find the language line "stockconsumable"
ERROR - 2022-02-17 13:26:42 --> 404 Page Not Found: Godown_master/index
ERROR - 2022-02-17 13:29:52 --> 404 Page Not Found: Godown_master/index
ERROR - 2022-02-17 13:33:13 --> 404 Page Not Found: Godown_master/index
ERROR - 2022-02-17 13:33:13 --> 404 Page Not Found: Godown_master/index
ERROR - 2022-02-17 13:35:32 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:35:32 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:35:34 --> Severity: Error --> Call to a member function get_details() on null C:\xampp\htdocs\Construction\application\controllers\Godown_master.php 72
ERROR - 2022-02-17 13:38:06 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:38:06 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:38:07 --> Severity: Error --> Call to a member function get_details() on null C:\xampp\htdocs\Construction\application\controllers\Godown_master.php 72
ERROR - 2022-02-17 13:38:42 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:38:42 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:38:43 --> Severity: Error --> Call to a member function get_details() on null C:\xampp\htdocs\Construction\application\controllers\Godown_master.php 72
ERROR - 2022-02-17 13:39:49 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:39:49 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:40:01 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:40:01 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:40:12 --> Could not find the language line "add_godown"
ERROR - 2022-02-17 13:40:12 --> Could not find the language line "add_godown"
