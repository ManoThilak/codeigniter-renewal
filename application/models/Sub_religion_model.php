<?php

class Sub_religion_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'sub_religion';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $client_groups_table = $this->db->dbprefix('sub_religion');
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where = " AND $client_groups_table.id=$id";
        }

        $sql = "SELECT $client_groups_table.*,religion.title as religion
        FROM $client_groups_table
        LEFT JOIN religion ON religion.id= $client_groups_table.religion_id
        WHERE $client_groups_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
