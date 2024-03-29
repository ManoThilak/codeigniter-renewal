<?php

class Pinvoice_payments_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'pinvoice_payments';
        parent::__construct($this->table);
    }


    function get_total_amt($options = array()) {
        $invoice_payments_table = $this->db->dbprefix('pinvoice_payments');
        $invoices_table = $this->db->dbprefix('pinvoices');
          $project_id = get_array_value($options, "project_id");
        $where .= " AND $invoices_table.project_id=$project_id";
        
        
           $sql = "SELECT SUM($invoice_payments_table.amount) AS payed_amount  FROM $invoice_payments_table
        LEFT JOIN $invoices_table ON $invoices_table.id=$invoice_payments_table.invoice_id
        WHERE $invoice_payments_table.deleted=0 AND $invoices_table.deleted=0 $where";
        return $this->db->query($sql);

}

    function get_total_expenses_amt($options = array()) {
        $expenses = $this->db->dbprefix('expenses');
       
          $project_id = get_array_value($options, "project_id");
        $where .= " AND $expenses.project_id=$project_id";
        
        
           $sql = "SELECT SUM($expenses.amount) AS expenses_amount  FROM $expenses
        
        WHERE $expenses.deleted=0 $where";
        return $this->db->query($sql);

}

    function get_details($options = array()) {
        $invoice_payments_table = $this->db->dbprefix('pinvoice_payments');
        $invoices_table = $this->db->dbprefix('pinvoices');
        $payment_methods_table = $this->db->dbprefix('payment_methods');
        $clients_table = $this->db->dbprefix('salesmanager');

        $where = "";

        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND $invoice_payments_table.id=$id";
        }

        $invoice_id = get_array_value($options, "invoice_id");
        if ($invoice_id) {
            $where .= " AND $invoice_payments_table.invoice_id=$invoice_id";
        }

        $client_id = get_array_value($options, "client_id");
        if ($client_id) {
            $where .= " AND $invoices_table.client_id=$client_id";
        }

        $project_id = get_array_value($options, "project_id");
        if ($project_id) {
            $where .= " AND $invoices_table.project_id=$project_id";
        }

        $payment_method_id = get_array_value($options, "payment_method_id");
        if ($payment_method_id) {
            $where .= " AND $invoice_payments_table.payment_method_id=$payment_method_id";
        }

        $start_date = get_array_value($options, "start_date");
        $end_date = get_array_value($options, "end_date");
        if ($start_date && $end_date) {
            $where .= " AND ($invoice_payments_table.payment_date BETWEEN '$start_date' AND '$end_date') ";
        }

        $currency = get_array_value($options, "currency");
        if ($currency) {
            $where .= $this->_get_clients_of_currency_query($currency, $invoices_table, $clients_table);
        }

        $sql = "SELECT $invoice_payments_table.*, $invoices_table.client_id, (SELECT $clients_table.currency_symbol FROM $clients_table WHERE $clients_table.id=$invoices_table.client_id limit 1) AS currency_symbol, $payment_methods_table.title AS payment_method_title
        FROM $invoice_payments_table
        LEFT JOIN $invoices_table ON $invoices_table.id=$invoice_payments_table.invoice_id
        LEFT JOIN $payment_methods_table ON $payment_methods_table.id = $invoice_payments_table.payment_method_id
        WHERE $invoice_payments_table.deleted=0 AND $invoices_table.deleted=0 $where";
        return $this->db->query($sql);
    }

    function get_yearly_payments_chart($year, $currency = "") {
        $payments_table = $this->db->dbprefix('pinvoice_payments');
        $invoices_table = $this->db->dbprefix('pinvoices');
        $clients_table = $this->db->dbprefix('salesmanager');

        $where = "";
        if ($currency) {
            $where = $this->_get_clients_of_currency_query($currency, $invoices_table, $clients_table);
        }

        $payments = "SELECT SUM($payments_table.amount) AS total, MONTH($payments_table.payment_date) AS month
            FROM $payments_table
            LEFT JOIN $invoices_table ON $invoices_table.id=$payments_table.invoice_id
            WHERE $payments_table.deleted=0 AND YEAR($payments_table.payment_date)= $year AND $invoices_table.deleted=0 $where
            GROUP BY MONTH($payments_table.payment_date)";
        return $this->db->query($payments)->result();
    }

}
