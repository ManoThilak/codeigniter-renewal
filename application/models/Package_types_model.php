<?php

class Package_types_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'package_types';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $package_groups_table = $this->db->dbprefix('package_types');
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where = " AND $package_groups_table.id=$id";
        }

        $sql = "SELECT $package_groups_table.*
        FROM $package_groups_table
        WHERE $package_groups_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
