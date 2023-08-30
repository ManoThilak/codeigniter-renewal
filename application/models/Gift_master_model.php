<?php

class Gift_master_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'gift_master';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $client_groups_table = $this->db->dbprefix('gift_master');
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where = " AND $client_groups_table.id=$id";
        }

        $sql = "SELECT $client_groups_table.*,religion.title as religion,sub_religion.title as sub_religion
        FROM $client_groups_table
        LEFT JOIN religion ON religion.id= $client_groups_table.religion_id
        LEFT JOIN sub_religion ON sub_religion.id= $client_groups_table.sub_religion_id
        WHERE $client_groups_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
