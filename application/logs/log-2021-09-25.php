<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-25 05:58:46 --> Severity: Warning --> Creating default object from empty value /home/ua8fo24629av/public_html/software/application/core/MY_Controller.php 36
ERROR - 2021-09-25 05:58:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND timestamp(messages.created_at)>timestamp('') 
        ORDER BY timestamp(me' at line 5 - Invalid query: SELECT messages.id, messages.message_id, messages.created_at, CONCAT(users.first_name, ' ', users.last_name) AS user_name, users.image AS user_image
        FROM messages
        LEFT JOIN users ON users.id=messages.from_user_id
        WHERE messages.deleted=0 AND messages.status='unread'  AND messages.to_user_id = 
        AND timestamp(messages.created_at)>timestamp('') 
        ORDER BY timestamp(messages.created_at) DESC
ERROR - 2021-09-25 05:58:46 --> Severity: error --> Exception: Call to a member function result() on bool /home/ua8fo24629av/public_html/software/application/controllers/Messages.php 433
ERROR - 2021-09-25 05:58:46 --> Severity: Warning --> Creating default object from empty value /home/ua8fo24629av/public_html/software/application/core/MY_Controller.php 36
ERROR - 2021-09-25 05:58:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE users SET users.last_online = '2021-09-25 05:58:46' WHERE users.id=
ERROR - 2021-09-25 05:58:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ' notifications.notify_to) != 0 AND FIND_IN_SET(, notifications.read_by) = 0
   ' at line 3 - Invalid query: SELECT COUNT(notifications.id) AS total_notifications
        FROM notifications
        WHERE notifications.deleted=0 AND FIND_IN_SET(, notifications.notify_to) != 0 AND FIND_IN_SET(, notifications.read_by) = 0
        AND timestamp(notifications.created_at)>timestamp('')
ERROR - 2021-09-25 05:58:46 --> Severity: error --> Exception: Call to a member function num_rows() on bool /home/ua8fo24629av/public_html/software/application/models/Notifications_model.php 636
ERROR - 2021-09-25 06:57:46 --> Could not find the language line "hidden_topbar_menus"
ERROR - 2021-09-25 07:05:33 --> Severity: Warning --> A non-numeric value encountered /home/ua8fo24629av/public_html/software/application/controllers/Team_members.php 329
ERROR - 2021-09-25 07:08:50 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-25 07:09:10 --> 404 Page Not Found: Indexphp/assets
ERROR - 2021-09-25 07:31:53 --> Severity: Warning --> include(footer.php): failed to open stream: No such file or directory /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:31:53 --> Severity: Warning --> include(): Failed opening 'footer.php' for inclusion (include_path='.:/opt/alt/php73/usr/share/pear') /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:32:11 --> Severity: Warning --> include(footer.php): failed to open stream: No such file or directory /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:32:11 --> Severity: Warning --> include(): Failed opening 'footer.php' for inclusion (include_path='.:/opt/alt/php73/usr/share/pear') /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:32:46 --> Severity: Warning --> include(includes/footer.php): failed to open stream: No such file or directory /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:32:46 --> Severity: Warning --> include(): Failed opening 'includes/footer.php' for inclusion (include_path='.:/opt/alt/php73/usr/share/pear') /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:33:31 --> Severity: Warning --> include(includes/footer.php): failed to open stream: No such file or directory /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:33:31 --> Severity: Warning --> include(): Failed opening 'includes/footer.php' for inclusion (include_path='.:/opt/alt/php73/usr/share/pear') /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:34:06 --> Severity: Warning --> require(includes/footer.php): failed to open stream: No such file or directory /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:34:06 --> Severity: Compile Error --> require(): Failed opening required 'includes/footer.php' (include_path='.:/opt/alt/php73/usr/share/pear') /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:34:19 --> Severity: Warning --> require(includes/footer.php): failed to open stream: No such file or directory /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:34:19 --> Severity: Compile Error --> require(): Failed opening required 'includes/footer.php' (include_path='.:/opt/alt/php73/usr/share/pear') /home/ua8fo24629av/public_html/software/application/views/layout/index.php 55
ERROR - 2021-09-25 07:34:51 --> Severity: Warning --> require(includes/footer.php): failed to open stream: No such file or directory /home/ua8fo24629av/public_html/software/application/views/layout/index.php 57
ERROR - 2021-09-25 07:34:51 --> Severity: Compile Error --> require(): Failed opening required 'includes/footer.php' (include_path='.:/opt/alt/php73/usr/share/pear') /home/ua8fo24629av/public_html/software/application/views/layout/index.php 57
ERROR - 2021-09-25 09:39:05 --> 1
