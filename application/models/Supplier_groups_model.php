<?php

class Supplier_groups_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'supplier_groups';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $supplier_groups_table = $this->db->dbprefix('supplier_groups');
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where = " AND $supplier_groups_table.id=$id";
        }

        $sql = "SELECT $supplier_groups_table.*
        FROM $supplier_groups_table
        WHERE $supplier_groups_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
