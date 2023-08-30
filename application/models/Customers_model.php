<?php

class Customers_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'customers';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
       //  $clients_table = $this->db->dbprefix('clients');
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
       //          owner_details.owner_name, owner_details.owner_avatar,salesmanager.company_name as salesname,
       //          package_groups.package_name as package_groups,package_types.title as package_types
       //  FROM $clients_table

       //  LEFT JOIN package_groups ON package_groups.id = $clients_table.package_id 
       //  LEFT JOIN package_types ON package_types.id = $clients_table.package_type_id 
       //  LEFT JOIN salesmanager ON salesmanager.id = $clients_table.salesmanager_id 



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






        $sql1="UPDATE customers set birth_date = NULL WHERE birth_date ='0000-00-00'";
        $this->db->query($sql1);
        $sql2="UPDATE customers set anniversary_date = NULL WHERE anniversary_date ='0000-00-00'";
        $this->db->query($sql2);



         $clients_table = $this->db->dbprefix('customers');
         $clientname_table = $this->db->dbprefix('clients');

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


        $client_id = get_array_value($options, "client_id");
        if ($client_id) {
            $where .= " AND salesmanager.id='$client_id'";
        }

        

        // $from_id = get_array_value($options, "from_id");
        // $to_id = get_array_value($options, "to_id");
        // if ($from_id and $to_id) {
        //     $where .= " AND $clients_table.id >= $from_id AND $clients_table.id <= $to_id ";
        // }
        

        

        if (!$id && !$leads_only) {
            //only clients
            $where .= " AND $clients_table.is_lead=0";
        }

        if ($this->login_user->user_type === "staff") {

        $group_id = get_array_value($options, "group_id");
        $client = get_array_value($options, "client");
        if ($group_id) {
            $where .= " AND FIND_IN_SET('$group_id', $clientname_table.id)";
        } 
        else if (!$id && !$client) {
            //$where .= " AND FIND_IN_SET('0', $clients_table.id)";
            $where .= " AND $clients_table.id='0'";
        } else if ($client) {
            $where .= " AND customers.client_id='$client'";
        }

        $status_id = get_array_value($options, "status_id");
        if ($status_id) {
            $where .= " AND $clients_table.status_id = '$status_id'";
        } 
        else if (!$id) {
          //  $where .= " AND $clients_table.status_id='2'";
        }

         } else {
            $client = get_array_value($options, "client");
            if ($client) {
            $where .= " AND customers.client_id='$client'";
            }
            $complete_id = get_array_value($options, "complete_id");
            if ($complete_id) {
                $where .= " AND $clients_table.complete_id = '$complete_id'";
            } 

         }

        





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
                $clientname_table.company_name as client_name,status_master.title as status,complete_master.title as cstatus
        FROM $clients_table 

        LEFT JOIN $clientname_table ON $clientname_table.id = $clients_table.client_id

        LEFT JOIN package_groups ON package_groups.id = $clients_table.package_id 
        LEFT JOIN package_types ON package_types.id = $clients_table.package_type_id 
        LEFT JOIN status_master ON status_master.id = $clients_table.status_id 
        LEFT JOIN complete_master ON complete_master.id = $clients_table.complete_id 
       


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
         ORDER BY $clients_table.id ASC";
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


    function insert_datas($telemarketer_id, $client_id, $from_id, $to_id) {
        //$clients_table = $this->db->dbprefix('customers');

        // $sql = "INSERT INTO teledatas (telemarketer_id,customer_id,client_id,customer_name,birth_date,            anniversary_date,address,city,state,zip,phone,email)
        //         SELECT $telemarketer_id,id,client_id,customer_name,birth_date,anniversary_date,address,city,state,zip,phone,email FROM customers
        //         WHERE customers.id >= $from_id AND customers.id <= $to_id and customers.client_id = $client_id";

        //  $this->db->query($sql);

        //$assigndate = date('Y-m-d');
        // $date = new DateTime("now");
 
        // $assigndate = $date->format('Y-m-d ');
        //$assigndate = get_my_local_time("Y-m-d");

         $sqll = "UPDATE  customers set status_id = 1 ,telemarketer_id= $telemarketer_id,
         assign_date = now()
         WHERE customers.id >= $from_id AND customers.id <= $to_id and customers.client_id = $client_id";

         $this->db->query($sqll);

         return true;
    }

    public function getAmountBySection($client_id, $telemarketer_id, $fromid, $toid) {
      
            // $this->db->select('fees_groups.id,fees_groups.class_id,fees_groups.amount');
            // $this->db->from('customers');
           
            // $this->db->where('fees_groups.class_id', $classid);

        $sql = "select count(*) as result from customers
            where customers.client_id = ". $client_id ." and customers.telemarketer_id = ". $telemarketer_id ." and customers.id >= ". $fromid ." and customers.id <= ". $toid ." and complete_id = 1 and status_id = 1 and transfer_id = 2";
            
           
            //$query = $this->db->get();
            $query = $this->db->query($sql);
            return $query->row_array();
    }
    public function gettotBySection($client_id, $telemarketer_id, $fromid, $toid) {
      
            // $this->db->select('fees_groups.id,fees_groups.class_id,fees_groups.amount');
            // $this->db->from('customers');
           
            // $this->db->where('fees_groups.class_id', $classid);

        $sql = "select count(*) as result from customers
            where customers.client_id = ". $client_id ." and customers.id >= ". $fromid ." and customers.id <= ". $toid ." and status_id = 2 ";
            
           
            //$query = $this->db->get();
            $query = $this->db->query($sql);
            return $query->row_array();
    }


    public function getStudentsByArray($client_id, $from_id, $to_id)
    {
        // $i             = 1;
        // $custom_fields = $this->customfield_model->get_custom_fields('students');

        // $field_var_array = array();
        // if (!empty($custom_fields)) {
        //     foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
        //         $tb_counter = "table_custom_" . $i;
        //         array_push($field_var_array, 'table_custom_' . $i . '.field_value as ' . $custom_fields_value->name);
        //         $this->db->join('custom_field_values as ' . $tb_counter, 'students.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, 'left');
        //         $i++;
        //     }
        // }

        // $field_variable = implode(',', $field_var_array);

        // $this->db->select('customers.*,clients.scompany_name as ccompany_name,clients.address as caddress,clients.city as ccity,clients.state as cstate,clients.zip as czip,clients.sphone as csphone')->from('customers');
        //  $this->db->join('clients', 'customers.client_id = clients.id');
        // // $this->db->join('classes', 'student_session.class_id = classes.id');
        // // $this->db->join('sections', 'sections.id = student_session.section_id');
        // // $this->db->join('categories', 'students.category_id = categories.id', 'left');
        // // $this->db->join('users', 'users.user_id = students.id', 'left');
        // // $this->db->where('student_session.session_id', $this->current_session);
        // // $this->db->where('users.role', 'student');
        // $this->db->where_in('customers.id', $from_id);
        // $this->db->where_in('customers.client_id', $client_id);
        // $this->db->order_by('customers.id');

        // $sql = "customers.*,courierdatas.customer_id as custid,clients.scompany_name as ccompany_name,clients.address as caddress,clients.city as ccity,clients.state as cstate,clients.zip as czip,clients.sphone as csphone from customers
        // left join clients on clients.id =customers.client_id
        // left join courierdatas on courierdatas.customer_id =customers.id
        //     where customers.client_id = ". $client_id ." and courierdatas.id >= ". $fromid ." and courierdatas.id <= ". $toid ." ";

        // $sql = "select courierdatas.*,customers.id  as custid,clients.scompany_name as ccompany_name,clients.address as caddress,clients.city as ccity,clients.state as cstate,clients.zip as czip,clients.sphone as csphone from courierdatas
        // left join clients on clients.id =courierdatas.client_id
        // left join customers on courierdatas.customer_id =customers.id
        //     where courierdatas.client_id =". $client_id ." and courierdatas.id >= ". $from_id ." and courierdatas.id <= ". $to_id ." ";

         $this->db->select('courierdatas.id,customers.id  as custid,customers.customer_name,customers.address,customers.city,customers.state,customers.phone,customers.zip,customers.landmark,clients.scompany_name as ccompany_name,clients.address as caddress,clients.city as ccity,clients.state as cstate,clients.zip as czip,clients.sphone as csphone,clients.files')->from('courierdatas');
         $this->db->join('clients', 'courierdatas.client_id = clients.id');
         $this->db->join('customers', 'courierdatas.customer_id = customers.id');
        // $this->db->join('sections', 'sections.id = student_session.section_id');
        // $this->db->join('categories', 'students.category_id = categories.id', 'left');
        // $this->db->join('users', 'users.user_id = students.id', 'left');
        // $this->db->where('student_session.session_id', $this->current_session);
        // $this->db->where('users.role', 'student');
        $this->db->where_in('courierdatas.id', $from_id);
        $this->db->where_in('customers.client_id', $client_id);
        //$this->db->order_by('customers.id');

            

        $query = $this->db->get();

        return $query->result();
    }

    function get_giftdetails($options = array()) {
      


        //  $clients_table = $this->db->dbprefix('customers');
        //  $clientname_table = $this->db->dbprefix('clients');

        // $projects_table = $this->db->dbprefix('projects');
        // $users_table = $this->db->dbprefix('users');
        // $invoices_table = $this->db->dbprefix('invoices');
        // $invoice_payments_table = $this->db->dbprefix('invoice_payments');
        // $invoice_items_table = $this->db->dbprefix('invoice_items');
        // $taxes_table = $this->db->dbprefix('taxes');
        // $client_groups_table = $this->db->dbprefix('client_groups');
        // $lead_status_table = $this->db->dbprefix('lead_status');

        // $where = "";
        $id = get_array_value($options, "id");
        // if ($id) {
        //     $where .= " AND $clients_table.id=$id";
        // }

       

        $sql = "SELECT couriersentdatas.*, customers.customer_name as ccustomer_name,customers.birth_date as cbirth_date,customers.anniversary_date as canniversary_date,customers.client_id as cclient_id,clients.company_name as client_name
        FROM couriersentdatas

        LEFT JOIN customers ON customers.id = couriersentdatas.customer_id

        LEFT JOIN clients ON clients.id = couriersentdatas.client_id 
        
        


                     
        WHERE couriersentdatas.deleted=0 and  couriersentdatas.customer_id = $id
         ORDER BY couriersentdatas.id ASC";
        return $this->db->query($sql);
       // echo $this->db->last_query();

    }
    public function getcourier($id)
    {
        
         $this->db->select('courierdatas.id,customers.id  as custid,customers.customer_name,customers.address,customers.city,customers.state,customers.zip,customers.landmark,clients.scompany_name as ccompany_name,clients.address as caddress,clients.city as ccity,clients.state as cstate,clients.zip as czip,clients.sphone as csphone')->from('courierdatas');
         $this->db->join('clients', 'courierdatas.client_id = clients.id');
         $this->db->join('customers', 'courierdatas.customer_id = customers.id');
        // $this->db->join('sections', 'sections.id = student_session.section_id');
        // $this->db->join('categories', 'students.category_id = categories.id', 'left');
        // $this->db->join('users', 'users.user_id = students.id', 'left');
        // $this->db->where('student_session.session_id', $this->current_session);
        // $this->db->where('users.role', 'student');
        $this->db->where_in('courierdatas.id', $from_id);
        $this->db->where_in('customers.client_id', $client_id);
        //$this->db->order_by('customers.id');

            

        $query = $this->db->get();

        return $query->result();
    }

    function get_total_assigncus($id = 0) {
            //$clients_table = $this->db->dbprefix('clients');
            if ($id) {
                $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and status_id = 1 and telemarketer_id = " . $id;
        } else {
            $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and status_id = 1 ";
        }
            

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
    function get_total_unassigncus($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and status_id = 2 ";

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }

        function get_total_completecus($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            if ($id) {
            $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and complete_id = 1 and status_id = 1 and telemarketer_id = " . $id;
            } else {
                 $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and complete_id = 1 and status_id = 1";
            }

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
    function get_total_incompletecus($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
        if ($id) {
            $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and complete_id = 2 and status_id = 1 and telemarketer_id = " . $id;
            } else {
                $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and complete_id = 2 and status_id = 1";
            }

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_assigntoday($id = 0) {
            //$clients_table = $this->db->dbprefix('clients');
            if ($id) {
                $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and status_id = 1 and assign_date = now() and telemarketer_id = " . $id;
        } else {
            $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and status_id = 1 ";
        }
            

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_completetoday($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            if ($id) {
            $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and complete_id = 1 and  status_id = 1 and completed_date = now() and telemarketer_id = " . $id;
            } else {
                 $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and complete_id = 1 and status_id = 1";
            }

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }

        function get_total_clientsales($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            if ($id) {
           $sql = "SELECT  COUNT(clients.id) as total
            FROM clients                
            WHERE clients.deleted=0  and salesmanager_id = " . $id;
            } 

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalsalescus($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            if ($id) {
           $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0  and salesmanager_id = " . $id;
            } 

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalgiftsmonths($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            if ($id) {
           $sql = "SELECT  COUNT(couriersentdatas.id) as total
            FROM couriersentdatas                
            WHERE couriersentdatas.deleted=0 and MONTH(courier_date) = MONTH(CURRENT_DATE()) AND YEAR(courier_date) = YEAR(CURRENT_DATE()) and salesmanager_id = " . $id;
            } 

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalgiftprocessmonth($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  COUNT(courierdatas.id) as total
            FROM courierdatas                
            WHERE courierdatas.deleted=0 and MONTH(assign_date) = MONTH(CURRENT_DATE()) AND YEAR(assign_date) = YEAR(CURRENT_DATE()) " ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        } 

        function get_total_totalbdaygiftmonth($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and MONTH(birth_date) = MONTH(NOW()) and transfer_id = 1 and giftforb_id = 1" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalanngiftmonth($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  COUNT(customers.id) as total
            FROM customers                
            WHERE customers.deleted=0 and MONTH(anniversary_date) = MONTH(NOW()) and transfer_id = 1 and giftfora_id = 1" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }

        function get_total_totalgiftsent($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  COUNT(courierdatas.id) as total
            FROM courierdatas                
            WHERE courierdatas.deleted=0 and MONTH(assign_date) = MONTH(CURRENT_DATE()) AND YEAR(assign_date) = YEAR(CURRENT_DATE()) and couriersent_id = 1 " ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }

        function get_total_totalgiftunsent($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  COUNT(courierdatas.id) as total
            FROM courierdatas                
            WHERE courierdatas.deleted=0 and MONTH(assign_date) = MONTH(CURRENT_DATE()) AND YEAR(assign_date) = YEAR(CURRENT_DATE()) and couriersent_id = 0" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }

        function get_total_totalgiftdeliver($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  COUNT(couriersentdatas.id) as total
            FROM couriersentdatas                
            WHERE couriersentdatas.deleted=0 and MONTH(courier_date) = MONTH(CURRENT_DATE()) AND YEAR(courier_date) = YEAR(CURRENT_DATE()) and tracking_num is NOT NULL " ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }

        function get_total_totalgiftundeliver($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  COUNT(couriersentdatas.id) as total
            FROM couriersentdatas                
            WHERE couriersentdatas.deleted=0 and MONTH(courier_date) = MONTH(CURRENT_DATE()) AND YEAR(courier_date) = YEAR(CURRENT_DATE()) and tracking_num is NULL" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        
        function get_total_totalinvoicetoday($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           // $sql = "SELECT  SUM(invoice_items.total) as total
           //  FROM invoice_items                
           //  WHERE invoice_items.deleted=0 and MONTH(assign_date) = MONTH(CURRENT_DATE()) AND YEAR(assign_date) = YEAR(CURRENT_DATE())" ;

            $sql = "SELECT  SUM(invoice_items.total) as total
            FROM invoice_items                
            WHERE invoice_items.deleted=0 and created_at = date(now())" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalincometoday($id =0) {
            $sql = "SELECT  SUM(invoice_payments.amount) as total
            FROM invoice_payments                
            WHERE invoice_payments.deleted=0 and created_at = date(now())" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalexptoday($id =0) {
            $sql = "SELECT  SUM(expenses.amount) as total
            FROM expenses                
            WHERE expenses.deleted=0 and expense_date = date(now())" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalinvoicemonth($id =0) {
            //$clients_table = $this->db->dbprefix('clients');
            

            
           $sql = "SELECT  SUM(invoice_items.total) as total
            FROM invoice_items                
            WHERE invoice_items.deleted=0 and MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())" ;

            // $sql = "SELECT  SUM(invoice_items.total) as total
            // FROM invoice_items                
            // WHERE invoice_items.deleted=0 and created_at = date(now())" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalincomemonth($id =0) {
            $sql = "SELECT  SUM(invoice_payments.amount) as total
            FROM invoice_payments                
            WHERE invoice_payments.deleted=0 and MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalexpmonth($id =0) {
            $sql = "SELECT  SUM(expenses.amount) as total
            FROM expenses                
            WHERE expenses.deleted=0 and MONTH(expense_date) = MONTH(CURRENT_DATE()) AND YEAR(expense_date) = YEAR(CURRENT_DATE())" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalcash($id =0) {
            $sql = "SELECT (SELECT SUM(amount) FROM invoice_payments where deleted = 0) - (SELECT SUM(amount) FROM expenses where deleted = 0) AS total" ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalinvoice($id =0) {
           
            // $sql = "SELECT  SUM(invoice_items.total) as total
            // FROM invoice_items                
            // WHERE invoice_items.deleted=0 " ;
                    
            // $result = $this->db->query($sql);
            // return $result->row();

        $invoices_table = $this->db->dbprefix('invoices');
        $clients_table = $this->db->dbprefix('clients');
        $projects_table = $this->db->dbprefix('projects');
        $taxes_table = $this->db->dbprefix('taxes');
        $invoice_payments_table = $this->db->dbprefix('invoice_payments');
        $invoice_items_table = $this->db->dbprefix('invoice_items');
        $users_table = $this->db->dbprefix('users');

        $where = "";
        $now = get_my_local_time("Y-m-d");
        //  $options['status'] = "draft";
        //$status = get_array_value($options, "status");


        //$start_date = get_array_value($options, "start_date");
        //$end_date = get_array_value($options, "end_date");
        if ($id == "1") {
            $where .= " and MONTH($invoices_table.due_date) = MONTH(CURRENT_DATE()) AND YEAR($invoices_table.due_date) = YEAR(CURRENT_DATE()) ";
        } else if ($id == "2") {
            $where .= " and $invoices_table.due_date = date(now()) ";
        }



        $invoice_value_calculation_query = $this->_get_invoice_value_calculation_query($invoices_table);


        $invoice_value_calculation = "TRUNCATE($invoice_value_calculation_query,2)";

        if ($status === "draft") {
            $where .= " AND $invoices_table.status='draft' AND IFNULL(payments_table.payment_received,0)<=0";
        } else if ($status === "not_paid") {
            $where .= " AND $invoices_table.status !='draft' AND $invoices_table.status!='cancelled' AND IFNULL(payments_table.payment_received,0)<=0";
        } else if ($status === "partially_paid") {
            $where .= " AND IFNULL(payments_table.payment_received,0)>0 AND IFNULL(payments_table.payment_received,0)<$invoice_value_calculation";
        } else if ($status === "fully_paid") {
            $where .= " AND TRUNCATE(IFNULL(payments_table.payment_received,0),2)>=$invoice_value_calculation";
        } else if ($status === "overdue") {
            $where .= " AND $invoices_table.status !='draft' AND $invoices_table.status!='cancelled' AND $invoices_table.due_date<'$now' AND TRUNCATE(IFNULL(payments_table.payment_received,0),2)<$invoice_value_calculation";
        } else if ($status === "cancelled") {
            $where .= " AND $invoices_table.status='cancelled' ";
        }
    


        // //prepare custom fild binding query
        // $custom_fields = get_array_value($options, "custom_fields");
        $custom_field_query_info = $this->prepare_custom_field_query_string("invoices", $custom_fields, $invoices_table);
        $select_custom_fieds = get_array_value($custom_field_query_info, "select_string");
        $join_custom_fieds = get_array_value($custom_field_query_info, "join_string");




        $sql = "SELECT $invoices_table.*, $clients_table.currency, $clients_table.salesmanager_id, $clients_table.currency_symbol, $clients_table.company_name, $projects_table.title AS project_title,
           $invoice_value_calculation_query AS invoice_value, IFNULL(payments_table.payment_received,0) AS payment_received, tax_table.percentage AS tax_percentage, tax_table2.percentage AS tax_percentage2, tax_table3.percentage AS tax_percentage3, CONCAT($users_table.first_name, ' ',$users_table.last_name) AS cancelled_by_user $select_custom_fieds
        FROM $invoices_table
        LEFT JOIN $clients_table ON $clients_table.id= $invoices_table.client_id
        LEFT JOIN $projects_table ON $projects_table.id= $invoices_table.project_id
        LEFT JOIN $users_table ON $users_table.id= $invoices_table.cancelled_by
        LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table ON tax_table.id = $invoices_table.tax_id
        LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table2 ON tax_table2.id = $invoices_table.tax_id2
        LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table3 ON tax_table3.id = $invoices_table.tax_id3
        LEFT JOIN (SELECT invoice_id, SUM(amount) AS payment_received FROM $invoice_payments_table WHERE deleted=0 GROUP BY invoice_id) AS payments_table ON payments_table.invoice_id = $invoices_table.id 
        LEFT JOIN (SELECT invoice_id, SUM(total) AS invoice_value FROM $invoice_items_table WHERE deleted=0 GROUP BY invoice_id) AS items_table ON items_table.invoice_id = $invoices_table.id 
        $join_custom_fieds
        WHERE $invoices_table.deleted=0 $where";
        return $this->db->query($sql);
           
        }
        function get_total_totalincome($id =0) {
            $sql = "SELECT  SUM(invoice_payments.amount) as total
            FROM invoice_payments                
            WHERE invoice_payments.deleted=0 " ;
           

           // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->row();
            //echo $this->db->last_query();    
        }
        function get_total_totalexp($id =0) {
           //  $sql = "SELECT  SUM(expenses.amount) as total
           //  FROM expenses                
           //  WHERE expenses.deleted=0 " ;
           

           // // return $this->db->query($sql);
           //  $result = $this->db->query($sql);
           //  return $result->row();
           //  //echo $this->db->last_query();    


        $expenses_table = $this->db->dbprefix('expenses');
        $expense_categories_table = $this->db->dbprefix('expense_categories');
        $projects_table = $this->db->dbprefix('projects');
        $users_table = $this->db->dbprefix('users');
        $taxes_table = $this->db->dbprefix('taxes');


        $where = "";
        if ($id == "1") {
            $where .= " and MONTH($expenses_table.expense_date) = MONTH(CURRENT_DATE()) AND YEAR($expenses_table.expense_date) = YEAR(CURRENT_DATE()) ";
        } else if ($id == "2") {
            $where .= " and $expenses_table.expense_date = date(now()) ";
        }
       //prepare custom fild binding query
       // $custom_fields = get_array_value($options, "custom_fields");
        $custom_field_query_info = $this->prepare_custom_field_query_string("expenses", $custom_fields, $expenses_table);
        $select_custom_fields = get_array_value($custom_field_query_info, "select_string");
        $join_custom_fields = get_array_value($custom_field_query_info, "join_string");


        $sql = "SELECT $expenses_table.*, $expense_categories_table.title as category_title, 
                 CONCAT($users_table.first_name, ' ', $users_table.last_name) AS linked_user_name,
                 $projects_table.title AS project_title,
                 tax_table.percentage AS tax_percentage,
                 tax_table2.percentage AS tax_percentage2
                 $select_custom_fields
        FROM $expenses_table
        LEFT JOIN $expense_categories_table ON $expense_categories_table.id= $expenses_table.category_id
        LEFT JOIN $projects_table ON $projects_table.id= $expenses_table.project_id
        LEFT JOIN $users_table ON $users_table.id= $expenses_table.user_id
        LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table ON tax_table.id = $expenses_table.tax_id
        LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table2 ON tax_table2.id = $expenses_table.tax_id2
            $join_custom_fields
        WHERE $expenses_table.deleted=0 $where";
        return $this->db->query($sql);
        }
        







        public function get_salesmanqty($salesmanager_id = null)
    {
      
             $sql = "drop table salesmancom";
             $query = $this->db->query($sql);
      
        //  if (!$this->rbac->hasPrivilege('superadmin')) {
        //      $sql = "create table exp as
        //                 SELECT SUM(expenses.amount) AS total, MONTH(expenses.date) AS month FROM expenses
        //                 where expenses.branch_id=" . $this->db->escape($userdatabranch) . " and 
        //                 expenses.date >= " . $this->db->escape($start_date) . " and 
        //                 expenses.date <= " . $this->db->escape($end_date) . " 
        //                 GROUP BY MONTH(expenses.date)";

        // } else {



        // if ($salesmanager_id) {
        //     $sql = "create table salesmancom as
        //                 select salesmanager_id,count(salesmanager_id) as count from couriersentdatas
        //                 where 
        //                 couriersentdatas.courier_date >= " . $this->db->escape($start_date) . " and 
        //                 couriersentdatas.courier_date <= " . $this->db->escape($end_date) . " and 
        //                 couriersentdatas.salesmanager_id = ". $salesmanager_id ."
        //                 GROUP BY salesmanager_id";
                         
        // } else {
            $sql = "create table salesmancom as
                        select salesmanager_id,count(salesmanager_id) as count from couriersentdatas
                        where 
                        MONTH(courier_date) = MONTH(CURRENT_DATE()) AND YEAR(courier_date) = YEAR(CURRENT_DATE())
                        
                        GROUP BY salesmanager_id";
       // }
             

        //}    

        $query = $this->db->query($sql);
        //return $query->result_array();
        //echo $this->db->last_query();
        return true;
    }
    public function searchcom($salesmanager_id = null)
    {       
        if ($salesmanager_id) {
            $sql = "select salesmanager.*,salesmancom.count  from salesmanager
           
                    left join salesmancom on salesmancom.salesmanager_id=salesmanager.id
                   
                    where salesmanager.deleted = 0 and 
                        salesmanager.id = ". $salesmanager_id ."
                    group by salesmanager.id order by salesmanager.id";  
                }else{ 
                    $sql = "select salesmanager.*,salesmancom.count  from salesmanager
           
                    left join salesmancom on salesmancom.salesmanager_id=salesmanager.id
                   
                    where salesmanager.deleted = 0  
                      
                    group by salesmanager.id order by salesmanager.id"; 



                }
                  
        // $query = $this->db->query($sql);
        // return $query->result_array();    
        // return $this->db->query($sql);  
         $result = $this->db->query($sql);
            return $result->row();     
               
        
    }

}
