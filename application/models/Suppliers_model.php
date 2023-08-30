<?php

class Suppliers_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'suppliers';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $suppliers_table = $this->db->dbprefix('suppliers');
        $projects_table = $this->db->dbprefix('projects');
        $users_table = $this->db->dbprefix('users');
        $invoices_table = $this->db->dbprefix('pinvoices');
        // $invoice_payments_table = $this->db->dbprefix('pinvoice_payments');
        $invoice_payments_table = $this->db->dbprefix('expenses');
        $invoice_items_table = $this->db->dbprefix('pinvoice_items');
        $taxes_table = $this->db->dbprefix('taxes');
        $supplier_groups_table = $this->db->dbprefix('supplier_groups');
        $lead_status_table = $this->db->dbprefix('lead_status');

        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND $suppliers_table.id=$id";
        }

        $client_id = get_array_value($options, "client_id");
        if ($client_id) {
            $where .= " AND $suppliers_table.id=$client_id";
        }

        $custom_field_type = "supplier";

        $leads_only = get_array_value($options, "leads_only");
        if ($leads_only) {
            $custom_field_type = "leads";
            $where .= " AND $suppliers_table.is_lead=1";
        }

        $status = get_array_value($options, "status");
        if ($status) {
            $where .= " AND $suppliers_table.lead_status_id='$status'";
        }

        $source = get_array_value($options, "source");
        if ($source) {
            $where .= " AND $suppliers_table.lead_source_id='$source'";
        }

        $owner_id = get_array_value($options, "owner_id");
        if ($owner_id) {
            $where .= " AND $suppliers_table.owner_id='$owner_id'";
        }

        if (!$id && !$leads_only) {
            //only suppliers
            $where .= " AND $suppliers_table.is_lead=0";
        }

        $group_id = get_array_value($options, "group_id");
        if ($group_id) {
            $where .= " AND FIND_IN_SET('$group_id', $suppliers_table.group_ids)";
        }


        $category_id = get_array_value($options, "category_id");
        if ($category_id) {
            $where .= " AND $suppliers_table.category_id='$category_id'";
        }
        $city_id = get_array_value($options, "city_id");
        if ($city_id) {
            $where .= " AND $suppliers_table.city_id='$city_id'";
        }
        $area_id = get_array_value($options, "area_id");
        if ($area_id) {
            $where .= " AND $suppliers_table.area_id='$area_id'";
        }
        $statuses = get_array_value($options, "status");
        if ($statuses) {
            $where .= " AND $suppliers_table.status='$statuses'";
        } 
        // else {
        //    // $where .= " AND $suppliers_table.status='enabled'";
        // }
        if (!$statuses) {
           // $where .= " AND $suppliers_table.status='enabled'";
        } 


        //prepare custom fild binding query
        $custom_fields = get_array_value($options, "custom_fields");
        $custom_field_query_info = $this->prepare_custom_field_query_string($custom_field_type, $custom_fields, $suppliers_table);
        $select_custom_fieds = get_array_value($custom_field_query_info, "select_string");
        $join_custom_fieds = get_array_value($custom_field_query_info, "join_string");

        $invoice_value_calculation_query = "(SUM" . $this->_get_invoice_value_calculation_query($invoices_table) . ")";

        $this->db->query('SET SQL_BIG_SELECTS=1');

        $invoice_value_select = "IFNULL(invoice_details.invoice_value,0)";
        $payment_value_select = "IFNULL(invoice_details.payment_received,0)";

        $sql = "SELECT $suppliers_table.*, category.title as category,city.title as city,area.title as area,   CONCAT($users_table.first_name, ' ', $users_table.last_name) AS primary_contact, $users_table.id AS primary_contact_id, $users_table.image AS contact_avatar,  project_table.total_projects, $payment_value_select AS payment_received $select_custom_fieds,
                IF((($invoice_value_select > $payment_value_select) AND ($invoice_value_select - $payment_value_select) <0.05), $payment_value_select, $invoice_value_select) AS invoice_value,
                (SELECT GROUP_CONCAT($supplier_groups_table.title) FROM $supplier_groups_table WHERE FIND_IN_SET($supplier_groups_table.id, $suppliers_table.group_ids)) AS supplier_groups, $lead_status_table.title AS lead_status_title,  $lead_status_table.color AS lead_status_color,
                owner_details.owner_name, owner_details.owner_avatar
        FROM $suppliers_table 
        LEFT JOIN category ON category.id = $suppliers_table.category_id AND category.deleted=0 
        LEFT JOIN city ON city.id = $suppliers_table.city_id AND city.deleted=0 
        LEFT JOIN area ON area.id = $suppliers_table.area_id AND area.deleted=0  




        LEFT JOIN $users_table ON $users_table.client_id = $suppliers_table.id AND $users_table.deleted=0 AND $users_table.is_primary_contact=1 
        LEFT JOIN (SELECT client_id, COUNT(id) AS total_projects FROM $projects_table WHERE deleted=0 GROUP BY client_id) AS project_table ON project_table.client_id= $suppliers_table.id
        LEFT JOIN (SELECT client_id, SUM(payments_table.payment_received) as payment_received, $invoice_value_calculation_query as invoice_value FROM $invoices_table
                   LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table ON tax_table.id = $invoices_table.tax_id
                   LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table2 ON tax_table2.id = $invoices_table.tax_id2 
                   LEFT JOIN (SELECT invoice_id, SUM(amount) AS payment_received FROM $invoice_payments_table WHERE deleted=0 GROUP BY invoice_id) AS payments_table ON payments_table.invoice_id=$invoices_table.id AND $invoices_table.deleted=0 AND $invoices_table.status='not_paid'
                   LEFT JOIN (SELECT invoice_id, SUM(total) AS invoice_value FROM $invoice_items_table WHERE deleted=0 GROUP BY invoice_id) AS items_table ON items_table.invoice_id=$invoices_table.id AND $invoices_table.deleted=0 AND $invoices_table.status='not_paid'
                   WHERE $invoices_table.status='not_paid'
                   GROUP BY $invoices_table.client_id    
                   ) AS invoice_details ON invoice_details.client_id= $suppliers_table.id 
        LEFT JOIN $lead_status_table ON $suppliers_table.lead_status_id = $lead_status_table.id 
        LEFT JOIN (SELECT $users_table.id, CONCAT($users_table.first_name, ' ', $users_table.last_name) AS owner_name, $users_table.image AS owner_avatar FROM $users_table WHERE $users_table.deleted=0 AND $users_table.user_type='staff') AS owner_details ON owner_details.id=$suppliers_table.owner_id
        $join_custom_fieds               
        WHERE $suppliers_table.deleted=0 $where  order by suppliers.id desc";
        
       return $this->db->query($sql);
       //echo $this->db->last_query();
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
        $suppliers_table = $this->db->dbprefix('suppliers');

        $action = " CONCAT($suppliers_table.starred_by,',',':$user_id:') ";
        $where = " AND FIND_IN_SET(':$user_id:',$suppliers_table.starred_by) = 0"; //don't add duplicate

        if ($type != "add") {
            $action = " REPLACE($suppliers_table.starred_by, ',:$user_id:', '') ";
            $where = "";
        }

        $sql = "UPDATE $suppliers_table SET $suppliers_table.starred_by = $action
        WHERE $suppliers_table.id=$project_id $where";
        return $this->db->query($sql);
    }

    function get_starred_suppliers($user_id) {
        $suppliers_table = $this->db->dbprefix('suppliers');

        $sql = "SELECT $suppliers_table.id,  $suppliers_table.company_name
        FROM $suppliers_table
        WHERE $suppliers_table.deleted=0 AND FIND_IN_SET(':$user_id:',$suppliers_table.starred_by)
        ORDER BY $suppliers_table.company_name ASC";
        return $this->db->query($sql);
    }

    function delete_supplier_and_sub_items($supplier_id) {
        $suppliers_table = $this->db->dbprefix('suppliers');
        $general_files_table = $this->db->dbprefix('general_files');
        $users_table = $this->db->dbprefix('users');


        //get supplier files info to delete the files from directory 
        $supplier_files_sql = "SELECT * FROM $general_files_table WHERE $general_files_table.deleted=0 AND $general_files_table.client_id=$supplier_id; ";
        $supplier_files = $this->db->query($supplier_files_sql)->result();

        //delete the supplier and sub items
        //delete supplier
        $delete_supplier_sql = "UPDATE $suppliers_table SET $suppliers_table.deleted=1 WHERE $suppliers_table.id=$supplier_id; ";
        $this->db->query($delete_supplier_sql);

        //delete contacts
        $delete_contacts_sql = "UPDATE $users_table SET $users_table.deleted=1 WHERE $users_table.client_id=$supplier_id; ";
        $this->db->query($delete_contacts_sql);

        //delete the project files from directory
        $file_path = get_general_file_path("client", $supplier_id);
        foreach ($supplier_files as $file) {
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
        $suppliers_table = $this->db->dbprefix('suppliers');
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
            $where .= " AND $suppliers_table.lead_status_id='$status'";
        }

        $owner_id = get_array_value($options, "owner_id");
        if ($owner_id) {
            $where .= " AND $suppliers_table.owner_id='$owner_id'";
        }

        $source = get_array_value($options, "source");
        if ($source) {
            $where .= " AND $suppliers_table.lead_source_id='$source'";
        }

        $users_where = "$users_table.client_id=$suppliers_table.id AND $users_table.deleted=0 AND $users_table.user_type='lead'";
        
        $this->db->query('SET SQL_BIG_SELECTS=1');

        $sql = "SELECT $suppliers_table.id, $suppliers_table.company_name, $suppliers_table.sort, IF($suppliers_table.sort!=0, $suppliers_table.sort, $suppliers_table.id) AS new_sort, $suppliers_table.lead_status_id, $suppliers_table.owner_id,
                (SELECT $users_table.image FROM $users_table WHERE $users_where AND $users_table.is_primary_contact=1) AS primary_contact_avatar,
                (SELECT COUNT($users_table.id) FROM $users_table WHERE $users_where) AS total_contacts_count,
                (SELECT COUNT($events_table.id) FROM $events_table WHERE $events_table.deleted=0 AND $events_table.client_id=$suppliers_table.id) AS total_events_count,
                (SELECT COUNT($notes_table.id) FROM $notes_table WHERE $notes_table.deleted=0 AND $notes_table.client_id=$suppliers_table.id) AS total_notes_count,
                (SELECT COUNT($estimates_table.id) FROM $estimates_table WHERE $estimates_table.deleted=0 AND $estimates_table.client_id=$suppliers_table.id) AS total_estimates_count,
                (SELECT COUNT($general_files_table.id) FROM $general_files_table WHERE $general_files_table.deleted=0 AND $general_files_table.client_id=$suppliers_table.id) AS total_files_count,
                (SELECT COUNT($estimate_requests_table.id) FROM $estimate_requests_table WHERE $estimate_requests_table.deleted=0 AND $estimate_requests_table.client_id=$suppliers_table.id) AS total_estimate_requests_count,
                $lead_source_table.title AS lead_source_title,
                CONCAT($users_table.first_name, ' ', $users_table.last_name) AS owner_name
        FROM $suppliers_table 
        LEFT JOIN $lead_source_table ON $suppliers_table.lead_source_id = $lead_source_table.id 
        LEFT JOIN $users_table ON $users_table.id = $suppliers_table.owner_id AND $users_table.deleted=0 AND $users_table.user_type='staff' 
        WHERE $suppliers_table.deleted=0 AND $suppliers_table.is_lead=1 $where 
        ORDER BY new_sort ASC";

        return $this->db->query($sql);
    }

}
