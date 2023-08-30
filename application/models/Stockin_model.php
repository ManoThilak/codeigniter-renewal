<?php

class Stockin_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'stockin';
        parent::__construct($this->table);
    }
  
    function get_report_details($options = array()) {
        $invoice_payments_table = $this->db->dbprefix('invoice_payments');
        $expenses_table = $this->db->dbprefix('expenses');
         $invoices_table = $this->db->dbprefix('invoices');
        $expense_categories_table = $this->db->dbprefix('expense_categories');
        $projects_table = $this->db->dbprefix('projects');
        $users_table = $this->db->dbprefix('users');
        $taxes_table = $this->db->dbprefix('taxes');


        $where = "";
        
        $start_date = get_array_value($options, "start_date");
        $end_date = get_array_value($options, "end_date");
        if ($start_date && $end_date) {
            $where1 .= " AND ($invoice_payments_table.payment_date BETWEEN '$start_date' AND '$end_date') ";
            $where2 .= " AND ($expenses_table.expense_date BETWEEN '$start_date' AND '$end_date') ";
        }

        

        $project_id = get_array_value($options, "project_id");
        if ($project_id) {
            $where1 .= " AND $invoices_table.project_id=$project_id";
            $where2 .= " AND $expenses_table.project_id=$project_id";
        }

        

        $sql = "SELECT * FROM ( (SELECT NULL AS dr, $invoice_payments_table.`amount` AS cr,   NULL AS description, $invoice_payments_table.payment_date AS date FROM $invoice_payments_table
        LEFT JOIN $invoices_table ON $invoices_table.id=$invoice_payments_table.invoice_id WHERE $invoice_payments_table.deleted=0 $where1)
        UNION ALL 
            (SELECT $expenses_table.`amount` AS dr,  NULL AS cr,  $expense_categories_table.title as description, $expenses_table.expense_date AS date FROM $expenses_table
            LEFT JOIN $expense_categories_table ON $expense_categories_table.id= $expenses_table.category_id WHERE $expenses_table.deleted=0 $where2) ) 
            results  ORDER BY date ASC";


       
        return $this->db->query($sql);
    }



    function get_details($options = array()) {
        // $expenses_table = $this->db->dbprefix('expenses');
         //$expense_categories_table = $this->db->dbprefix('items');
        // $projects_table = $this->db->dbprefix('godown_master');
        // $users_table = $this->db->dbprefix('users');
        // $taxes_table = $this->db->dbprefix('taxes');
        // $suppliers_table = $this->db->dbprefix('suppliers');
        // $payment_methods_table = $this->db->dbprefix('payment_methods');
        $expenses_table = $this->db->dbprefix('stockin');


        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where = " AND $expenses_table.id=$id";
        }
        $start_date = get_array_value($options, "start_date");
        $end_date = get_array_value($options, "end_date");
        if ($start_date && $end_date) {
            $where .= " AND ($expenses_table.bill_date BETWEEN '$start_date' AND '$end_date') ";
        }

        $sub_religion_id = get_array_value($options, "sub_religion_id");
        if ($sub_religion_id) {
            $where .= " AND $expenses_table.sub_religion_id=$sub_religion_id";
        }

        $religion_id = get_array_value($options, "religion_id");
        if ($religion_id) {
            $where .= " AND $expenses_table.religion_id=$religion_id";
        }

        // $supplier_id = get_array_value($options, "supplier_id");
        // if ($supplier_id) {
        //     $where .= " AND $expenses_table.supplier_id=$supplier_id";
        // }


        //   $client_id = get_array_value($options, "client_id");
        // if ($client_id) {
        //     $where .= " AND $suppliers_table.id=$client_id";
        // }

        //   $invoice_id = get_array_value($options, "invoice_id");
        // if ($invoice_id) {
        //     $where .= " AND $expenses_table.invoice_id=$invoice_id";
        // }

        //prepare custom fild binding query
        $custom_fields = get_array_value($options, "custom_fields");
        $custom_field_query_info = $this->prepare_custom_field_query_string("expenses", $custom_fields, $expenses_table);
        $select_custom_fields = get_array_value($custom_field_query_info, "select_string");
        $join_custom_fields = get_array_value($custom_field_query_info, "join_string");

        // $sql = "SELECT * from $expenses_table
        // WHERE $expenses_table.deleted=0 $where";
        //  return $this->db->query($sql);
        //echo $this->db->last_query();

        // $sql = "SELECT $expenses_table.*, $expense_categories_table.title as category_title, 
        //          CONCAT($users_table.first_name, ' ', $users_table.last_name) AS linked_user_name,
        //          $projects_table.title AS project_title,
        //           $suppliers_table.company_name AS company_name,
        //           $payment_methods_table.title AS payment_method_title,
        //          tax_table.percentage AS tax_percentage,
        //          tax_table2.percentage AS tax_percentage2
        //          $select_custom_fields
        // FROM $expenses_table
        // LEFT JOIN $expense_categories_table ON $expense_categories_table.id= $expenses_table.category_id
        // LEFT JOIN $projects_table ON $projects_table.id= $expenses_table.project_id
        // LEFT JOIN $suppliers_table ON $suppliers_table.id= $expenses_table.client_id
        // LEFT JOIN $users_table ON $users_table.id= $expenses_table.user_id
        // LEFT JOIN $payment_methods_table ON $payment_methods_table.id = $expenses_table.payment_method_id
        // LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table ON tax_table.id = $expenses_table.tax_id
        // LEFT JOIN (SELECT $taxes_table.* FROM $taxes_table) AS tax_table2 ON tax_table2.id = $expenses_table.tax_id2
        //     $join_custom_fields
        // WHERE $expenses_table.deleted=0 $where";
        // return $this->db->query($sql);

        $sql = "SELECT $expenses_table.*,religion.title as religion,sub_religion.title as sub_religion,gift_master.title as gift
                 
               
                 $select_custom_fields
        FROM $expenses_table
         LEFT JOIN religion ON religion.id= $expenses_table.religion_id
         LEFT JOIN sub_religion ON sub_religion.id= $expenses_table.sub_religion_id
         LEFT JOIN gift_master ON gift_master.id= $expenses_table.gift_id
       
        
       
        
            $join_custom_fields
        WHERE $expenses_table.deleted=0 $where";
        return $this->db->query($sql);
    }

    function get_income_expenses_info() {
        $expenses_table = $this->db->dbprefix('expenses');
        $invoice_payments_table = $this->db->dbprefix('invoice_payments');
        $taxes_table = $this->db->dbprefix('taxes');
        $info = new stdClass();

        $sql1 = "SELECT SUM($invoice_payments_table.amount) as total_income
        FROM $invoice_payments_table
        WHERE $invoice_payments_table.deleted=0";
        $income = $this->db->query($sql1)->row();

        $sql2 = "SELECT SUM($expenses_table.amount + IFNULL(tax_table.percentage,0)/100*IFNULL($expenses_table.amount,0) + IFNULL(tax_table2.percentage,0)/100*IFNULL($expenses_table.amount,0)) AS total_expenses
        FROM $expenses_table
        LEFT JOIN (SELECT $taxes_table.id, $taxes_table.percentage FROM $taxes_table) AS tax_table ON tax_table.id = $expenses_table.tax_id
        LEFT JOIN (SELECT $taxes_table.id, $taxes_table.percentage FROM $taxes_table) AS tax_table2 ON tax_table2.id = $expenses_table.tax_id2
        WHERE $expenses_table.deleted=0";
        $expenses = $this->db->query($sql2)->row();

        $info->income = $income->total_income;
        $info->expneses = $expenses->total_expenses;
        return $info;
    }

    function get_yearly_expenses_chart($year) {
        $expenses_table = $this->db->dbprefix('expenses');
        $taxes_table = $this->db->dbprefix('taxes');

        $expenses = "SELECT SUM($expenses_table.amount + IFNULL(tax_table.percentage,0)/100*IFNULL($expenses_table.amount,0) + IFNULL(tax_table2.percentage,0)/100*IFNULL($expenses_table.amount,0)) AS total, MONTH($expenses_table.expense_date) AS month
        FROM $expenses_table
        LEFT JOIN (SELECT $taxes_table.id, $taxes_table.percentage FROM $taxes_table) AS tax_table ON tax_table.id = $expenses_table.tax_id
        LEFT JOIN (SELECT $taxes_table.id, $taxes_table.percentage FROM $taxes_table) AS tax_table2 ON tax_table2.id = $expenses_table.tax_id2
        WHERE $expenses_table.deleted=0 AND YEAR($expenses_table.expense_date)= $year
        GROUP BY MONTH($expenses_table.expense_date)";

        return $this->db->query($expenses)->result();
    }


     public function searchqty($start_date = null, $end_date = null)
    {       
            $sql = "select stockqty.stockqty as stock,courierqty.courierqty as courier, religion.title as religion,sub_religion.title as sub_religion,gift_master.title as gift  from stockqty
           
                    left join courierqty on stockqty.gift_id=courierqty.gift_id
                    LEFT JOIN religion ON religion.id= stockqty.religion_id
                    LEFT JOIN sub_religion ON sub_religion.id= stockqty.sub_religion_id
                    LEFT JOIN gift_master ON gift_master.id= stockqty.gift_id

                    group by stockqty.gift_id";  
                  
        // $query = $this->db->query($sql);
        // return $query->result_array();    
         return $this->db->query($sql);       
        
    }

     public function get_stockqty($start_date = null, $end_date = null)
    {
      
             $sql = "drop table stockqty";
             $query = $this->db->query($sql);
      
        //  if (!$this->rbac->hasPrivilege('superadmin')) {
        //      $sql = "create table exp as
        //                 SELECT SUM(expenses.amount) AS total, MONTH(expenses.date) AS month FROM expenses
        //                 where expenses.branch_id=" . $this->db->escape($userdatabranch) . " and 
        //                 expenses.date >= " . $this->db->escape($start_date) . " and 
        //                 expenses.date <= " . $this->db->escape($end_date) . " 
        //                 GROUP BY MONTH(expenses.date)";

        // } else {



        if ($start_date && $end_date) {
            $sql = "create table stockqty as
                        SELECT SUM(stockin.quantity) AS stockqty, stockin.religion_id, stockin.sub_religion_id, stockin.gift_id from stockin
                        where 
                        stockin.bill_date >= " . $this->db->escape($start_date) . " and 
                        stockin.bill_date <= " . $this->db->escape($end_date) . " 
                        GROUP BY stockin.gift_id";
        } else {
            $sql = "create table stockqty as
                        SELECT SUM(stockin.quantity) AS stockqty, stockin.religion_id, stockin.sub_religion_id, stockin.gift_id from stockin
                        
                        GROUP BY stockin.gift_id";
        }
             

        //}    

        $query = $this->db->query($sql);
        //return $query->result_array();
        //echo $this->db->last_query();
        return true;
    }

     public function get_courierqty($start_date = null, $end_date = null)
    {   

        $sql = "drop table courierqty";           
        $query = $this->db->query($sql);


        // if (!$this->rbac->hasPrivilege('superadmin')) {
        //      $sql = "create table inc as
        //                 SELECT SUM(income.amount) AS total, MONTH(income.date) AS month from income
        //                 where income.branch_id=" . $this->db->escape($userdatabranch) . " and 
        //                 income.date >= " . $this->db->escape($start_date) . " and 
        //                 income.date <= " . $this->db->escape($end_date) . " 
        //                 GROUP BY MONTH(income.date)";

        // } else {
             


            if ($start_date && $end_date) {
            $sql = "create table courierqty as
                        SELECT COUNT(couriersentdatas.id) AS courierqty, couriersentdatas.religion_id, couriersentdatas.sub_religion_id, couriersentdatas.gift_id from couriersentdatas 
                        where 
                        couriersentdatas.courier_date >= " . $this->db->escape($start_date) . " and 
                        couriersentdatas.courier_date <= " . $this->db->escape($end_date) . " 
                        GROUP BY couriersentdatas.gift_id";
        } else {
            $sql = "create table courierqty as
                        SELECT COUNT(couriersentdatas.id) AS courierqty, couriersentdatas.religion_id, couriersentdatas.sub_religion_id, couriersentdatas.gift_id from couriersentdatas 
                        
                        GROUP BY couriersentdatas.gift_id";
        }            
       // }    

        $query = $this->db->query($sql);
        return true;      
    }
    
    public function get_salesmanqty($start_date = null, $end_date = null, $salesmanager_id = null)
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
                        couriersentdatas.courier_date >= " . $this->db->escape($start_date) . " and 
                        couriersentdatas.courier_date <= " . $this->db->escape($end_date) . " 
                        
                        GROUP BY salesmanager_id";
       // }
             

        //}    

        $query = $this->db->query($sql);
        //return $query->result_array();
        //echo $this->db->last_query();
        return true;
    }
    public function searchcom($start_date = null, $end_date = null, $salesmanager_id = null)
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
         return $this->db->query($sql);       
               
        
    }

}
