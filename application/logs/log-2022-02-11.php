<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-11 06:14:30 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:14:46 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:14:58 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:29:52 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:29:55 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:29:58 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:30:11 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:30:23 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:30:24 --> Severity: Parsing Error --> syntax error, unexpected '"type"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\Construction\application\controllers\Notes.php 97
ERROR - 2022-02-11 06:54:08 --> Severity: Error --> Call to a member function get_details() on null C:\xampp\htdocs\Construction\application\controllers\Pnotes.php 171
ERROR - 2022-02-11 07:14:40 --> Query error: Unknown column 'messages.frkm_user_id' in 'on clause' - Invalid query: SELECT messages.id, messages.message_id, messages.created_at, CONCAT(users.first_name, ' ', users.last_name) AS user_name, users.image AS user_image
        FROM messages
        LEFT JOIN users ON users.id=messages.frkm_user_id
        WHERE messages.deleted=0 AND messages.status='unread'  AND messages.to_user_id = 1
        AND timestamp(messages.created_at)>timestamp('2020-01-08 11:53:55') 
        ORDER BY timestamp(messages.created_at) DESC
ERROR - 2022-02-11 07:14:40 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\Construction\application\controllers\Messages.php 433
ERROR - 2022-02-11 11:54:35 --> Severity: Compile Error --> Cannot redeclare class General_files_model C:\xampp\htdocs\Construction\application\models\General_files_p_model.php 39
ERROR - 2022-02-11 13:49:13 --> Could not find the language line "stock"
ERROR - 2022-02-11 13:50:13 --> 404 Page Not Found: Stock/index
ERROR - 2022-02-11 13:58:41 --> 404 Page Not Found: Stock/index
ERROR - 2022-02-11 14:05:03 --> 404 Page Not Found: Stockinward/index
