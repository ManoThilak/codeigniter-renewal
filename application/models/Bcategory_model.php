<?php

class Bcategory_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'bcategory';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $items_table = $this->db->dbprefix('bcategory');
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND $items_table.id=$id";
        }

        $sql = "SELECT $items_table.*
        FROM $items_table
        WHERE $items_table.deleted=0 $where ORDER BY $items_table.title asc";
        return $this->db->query($sql);
    }

}
