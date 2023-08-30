<?php

class Bgiftpack_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'customers';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
       //  $clients_table = $this->db->dbprefix('telemarketers');
       //  $projects_table = $this->db->dbprefix('projects');
       //  $users_table = $this->db->dbprefix('users');
       //  $invoices_table = $this->db->dbprefix('invoices');
       //  $invoice_payments_table = $this->db->dbprefix('invoice_payments');
       //  $invoice_items_table = $this->db->dbprefix('invoice_items');
       //  $taxes_table = $this->db->dbprefix('taxes');
       //  $client_groups_table = $this->db->dbprefix('client_groups');
       //  $lead_status_table = $this->db->dbprefix('lead_status');

       //  $where = "";
       //  $id = get_array_value($options, "id");
       //  if ($id) {
       //      $where .= " AND $clients_table.id=$id";
       //  }

       //  $custom_field_type = "clients";

       //  $leads_only = get_array_value($options, "leads_only");
       //  if ($leads_only) {
       //      $custom_field_type = "leads";
       //      $where .= " AND $clients_table.is_lead=1";
       //  }

       //  $status = get_array_value($options, "status");
       //  if ($status) {
       //      $where .= " AND $clients_table.lead_status_id='$status'";
       //  }

       //  $source = get_array_value($options, "source");
       //  if ($source) {
       //      $where .= " AND $clients_table.lead_source_id='$source'";
       //  }

       //  $owner_id = get_array_value($options, "owner_id");
       //  if ($owner_id) {
       //      $where .= " AND $clients_table.owner_id='$owner_id'";
       //  }


       //  $client_id = get_array_value($options, "client_id");
       //  if ($client_id) {
       //      $where .= " AND salesmanager.id='$client_id'";
       //  }


       //  if (!$id && !$leads_only) {
       //      //only clients
       //      $where .= " AND $clients_table.is_lead=0";
       //  }

       //  $group_id = get_array_value($options, "group_id");
       //  if ($group_id) {
       //      $where .= " AND FIND_IN_SET('$group_id', $clients_table.group_ids)";
       //  }


       //  //prepare custom fild binding query
       //  $custom_fields = get_array_value($options, "custom_fields");
       //  $custom_field_query_info = $this->prepare_custom_field_query_string($custom_field_type, $custom_fields, $clients_table);
       //  $select_custom_fieds = get_array_value($custom_field_query_info, "select_string");
       //  $join_custom_fieds = get_array_value($custom_field_query_info, "join_string");

       //  $invoice_value_calculation_query = "(SUM" . $this->_get_invoice_value_calculation_query($invoices_table) . ")";

       //  $this->db->query('SET SQL_BIG_SELECTS=1');

       //  $invoice_value_select = "IFNULL(invoice_details.invoice_value,0)";
       //  $payment_value_select = "IFNULL(invoice_details.payment_received,0)";

       //  $sql = "SELECT $clients_table.*, CONCAT($users_table.first_name, ' ', $users_table.last_name) AS primary_contact, $users_table.id AS primary_contact_id, $users_table.image AS contact_avatar,  project_table.total_projects, $payment_value_select AS payment_received $select_custom_fieds,
       //          IF((($invoice_value_select > $payment_value_select) AND ($invoice_value_select - $payment_value_select) <0.05), $payment_value_select, $invoice_value_select) AS invoice_value,
       //          (SELECT GROUP_CONCAT($client_groups_table.title) FROM $client_groups_table WHERE FIND_IN_SET($client_groups_table.id, $clients_table.group_ids)) AS client_groups, $lead_status_table.title AS lead_status_title,  $lead_status_table.color AS lead_status_color,
       //          owner_details.owner_name, owner_details.owner_avatar
       //  FROM $clients_table

        



       //  LEFT JOIN $users_table ON $users_table.client_id = $clients_table.id AND $users_table.deleted=0 AND $users_table.is_primary_contact=1 
       //  LEFT JOIN (SELECT client_id, COUNT(id) AS total_projects FROM $projects_table WHERE deleted=0 GROUP BY client_id) AS project_table ON project_table.client_id= $clients_table.id
       //  LEFT JOIN (SELECT client_id, SUM(payments_table.payment_received) as payment_received, $invoice_value_calculation_query as invoice_value FROM $invoices_table
       //             LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table ON tax_table.id = $invoices_table.tax_id
       //             LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table2 ON tax_table2.id = $invoices_table.tax_id2 
       //             LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table3 ON tax_table3.id = $invoices_table.tax_id3 
       //             LEFT JOIN (SELECT invoice_id, SUM(amount) AS payment_received FROM $invoice_payments_table WHERE deleted=0 GROUP BY invoice_id) AS payments_table ON payments_table.invoice_id=$invoices_table.id AND $invoices_table.deleted=0 AND $invoices_table.status='not_paid'
       //             LEFT JOIN (SELECT invoice_id, SUM(total) AS invoice_value FROM $invoice_items_table WHERE deleted=0 GROUP BY invoice_id) AS items_table ON items_table.invoice_id=$invoices_table.id AND $invoices_table.deleted=0 AND $invoices_table.status='not_paid'
       //             WHERE $invoices_table.status='not_paid'
       //             GROUP BY $invoices_table.client_id    
       //             ) AS invoice_details ON invoice_details.client_id= $clients_table.id 
       //  LEFT JOIN $lead_status_table ON $clients_table.lead_status_id = $lead_status_table.id 
       //  LEFT JOIN (SELECT $users_table.id, CONCAT($users_table.first_name, ' ', $users_table.last_name) AS owner_name, $users_table.image AS owner_avatar FROM $users_table WHERE $users_table.deleted=0 AND $users_table.user_type='staff') AS owner_details ON owner_details.id=$clients_table.owner_id
       //  $join_custom_fieds               
       //  WHERE $clients_table.deleted=0 $where";
       //  return $this->db->query($sql);
       // // echo $this->db->last_query();





        // $sql11="UPDATE teledatas set next_followupdate = NULL WHERE next_followupdate ='0000-00-00'";
        // $this->db->query($sql11);
        // $sql1="UPDATE teledatas set birth_date = NULL WHERE birth_date ='0000-00-00'";
        // $this->db->query($sql1);
        // $sql2="UPDATE teledatas set anniversary_date = NULL WHERE anniversary_date ='0000-00-00'";
        // $this->db->query($sql2);


         $sql1="UPDATE customers set bid = 0";
         $this->db->query($sql1);
         $sql2="UPDATE customers set bid = 1 WHERE transfer_id = 1 and  DATE_ADD(birth_date,INTERVAL YEAR(DATE_ADD(CURDATE(),INTERVAL 10 DAY))-YEAR(birth_date) + IF(DAYOFYEAR(DATE_ADD(CURDATE(),INTERVAL 10 DAY)) > DAYOFYEAR(birth_date),1,0) YEAR) BETWEEN DATE_ADD(CURDATE(),INTERVAL 10 DAY) AND DATE_ADD(DATE_ADD(CURDATE(),INTERVAL 10 DAY), INTERVAL 30 DAY)";
         $this->db->query($sql2);


         $sql11="UPDATE customers set giftforb_id = 0";
         $this->db->query($sql11);
         $sql12="UPDATE customers set giftforb_id = 1 WHERE transfer_id = 1 and (giftfor_id = 3 or giftfor_id = 1)";
         $this->db->query($sql12);



         $clients_table = $this->db->dbprefix('customers');
         $clientname_table = $this->db->dbprefix('clients');
         //$customername_table = $this->db->dbprefix('customers');

        $projects_table = $this->db->dbprefix('projects');
        $users_table = $this->db->dbprefix('users');
        $invoices_table = $this->db->dbprefix('invoices');
        $invoice_payments_table = $this->db->dbprefix('invoice_payments');
        $invoice_items_table = $this->db->dbprefix('invoice_items');
        $taxes_table = $this->db->dbprefix('taxes');
        $client_groups_table = $this->db->dbprefix('client_groups');
        $lead_status_table = $this->db->dbprefix('lead_status');

        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND $clients_table.id=$id";
        }

        $custom_field_type = "clients";

        $leads_only = get_array_value($options, "leads_only");
        if ($leads_only) {
            $custom_field_type = "leads";
            $where .= " AND $clients_table.is_lead=1";
        }

        $status = get_array_value($options, "status");
        if ($status) {
            $where .= " AND $clients_table.lead_status_id='$status'";
        }

        $source = get_array_value($options, "source");
        if ($source) {
            $where .= " AND $clients_table.lead_source_id='$source'";
        }

        $owner_id = get_array_value($options, "owner_id");
        if ($owner_id) {
            $where .= " AND $clients_table.owner_id='$owner_id'";
        }


        // $client_id = get_array_value($options, "client_id");
        // if ($client_id) {
        //     $where .= " AND salesmanager.id='$client_id'";
        // }

        // $from_id = get_array_value($options, "from_id");
        // $to_id = get_array_value($options, "to_id");
        // if ($from_id and $to_id) {
        //     $where .= " AND $clients_table.id >= $from_id AND $clients_table.id <= $to_id ";
        // }
        

        

        if (!$id && !$leads_only) {
            //only clients
            $where .= " AND $clients_table.is_lead=0";
        }

        // $group_id = get_array_value($options, "group_id");
        // //$telemarketer_id = get_array_value($options, "telemarketer_id");
        // if ($group_id) {
        //     $where .= " AND FIND_IN_SET('$group_id', $clients_table.client_id)";
        //     //$where .= " AND FIND_IN_SET('$telemarketer_id', $clients_table.telemarketer_id)";
        // } 
        // else if ($telemarketer_id) {
        //     $where .= " AND FIND_IN_SET('$telemarketer_id', $clients_table.telemarketer_id)";
        // }
        // else if (!$id) {
        //     //$where .= " AND FIND_IN_SET('0', $clients_table.id)";
        //     //$where .= " AND $clients_table.id='0'";

        //     // $where .= " AND $clients_table.birth_date BETWEEN curdate() and date_add(curdate(), INTERVAL 30 day) or 
        //     // $clients_table.anniversary_date BETWEEN curdate() and date_add(curdate(), INTERVAL 30 day)";
            
        // }



        // $group_id = get_array_value($options, "group_id");
        // $telemarketer_id = get_array_value($options, "telemarketer_id");
        // if ($group_id and $telemarketer_id) {
        //     $where .= " AND FIND_IN_SET('$group_id', $clientname_table.id)";
        //     $where .= " AND FIND_IN_SET('$telemarketer_id', $clients_table.telemarketer_id)";
        // } 
        // else if (!$id) {
        //     //$where .= " AND FIND_IN_SET('0', $clients_table.id)";
        //     $where .= " AND $clients_table.id='0'";
        // }





        $start_date = get_array_value($options, "start_date");
        $end_date = get_array_value($options, "end_date");
        if ($start_date && $end_date) {
            //$where .= " AND ($clients_table.birth_date BETWEEN '$start_date' AND '$end_date') ";
            //$where .= " AND ($clients_table.anniversary_date BETWEEN '$start_date' AND '$end_date') ";
            // $where .= " AND ($clients_table.birth_date BETWEEN '$start_date' AND '$end_date' or 
            //   $clients_table.anniversary_date BETWEEN '$start_date' AND '$end_date')";
            $where .= " AND  DATE_FORMAT(birth_date, '%c-%d') 
                        BETWEEN DATE_FORMAT('$start_date', '%c-%d') 
                        AND DATE_FORMAT('$end_date', '%c-%d') OR (MONTH('$start_date') > MONTH('$end_date')
                        AND (MONTH(birth_date) >= MONTH('$start_date') 
                        OR MONTH(birth_date) <= MONTH('$end_date')))";
                        $where .= "AND $clients_table.transfer_id = '1'";
                        $where .= "AND $clients_table.bcouriersent_id = '0'";
                        $where .= "AND ($clients_table.giftforb_id = '1')";
        } else {
            //$where .= " AND FIND_IN_SET('0', $clients_table.id)";
            //$where .= " AND $clients_table.id='0'";
            
              //$where .= " AND $clients_table.birth_date BETWEEN curdate() and date_add(curdate(), INTERVAL 30 day)";
              //$where .= " AND $clients_table.anniversary_date BETWEEN curdate() and date_add(curdate(), INTERVAL 30 day)";
            // $where .= " AND ($clients_table.birth_date BETWEEN curdate() and date_add(curdate(), INTERVAL 30 day) or 
            //   $clients_table.anniversary_date BETWEEN curdate() and date_add(curdate(), INTERVAL 30 day))";
            $where .= " AND (DATE_ADD(birth_date,INTERVAL YEAR(DATE_ADD(CURDATE(),INTERVAL 10 DAY))-YEAR(birth_date) + IF(DAYOFYEAR(DATE_ADD(CURDATE(),INTERVAL 10 DAY)) > DAYOFYEAR(birth_date),1,0) YEAR) BETWEEN DATE_ADD(CURDATE(),INTERVAL 10 DAY) AND DATE_ADD(DATE_ADD(CURDATE(),INTERVAL 10 DAY), INTERVAL 30 DAY))";
            $where .= "AND $clients_table.transfer_id = '1'";
            $where .= "AND $clients_table.bcouriersent_id = '0'";
            $where .= "AND ($clients_table.giftforb_id = '1')";
        }
         $group_id = get_array_value($options, "group_id");
        if ($group_id) {
            $where .= " AND $clients_table.client_id='$group_id'";
        } 



        // $status_id = get_array_value($options, "status_id");
        // if ($status_id) {
        //     $where .= " AND $clients_table.complete_id = '$status_id'";
        // } else {
            
        //     $where .= " AND $clients_table.status_id='1'";
        // }


        //prepare custom fild binding query
        $custom_fields = get_array_value($options, "custom_fields");
        $custom_field_query_info = $this->prepare_custom_field_query_string($custom_field_type, $custom_fields, $clients_table);
        $select_custom_fieds = get_array_value($custom_field_query_info, "select_string");
        $join_custom_fieds = get_array_value($custom_field_query_info, "join_string");

        $invoice_value_calculation_query = "(SUM" . $this->_get_invoice_value_calculation_query($invoices_table) . ")";

        $this->db->query('SET SQL_BIG_SELECTS=1');

        $invoice_value_select = "IFNULL(invoice_details.invoice_value,0)";
        $payment_value_select = "IFNULL(invoice_details.payment_received,0)";

        $sql = "SELECT $clients_table.*, CONCAT($users_table.first_name, ' ', $users_table.last_name) AS primary_contact, $users_table.id AS primary_contact_id, $users_table.image AS contact_avatar,  project_table.total_projects, $payment_value_select AS payment_received $select_custom_fieds,
                IF((($invoice_value_select > $payment_value_select) AND ($invoice_value_select - $payment_value_select) <0.05), $payment_value_select, $invoice_value_select) AS invoice_value,
                (SELECT GROUP_CONCAT($client_groups_table.title) FROM $client_groups_table WHERE FIND_IN_SET($client_groups_table.id, $clients_table.group_ids)) AS client_groups, $lead_status_table.title AS lead_status_title,  $lead_status_table.color AS lead_status_color,
                owner_details.owner_name, owner_details.owner_avatar,
                package_groups.package_name as package_groups,package_types.title as package_types,
                $clientname_table.company_name as client_name,complete_master.title as status, telemarketers.company_name as telemarketer_name,religion.title as religion,sub_religion.title as sub_religion,gift_master.title as gift
        FROM $clients_table 

        LEFT JOIN $clientname_table ON $clientname_table.id = $clients_table.client_id
        LEFT JOIN telemarketers ON telemarketers.id = $clients_table.telemarketer_id

        LEFT JOIN package_groups ON package_groups.id = $clients_table.package_id 
        LEFT JOIN package_types ON package_types.id = $clients_table.package_type_id 
        LEFT JOIN complete_master ON complete_master.id = $clients_table.complete_id 
         LEFT JOIN religion ON religion.id= $clients_table.religion_id
         LEFT JOIN sub_religion ON sub_religion.id= $clients_table.sub_religion_id
         LEFT JOIN gift_master ON gift_master.id= $clients_table.gift_id


        LEFT JOIN $users_table ON $users_table.client_id = $clients_table.id AND $users_table.deleted=0 AND $users_table.is_primary_contact=1 
        LEFT JOIN (SELECT client_id, COUNT(id) AS total_projects FROM $projects_table WHERE deleted=0 GROUP BY client_id) AS project_table ON project_table.client_id= $clients_table.id
        LEFT JOIN (SELECT client_id, SUM(payments_table.payment_received) as payment_received, $invoice_value_calculation_query as invoice_value FROM $invoices_table
                   LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table ON tax_table.id = $invoices_table.tax_id
                   LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table2 ON tax_table2.id = $invoices_table.tax_id2 
                   LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table3 ON tax_table3.id = $invoices_table.tax_id3 
                   LEFT JOIN (SELECT invoice_id, SUM(amount) AS payment_received FROM $invoice_payments_table WHERE deleted=0 GROUP BY invoice_id) AS payments_table ON payments_table.invoice_id=$invoices_table.id AND $invoices_table.deleted=0 AND $invoices_table.status='not_paid'
                   LEFT JOIN (SELECT invoice_id, SUM(total) AS invoice_value FROM $invoice_items_table WHERE deleted=0 GROUP BY invoice_id) AS items_table ON items_table.invoice_id=$invoices_table.id AND $invoices_table.deleted=0 AND $invoices_table.status='not_paid'
                   WHERE $invoices_table.status='not_paid'
                   GROUP BY $invoices_table.client_id    
                   ) AS invoice_details ON invoice_details.client_id= $clients_table.id 
        LEFT JOIN $lead_status_table ON $clients_table.lead_status_id = $lead_status_table.id 
        LEFT JOIN (SELECT $users_table.id, CONCAT($users_table.first_name, ' ', $users_table.last_name) AS owner_name, $users_table.image AS owner_avatar FROM $users_table WHERE $users_table.deleted=0 AND $users_table.user_type='staff') AS owner_details ON owner_details.id=$clients_table.owner_id
        $join_custom_fieds               
        WHERE $clients_table.deleted=0 $where 
        ORDER BY DAYOFYEAR($clients_table.birth_date) < DAYOFYEAR(CURDATE()) , DAYOFYEAR($clients_table.birth_date)";

       
        return $this->db->query($sql);
       // echo $this->db->last_query();













    }

    function get_primary_contact($client_id = 0, $info = false) {
        $users_table = $this->db->dbprefix('users');

        $sql = "SELECT $users_table.id, $users_table.first_name, $users_table.last_name
        FROM $users_table
        WHERE $users_table.deleted=0 AND $users_table.client_id=$client_id AND $users_table.is_primary_contact=1";
        $result = $this->db->query($sql);
        if ($result->num_rows()) {
            if ($info) {
                return $result->row();
            } else {
                return $result->row()->id;
            }
        }
    }

    function add_remove_star($project_id, $user_id, $type = "add") {
        $clients_table = $this->db->dbprefix('customers');

        $action = " CONCAT($clients_table.starred_by,',',':$user_id:') ";
        $where = " AND FIND_IN_SET(':$user_id:',$clients_table.starred_by) = 0"; //don't add duplicate

        if ($type != "add") {
            $action = " REPLACE($clients_table.starred_by, ',:$user_id:', '') ";
            $where = "";
        }

        $sql = "UPDATE $clients_table SET $clients_table.starred_by = $action
        WHERE $clients_table.id=$project_id $where";
        return $this->db->query($sql);
    }

    function get_starred_clients($user_id) {
        $clients_table = $this->db->dbprefix('customers');

        $sql = "SELECT $clients_table.id,  $clients_table.company_name
        FROM $clients_table
        WHERE $clients_table.deleted=0 AND FIND_IN_SET(':$user_id:',$clients_table.starred_by)
        ORDER BY $clients_table.company_name ASC";
        return $this->db->query($sql);
    }

    function delete_client_and_sub_items($client_id) {
        $clients_table = $this->db->dbprefix('customers');
        $general_files_table = $this->db->dbprefix('general_files');
        $users_table = $this->db->dbprefix('users');


        //get client files info to delete the files from directory 
        $client_files_sql = "SELECT * FROM $general_files_table WHERE $general_files_table.deleted=0 AND $general_files_table.client_id=$client_id; ";
        $client_files = $this->db->query($client_files_sql)->result();

        //delete the client and sub items
        //delete client
        $delete_client_sql = "UPDATE $clients_table SET $clients_table.deleted=1 WHERE $clients_table.id=$client_id; ";
        $this->db->query($delete_client_sql);

        //delete contacts
        $delete_contacts_sql = "UPDATE $users_table SET $users_table.deleted=1 WHERE $users_table.client_id=$client_id; ";
        $this->db->query($delete_contacts_sql);

        //delete the project files from directory
        $file_path = get_general_file_path("client", $client_id);
        foreach ($client_files as $file) {
            delete_app_files($file_path, array(make_array_of_file($file)));
        }

        return true;
    }

    function is_duplicate_company_name($company_name, $id = 0) {

        $result = $this->get_all_where(array("company_name" => $company_name, "is_lead" => 0, "deleted" => 0));
        if ($result->num_rows() && $result->row()->id != $id) {
            return $result->row();
        } else {
            return false;
        }
    }

    function get_leads_kanban_details($options = array()) {
        $clients_table = $this->db->dbprefix('customers');
        $lead_source_table = $this->db->dbprefix('lead_source');
        $users_table = $this->db->dbprefix('users');
        $events_table = $this->db->dbprefix('events');
        $notes_table = $this->db->dbprefix('notes');
        $estimates_table = $this->db->dbprefix('estimates');
        $general_files_table = $this->db->dbprefix('general_files');
        $estimate_requests_table = $this->db->dbprefix('estimate_requests');

        $where = "";

        $status = get_array_value($options, "status");
        if ($status) {
            $where .= " AND $clients_table.lead_status_id='$status'";
        }

        $owner_id = get_array_value($options, "owner_id");
        if ($owner_id) {
            $where .= " AND $clients_table.owner_id='$owner_id'";
        }

        $source = get_array_value($options, "source");
        if ($source) {
            $where .= " AND $clients_table.lead_source_id='$source'";
        }

        $users_where = "$users_table.client_id=$clients_table.id AND $users_table.deleted=0 AND $users_table.user_type='lead'";

        $this->db->query('SET SQL_BIG_SELECTS=1');

        $sql = "SELECT $clients_table.id, $clients_table.company_name, $clients_table.sort, IF($clients_table.sort!=0, $clients_table.sort, $clients_table.id) AS new_sort, $clients_table.lead_status_id, $clients_table.owner_id,
                (SELECT $users_table.image FROM $users_table WHERE $users_where AND $users_table.is_primary_contact=1) AS primary_contact_avatar,
                (SELECT COUNT($users_table.id) FROM $users_table WHERE $users_where) AS total_contacts_count,
                (SELECT COUNT($events_table.id) FROM $events_table WHERE $events_table.deleted=0 AND $events_table.client_id=$clients_table.id) AS total_events_count,
                (SELECT COUNT($notes_table.id) FROM $notes_table WHERE $notes_table.deleted=0 AND $notes_table.client_id=$clients_table.id) AS total_notes_count,
                (SELECT COUNT($estimates_table.id) FROM $estimates_table WHERE $estimates_table.deleted=0 AND $estimates_table.client_id=$clients_table.id) AS total_estimates_count,
                (SELECT COUNT($general_files_table.id) FROM $general_files_table WHERE $general_files_table.deleted=0 AND $general_files_table.client_id=$clients_table.id) AS total_files_count,
                (SELECT COUNT($estimate_requests_table.id) FROM $estimate_requests_table WHERE $estimate_requests_table.deleted=0 AND $estimate_requests_table.client_id=$clients_table.id) AS total_estimate_requests_count,
                $lead_source_table.title AS lead_source_title,
                CONCAT($users_table.first_name, ' ', $users_table.last_name) AS owner_name
        FROM $clients_table 
        LEFT JOIN $lead_source_table ON $clients_table.lead_source_id = $lead_source_table.id 
        LEFT JOIN $users_table ON $users_table.id = $clients_table.owner_id AND $users_table.deleted=0 AND $users_table.user_type='staff' 
        WHERE $clients_table.deleted=0 AND $clients_table.is_lead=1 $where 
        ORDER BY new_sort ASC";

        return $this->db->query($sql);
    }

    function get_search_suggestion($search = "") {
        $clients_table = $this->db->dbprefix('customers');

        $search = $this->db->escape_str($search);

        $sql = "SELECT $clients_table.id, $clients_table.company_name AS title
        FROM $clients_table  
        WHERE $clients_table.deleted=0 AND $clients_table.is_lead=0 AND $clients_table.company_name LIKE '%$search%'
        ORDER BY $clients_table.company_name ASC
        LIMIT 0, 10";

        return $this->db->query($sql);
    }

     public function getAmountBySection($client_id, $fromid, $toid) {
      
            // $this->db->select('fees_groups.id,fees_groups.class_id,fees_groups.amount');
            // $this->db->from('customers');
           
            // $this->db->where('fees_groups.class_id', $classid);

        $sql = "select count(*) as result from customers
            where customers.client_id = ". $client_id ." and customers.id >= ". $fromid ." and customers.id <= ". $toid ." and transfer_id = 1 and bid = 1 and bcouriersent_id = 0 and giftforb_id = 1 ";
            
            
           
            //$query = $this->db->get();
            $query = $this->db->query($sql);
            return $query->row_array();
    }


    function insert_datas($client_id, $from_id, $to_id) {
        //$clients_table = $this->db->dbprefix('customers');

        $sql = "INSERT INTO courierdatas (telemarketer_id,customer_id,client_id,customer_name,birth_date,address,city,landmark,state,zip,phone,email,religion_id,sub_religion_id,gift_id,gift_for)
                SELECT telemarketer_id,id,client_id,customer_name,birth_date,address,city,landmark,state,zip,phone,email,religion_id,sub_religion_id,gift_id,'Birthday Gift' FROM customers
                WHERE customers.id >= $from_id AND customers.id <= $to_id and customers.client_id = $client_id and customers.bid = 1 and customers.transfer_id=1";

         $this->db->query($sql);


        $sqll = "UPDATE  customers set bcouriersent_id = 1 
         WHERE customers.id >= $from_id AND customers.id <= $to_id and customers.client_id = $client_id and 
         customers.bid = 1 and customers.transfer_id=1";

         $this->db->query($sqll);

         return true;
    }

}
