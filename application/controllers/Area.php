<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->access_only_admin();
    }

    //load client groups list view
    function index() {
        $this->template->rander("area/index");
    }

    //load client groups add/edit modal form
    function modal_form() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
        $view_data['city_dropdown'] = array("0" => "-") + $this->City_model->get_dropdown_list(array("title"));
        $view_data['model_info'] = $this->Area_model->get_one($this->input->post('id'));
        $this->load->view('area/modal_form', $view_data);
    }

    //save client groups category
    function save() {

        validate_submitted_data(array(
            "id" => "numeric",
            "title" => "required"
        ));

        $id = $this->input->post('id');
        $data = array(
            "city_id" => $this->input->post('city_id'),
            "title" => $this->input->post('title'),

            "description" => $this->input->post('description'),
             //"created_at" => get_current_utc_time()
        );

        if ($id) {
            //saving existing note. check permission
            // $godown_info = $this->Godown_master_model->get_one($id);

            // $this->validate_access_to_note($godown_info, true);
        } else {
            $data['created_at'] = get_current_utc_time();
        }

        $save_id = $this->Area_model->save($data, $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //delete/undo an client groups
    function delete() {
        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Area_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Area_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //get data for client groups list
    function list_data() {
        $list_data = $this->Area_model->get_details()->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get an expnese category list row
    private function _row_data($id) {
        $options = array("id" => $id);
        $data = $this->Area_model->get_details($options)->row();
        return $this->_make_row($data);
    }

    //prepare an client groups category list row
    private function _make_row($data) {
        return array(
            //$data->created_at,
            //format_to_relative_time($data->created_at),
            format_to_date($data->created_at, false),
            $data->title,
            $data->city,
            nl2br($data->description),
            modal_anchor(get_uri("area/modal_form"), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_area'), "data-post-id" => $data->id))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_area'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("area/delete"), "data-action" => "delete"))
        );
    }

}

/* End of file client_groups.php */
/* Location: ./application/controllers/client_groups.php */