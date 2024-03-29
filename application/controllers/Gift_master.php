<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gift_master extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->access_only_admin();
    }

    //load client groups list view
    function index() {
        $this->template->rander("gift_master/index");
    }

    //load client groups add/edit modal form
    function modal_form() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
       $religion_id = $this->input->post('religion_id');
        $sub_religion_id = $this->input->post('sub_religion_id');
        $view_data['religion_dropdown'] = array("" => "-") + $this->Religion_model->get_dropdown_list(array("title"), "id", array("deleted" => 0));
        //$view_data['model_info'] = $this->Gift_master_model->get_one($this->input->post('id'));
        $model_info = $this->Gift_master_model->get_one($this->input->post('id'));

        if ($sub_religion_id) {
            $religion_id = $this->Sub_religion_model->get_one($sub_religion_id)->religion_id;
            $model_info->religion_id = $religion_id;
        }


        $project_client_id = $religion_id;
        
        if ($model_info->religion_id) {
            $project_client_id = $model_info->religion_id;
        }
        $projects = $this->Sub_religion_model->get_dropdown_list(array("title"), "id", array("religion_id" => $project_client_id));
         $suggestion = array(array("id" => "", "text" => "-"));
        foreach ($projects as $key => $value) {
            $suggestion[] = array("id" => $key, "text" => $value);
        }
         $view_data['projects_suggestion'] = $suggestion;

         $view_data['religion_id'] = $religion_id;
        $view_data['sub_religion_id'] = $sub_religion_id;
        $view_data['model_info'] = $model_info;

        $this->load->view('gift_master/modal_form', $view_data);
    }

    //save client groups category
    function save() {

        validate_submitted_data(array(
            "id" => "numeric",
            "title" => "required",
            "sub_religion_id" => "required|numeric",
            "religion_id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        $data = array(
            "title" => $this->input->post('title'),
            "religion_id" => $this->input->post('religion_id'),
            
            "sub_religion_id" => $this->input->post('sub_religion_id') ? $this->input->post('sub_religion_id') : 0,
        );
        $save_id = $this->Gift_master_model->save($data, $id);
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
            if ($this->Gift_master_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Gift_master_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //get data for client groups list
    function list_data() {
        $list_data = $this->Gift_master_model->get_details()->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get an expnese category list row
    private function _row_data($id) {
        $options = array("id" => $id);
        $data = $this->Gift_master_model->get_details($options)->row();
        return $this->_make_row($data);
    }

    //prepare an client groups category list row
    private function _make_row($data) {
        return array($data->religion,$data->sub_religion,$data->title,
            modal_anchor(get_uri("gift_master/modal_form"), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_client_group'), "data-post-id" => $data->id))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_client_group'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("gift_master/delete"), "data-action" => "delete"))
        );
    }

    function get_gift_suggestion($sub_religion_id = 0) {
        //$this->access_only_allowed_members();

        $projects = $this->Gift_master_model->get_dropdown_list(array("title"), "id", array("sub_religion_id" => $sub_religion_id));
        $suggestion = array(array("id" => "", "text" => "-"));
        foreach ($projects as $key => $value) {
            $suggestion[] = array("id" => $key, "text" => $value);
        }
        echo json_encode($suggestion);
    }

}

/* End of file client_groups.php */
/* Location: ./application/controllers/client_groups.php */