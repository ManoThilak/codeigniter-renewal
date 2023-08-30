<?php

class Area_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'area';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $godown_master_table = $this->db->dbprefix('area');
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where = " AND $godown_master_table.id=$id";
        }

        $sql = "SELECT $godown_master_table.*,city.title as city
        FROM $godown_master_table
        left join city on city.id = area.city_id
        WHERE $godown_master_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
