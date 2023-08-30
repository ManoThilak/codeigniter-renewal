<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Salesmancom extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->init_permission_checker("client");

       // $this->access_only_allowed_members();
    }

    //load the expenses list view
    function index() {
        //$this->check_module_availability("module_expense");

        $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("client", $this->login_user->is_admin, $this->login_user->user_type);
         $view_data['religion_dropdown'] = $this->_get_religion_dropdown();
         $view_data['subreligion_dropdown'] = $this->_get_subreligion_dropdown();

        // $view_data['categories_dropdown'] = $this->_get_categories_dropdown();
        // $view_data['members_dropdown'] = $this->_get_team_members_dropdown();
        // $view_data['projects_dropdown'] = $this->_get_projects_dropdown();
       
        // $view_data['godowns_dropdown'] = $this->_get_godowns_dropdown();
        //  $view_data['items_dropdown'] = $this->_get_items_dropdown();
        // $view_data['suppliers_dropdown'] = $this->_get_suppliers_dropdown();
         $view_data['salesmanager_dropdown'] = $this->_get_salesmanager_dropdown();

        $this->template->rander("stock/salesmancom/index", $view_data);
    }
     //get categories dropdown
    private function _get_religion_dropdown() {
        $categories = $this->Religion_model->get_all_where(array("deleted" => 0), 0, 0, "title")->result();

        $categories_dropdown = array(array("id" => "", "text" => "- " . lang("religion") . " -"));
        foreach ($categories as $category) {
            $categories_dropdown[] = array("id" => $category->id, "text" => $category->title);
        }

        return json_encode($categories_dropdown);
    }
    private function _get_subreligion_dropdown() {
        $categories = $this->Sub_religion_model->get_all_where(array("deleted" => 0), 0, 0, "title")->result();

        $categories_dropdown = array(array("id" => "", "text" => "- " . lang("sub_religion") . " -"));
        foreach ($categories as $category) {
            $categories_dropdown[] = array("id" => $category->id, "text" => $category->title);
        }

        return json_encode($categories_dropdown);
    }

    private function _get_salesmanager_dropdown() {
        $categories = $this->Salesmanager_model->get_all_where(array("deleted" => 0), 0, 0, "company_name")->result();

        $categories_dropdown = array(array("id" => "", "text" => "- " . lang("salesmanager") . " -"));
        foreach ($categories as $category) {
            $categories_dropdown[] = array("id" => $category->id, "text" => $category->company_name);
        }

        return json_encode($categories_dropdown);
    }

    // //get categories dropdown
    // private function _get_categories_dropdown() {
    //     $categories = $this->Expense_categories_model->get_all_where(array("deleted" => 0), 0, 0, "title")->result();

    //     $categories_dropdown = array(array("id" => "", "text" => "- " . lang("category") . " -"));
    //     foreach ($categories as $category) {
    //         $categories_dropdown[] = array("id" => $category->id, "text" => $category->title);
    //     }

    //     return json_encode($categories_dropdown);
    // }

    // //get team members dropdown
    // private function _get_team_members_dropdown() {
    //     $team_members = $this->Users_model->get_all_where(array("deleted" => 0, "user_type" => "staff"), 0, 0, "first_name")->result();

    //     $members_dropdown = array(array("id" => "", "text" => "- " . lang("member") . " -"));
    //     foreach ($team_members as $team_member) {
    //         $members_dropdown[] = array("id" => $team_member->id, "text" => $team_member->first_name . " " . $team_member->last_name);
    //     }

    //     return json_encode($members_dropdown);
    // }

    // //get projects dropdown
    // private function _get_projects_dropdown() {
    //     $projects = $this->Projects_model->get_all_where(array("deleted" => 0), 0, 0, "title")->result();

    //     $projects_dropdown = array(array("id" => "", "text" => "- " . lang("project") . " -"));
    //     foreach ($projects as $project) {
    //         $projects_dropdown[] = array("id" => $project->id, "text" => $project->title);
    //     }

    //     return json_encode($projects_dropdown);
    // }


    //get categories dropdown
    // private function _get_godowns_dropdown() {
    //     $godowns = $this->Godown_master_model->get_all_where(array("deleted" => 0), 0, 0, "title")->result();

    //     $godowns_dropdown = array(array("id" => "", "text" => "- " . lang("godown") . " -"));
    //     foreach ($godowns as $godown) {
    //         $godowns_dropdown[] = array("id" => $godown->id, "text" => $godown->title);
    //     }

    //     return json_encode($godowns_dropdown);
    // }

    // //get team members dropdown
    // private function _get_items_dropdown() {
    //     $items = $this->Items_model->get_all_where(array("deleted" => 0), 0, 0, "title")->result();

    //     $items_dropdown = array(array("id" => "", "text" => "- " . lang("item") . " -"));
    //     foreach ($items as $item) {
    //         $items_dropdown[] = array("id" => $item->id, "text" => $item->title);
    //     }

    //     return json_encode($items_dropdown);
    // }

    // //get projects dropdown
    // private function _get_suppliers_dropdown() {
    //     $suppliers = $this->Suppliers_model->get_all_where(array("deleted" => 0), 0, 0, "company_name")->result();

    //     $suppliers_dropdown = array(array("id" => "", "text" => "- " . lang("supplier") . " -"));
    //     foreach ($suppliers as $supplier) {
    //         $suppliers_dropdown[] = array("id" => $supplier->id, "text" => $supplier->company_name);
    //     }

    //     return json_encode($suppliers_dropdown);
    // }

    //load the expenses list yearly view
    function yearly() {
        $this->load->view("stock/salesmancom/yearly_expenses");
    }

    //load custom expenses list
    function custom() {
        $this->load->view("stock/salesmancom/custom_expenses");
    }

    //load the add/edit expense form
    function modal_form() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
         $religion_id = $this->input->post('religion_id');
        $sub_religion_id = $this->input->post('sub_religion_id');
        $gift_id = $this->input->post('gift_id');


       // $supplier_id = $this->input->post('supplier_id');
       // $invoice_id = $this->input->post('invoice_id');

        $model_info = $this->Stockin_model->get_one($this->input->post('id'));
        //$view_data['items_dropdown'] = array("" => "-") + $this->Items_model->get_dropdown_list(array("title"));

        // $team_members = $this->Users_model->get_all_where(array("deleted" => 0, "user_type" => "staff"))->result();
        // $members_dropdown = array();

        // foreach ($team_members as $team_member) {
        //     $members_dropdown[$team_member->id] = $team_member->first_name . " " . $team_member->last_name;
        // }

        // $view_data['members_dropdown'] = array("0" => "-") + $members_dropdown;
        //$view_data['godowns_dropdown'] = array("0" => "-") + $this->Godown_master_model->get_dropdown_list(array("title"));
        // $view_data['taxes_dropdown'] = array("" => "-") + $this->Taxes_model->get_dropdown_list(array("title"));
        //  $view_data['payment_methods_dropdown'] = $this->Payment_methods_model->get_dropdown_list(array("title"), "id", array("online_payable" => 0, "deleted" => 0));

        // $model_info->godown_id = $model_info->godown_id ? $model_info->godown_id : $this->input->post('godown_id');
        // $model_info->item_id = $model_info->item_id ? $model_info->item_id : $this->input->post('item_id');
        // $model_info->supplier_id = $model_info->supplier_id ? $model_info->supplier_id : $this->input->post('supplier_id');


        // if ($invoice_id) {
        //     $client_id = $this->Pinvoices_model->get_one($invoice_id)->client_id;
         //  $model_info->supplier_id = $supplier_id;
        // }


        // $invoice_client_id = $client_id;
        // if ($model_info->client_id) {
        //     $invoice_client_id = $model_info->client_id;
        // }

         // $view_data['clients_dropdown'] = array("" => "-") + $this->Suppliers_model->get_dropdown_list(array("company_name"), "id", array("is_lead" => 0));
        // $invoices = $this->Pinvoices_model->get_dropdown_list(array("id"), "id", array("client_id" => $invoice_client_id));
        // $suggestion = array(array("id" => "", "text" => "-"));
        // foreach ($invoices as $key => $value) {
        //     $suggestion[] = array("id" => $key, "text" =>  get_invoice_id($value));
        // }
        // $view_data['invoices_suggestion'] = $suggestion;

        //$view_data['supplier_id'] = $supplier_id;
        //$view_data['invoice_id'] = $invoice_id;
         $view_data['religion_dropdown'] = array("" => "-") + $this->Religion_model->get_dropdown_list(array("title"), "id", array("deleted" => 0));

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



        if ($model_info->sub_religion_id) {
            $gift_client_id = $model_info->sub_religion_id;
        }
       


        $gifts = $this->Gift_master_model->get_dropdown_list(array("title"), "id", array("sub_religion_id" => $gift_client_id));
         $suggestion = array(array("id" => "", "text" => "-"));
        foreach ($gifts as $key => $value) {
            $suggestion[] = array("id" => $key, "text" => $value);
        }
         $view_data['gifts_suggestion'] = $suggestion;

        $view_data['gift_id'] = $gift_id;

        $view_data['model_info'] = $model_info;

        $view_data["custom_fields"] = $this->Custom_fields_model->get_combined_details("client", $view_data['model_info']->id, $this->login_user->is_admin, $this->login_user->user_type)->result();
        $this->load->view('stock/salesmancom/modal_form', $view_data);
    }

    function get_invoice_suggestion($client_id = 0) {
        // $this->access_only_allowed_members();

        // $invoices = $this->Pinvoices_model->get_dropdown_list(array("id"), "id", array("client_id" => $client_id));
        // $suggestion = array(array("id" => "", "text" => "-"));
        // foreach ($invoices as $key => $value) {
        //     $suggestion[] = array("id" => $key, "text" => get_invoice_id($value));
        // }
        // echo json_encode($suggestion);



         // $invoices = $this->Pinvoices_model->get_invoices_dropdown_list()->result();
         //    $invoices_dropdown = array();

         //    foreach ($invoices as $invoice) {
         //        $invoices_dropdown[$invoice->id] = get_invoice_id($invoice->id);
         //    }

         //    // $view_data['invoices_dropdown'] = array("" => "-") + $invoices_dropdown;
         //    //$view_data['invoices_dropdown'] = array("" => "-") + $invoices_dropdown;
         //    echo json_encode($invoices_dropdown);
    }

    //save an expense
    function save() {
        validate_submitted_data(array(
            "id" => "numeric",
            "expense_date" => "required",
            //"expense_client_id" => "required|numeric",
            //"invoice_payment_method_id" => "required|numeric",
            //"item_id" => "required",
            //"amount" => "required"
        ));

        $id = $this->input->post('id');
        // $supplier_id = $this->input->post('supplier_id');
       $quantity = unformat_currency($this->input->post('item_quantity'));
       
        $data = array(
            "bill_date" => $this->input->post('expense_date'),
             
           "quantity" => $quantity,
           "unit_type" => $this->input->post('unit_type'),
            "religion_id" => $this->input->post('religion_id'),
           "sub_religion_id" => $this->input->post('sub_religion_id'),
            "gift_id" => $this->input->post('gift_id'),
           
        );
        if ($id) {
            //saving existing note. check permission
            // $godown_info = $this->Godown_master_model->get_one($id);

            // $this->validate_access_to_note($godown_info, true);
        } else {
            $data['created_at'] = get_current_utc_time();
        }

        //is editing? update the files if required
        


        $save_id = $this->Stockin_model->save($data, $id);
        if ($save_id) {
          //  save_custom_fields("expenses", $save_id, $this->login_user->is_admin, $this->login_user->user_type);

            echo json_encode(array("success" => true, "data" => $this->_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //delete/undo an expense
    function delete() {
        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        $expense_info = $this->Stockin_model->get_one($id);


        if ($this->Stockin_model->delete($id)) {
            //delete the files
            $file_path = get_setting("timeline_file_path");
            if ($expense_info->files) {
                $files = unserialize($expense_info->files);

                foreach ($files as $file) {
                    delete_app_files($file_path, array($file));
                }
            }

            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
    }

    //get the expnese list data
    function list_report_data() {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $item_id = $this->input->post('item_id');
        $godown_id = $this->input->get('godown_id');
        $user_id = $this->input->post('user_id');
     
      log_message('error', $godown_id);
        $options = array("start_date" => $start_date, "end_date" => $end_date, "item_id" => $item_id, "godown_id" => $godown_id, "user_id" => $user_id, "custom_fields" => $custom_fields);
        $list_data = $this->Stockin_model->get_report_details($options)->result();
        // print_r($list_data);
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_report_row($data);
        }
        echo json_encode(array("data" => $result));
    }
    
    private function _make_report_row($data) {

      
        if($data->dr!=""){
        $type="Expense";
        $description=$data->description;
        $amount=$data->dr;
        $amount2=0.00;
        }
        else{
        $type="Income";
        $description="From Invoice";
        $amount=0.00;
        $amount2=$data->cr;
        }
        
        $row_data = array(
            $data->date,
            format_to_date($data->date, false),
            $type,
            $description,
            to_currency($amount),
            to_currency($amount2),
           
        );

       

        return $row_data;
    }
    
    
    
     function list_data2() {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $category_id = $this->input->post('category_id');
        $project_id = $this->input->get('project_id');
        $user_id = $this->input->post('user_id');
        $custom_fields = $this->Custom_fields_model->get_available_fields_for_table("client", $this->login_user->is_admin, $this->login_user->user_type);
        $options = array("start_date" => $start_date, "end_date" => $end_date, "category_id" => $category_id, "project_id" => $project_id, "user_id" => $user_id, "custom_fields" => $custom_fields);
        $list_data = $this->Stockin_model->get_details($options)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data, $custom_fields);
        }
        echo json_encode(array("data" => $result));
    }
    
    function list_data() {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');


        if ($this->login_user->salesmanager_id === "0") {
            $salesmanager_id = $this->input->post('salesmanager_id');
        } else {
            $salesmanager_id = $this->login_user->salesmanager_id;
        }

        //$salesmanager_id = $this->input->post('salesmanager_id');


       // $sub_religion_id = $this->input->post('sub_religion_id');
        //$supplier_id = $this->input->post('supplier_id');
        $custom_fields = $this->Custom_fields_model->get_available_fields_for_table("client", $this->login_user->is_admin, $this->login_user->user_type);
        //$options = array("start_date" => $start_date, "end_date" => $end_date, "religion_id" => $religion_id, "sub_religion_id" => $sub_religion_id, "custom_fields" => $custom_fields);


        $this->Stockin_model->get_salesmanqty($start_date, $end_date, $salesmanager_id);

        //$this->Stockin_model->get_courierqty($start_date, $end_date);


        $list_data = $this->Stockin_model->searchcom($start_date, $end_date, $salesmanager_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data, $custom_fields);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of expnese list
    private function _row_data($id) {
        $custom_fields = $this->Custom_fields_model->get_available_fields_for_table("client", $this->login_user->is_admin, $this->login_user->user_type);
        $options = array("id" => $id, "custom_fields" => $custom_fields);
        $data = $this->Stockin_model->get_details($options)->row();
        return $this->_make_row($data, $custom_fields);
    }

    //prepare a row of expnese list
    private function _make_row($data, $custom_fields) {

        // $description = $data->description;
        // if ($data->project_title) {
        //     if ($description) {
        //         $description .= "<br /> ";
        //     }
        //     $description .= lang("project") . ": " . $data->project_title;
        // }

        // if ($data->linked_user_name) {
        //     if ($description) {
        //         $description .= "<br /> ";
        //     }
        //     $description .= lang("team_member") . ": " . $data->linked_user_name;
        // }

        // if ($data->company_name) {
        //     if ($description) {
        //         $description .= "<br /> ";
        //     }
        //     $description .= lang("supplier") . ": " . $data->company_name;
        // }

        // if ($data->invoice_id) {
        //     if ($description) {
        //         $description .= "<br /> ";
        //     }
        //     $description .= lang("invoice") . ": " . get_invoice_id($data->invoice_id);
        // }



        // $files_link = "";
        // if ($data->files) {
        //     $files = unserialize($data->files);
        //     if (count($files)) {
        //         foreach ($files as $key => $value) {
        //             $file_name = get_array_value($value, "file_name");
        //             $link = " fa fa-" . get_file_icon(strtolower(pathinfo($file_name, PATHINFO_EXTENSION)));
        //             $files_link .= js_anchor(" ", array('title' => "", "data-toggle" => "app-modal", "data-sidebar" => "0", "class" => "pull-left font-22 mr10 $link", "title" => remove_file_prefix($file_name), "data-url" => get_uri("expenses/file_preview/" . $data->id . "/" . $key)));
        //         }
        //     }
        // }

        // $tax = 0;
        // $tax2 = 0;
        // if ($data->tax_percentage) {
        //     $tax = $data->amount * ($data->tax_percentage / 100);
        // }
        // if ($data->tax_percentage2) {
        //     $tax2 = $data->amount * ($data->tax_percentage2 / 100);
        // }
        //$type = $data->unit_type ? $data->unit_type : "";
        $total =  $data->count * $data->comm_amt;
        $row_data = array(
            // $data->bill_date,
            // format_to_date($data->bill_date, false),
            $data->id,
           $data->company_name,
           $data->count,
            $data->comm_amt,
            //$data->stock,
            //$data->courier,
            $total,
            //to_decimal_format($data->quantity) . " " . $type,
            //$data->supplier
            // to_currency($data->amount),
            // to_currency($tax),
            // to_currency($tax2),
            // to_currency($data->amount + $tax + $tax2)
        );

        foreach ($custom_fields as $field) {
            $cf_id = "cfv_" . $field->id;
            $row_data[] = $this->load->view("custom_fields/output_" . $field->field_type, array("value" => $data->$cf_id), true);
        }

        //Mano--Sir guide to hide an edit,delete option for UsersLogIn--04.02.2022
        
        // $row_data[] = modal_anchor(get_uri("expenses/modal_form"), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_expense'), "data-post-id" => $data->id))
        //         . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_expense'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("expenses/delete"), "data-action" => "delete-confirmation"));

        //return $row_data;

        // $edelete_link = "";
        // if ($this->login_user->is_admin ) {
        //         $row_data[] = modal_anchor(get_uri("stockrep/modal_form"), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_stock'), "data-post-id" => $data->id))
        //         . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_stock'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("stockrep/delete"), "data-action" => "delete-confirmation"));
        //     }

        $row_data[] = $edelete_link;

        return $row_data;
        //Mano
    }

    function file_preview($id = "", $key = "") {
        if ($id) {
            $expense_info = $this->Stockin_model->get_one($id);
            $files = unserialize($expense_info->files);
            $file = get_array_value($files, $key);

            $file_name = get_array_value($file, "file_name");
            $file_id = get_array_value($file, "file_id");
            $service_type = get_array_value($file, "service_type");

            $view_data["file_url"] = get_source_url_of_file($file, get_setting("timeline_file_path"));
            $view_data["is_image_file"] = is_image_file($file_name);
            $view_data["is_google_preview_available"] = is_google_preview_available($file_name);
            $view_data["is_viewable_video_file"] = is_viewable_video_file($file_name);
            $view_data["is_google_drive_file"] = ($file_id && $service_type == "google") ? true : false;

            $this->load->view("stock/salesmancom/file_preview", $view_data);
        } else {
            show_404();
        }
    }

    /* upload a file */

    function upload_file() {
        upload_file_to_temp();
    }

    /* check valid file for ticket */

    function validate_expense_file() {
        return validate_post_file($this->input->post("file_name"));
    }

    //load the expenses yearly chart view
    function yearly_chart() {
        $this->load->view("stock/salesmancom/yearly_chart");
    }

    function yearly_chart_data() {

        $months = array("january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december");
        $result = array();

        $year = $this->input->post("year");
        if ($year) {
            $expenses = $this->Stockin_model->get_yearly_expenses_chart($year);
            $values = array();
            foreach ($expenses as $value) {
                $values[$value->month - 1] = $value->total; //in array the month january(1) = index(0)
            }

            foreach ($months as $key => $month) {
                $value = get_array_value($values, $key);
                $result[] = array(lang("short_" . $month), $value ? $value : 0);
            }

            echo json_encode(array("data" => $result));
        }
    }

    // function income_vs_expenses() {
    //     $this->template->rander("stock/stockin/income_vs_expenses_chart");
    // }

    // function income_vs_expenses_chart_data() {

    //     $year = $this->input->post("year");

    //     if ($year) {
    //         $expenses_data = $this->Expenses_model->get_yearly_expenses_chart($year);
    //         $payments_data = $this->Invoice_payments_model->get_yearly_payments_chart($year);

    //         $payments = array();
    //         $payments_array = array();

    //         $expenses = array();
    //         $expenses_array = array();

    //         for ($i = 1; $i <= 12; $i++) {
    //             $payments[$i] = 0;
    //             $expenses[$i] = 0;
    //         }

    //         foreach ($payments_data as $payment) {
    //             $payments[$payment->month] = $payment->total;
    //         }
    //         foreach ($expenses_data as $expense) {
    //             $expenses[$expense->month] = $expense->total;
    //         }

    //         foreach ($payments as $key => $payment) {
    //             $payments_array[] = array($key, $payment);
    //         }

    //         foreach ($expenses as $key => $expense) {
    //             $expenses_array[] = array($key, $expense);
    //         }

    //         echo json_encode(array("income" => $payments_array, "expenses" => $expenses_array));
    //     }
    // }

    // function income_vs_expenses_summary() {
    //     $this->load->view("expenses/income_vs_expenses_summary");
    // }

    // function income_vs_expenses_summary_list_data() {

    //     $year = explode("-", $this->input->post("start_date"));

    //     if ($year) {
    //         $expenses_data = $this->Expenses_model->get_yearly_expenses_chart($year[0]);
    //         $payments_data = $this->Invoice_payments_model->get_yearly_payments_chart($year[0]);

    //         $payments = array();
    //         $expenses = array();

    //         for ($i = 1; $i <= 12; $i++) {
    //             $payments[$i] = 0;
    //             $expenses[$i] = 0;
    //         }

    //         foreach ($payments_data as $payment) {
    //             $payments[$payment->month] = $payment->total;
    //         }
    //         foreach ($expenses_data as $expense) {
    //             $expenses[$expense->month] = $expense->total;
    //         }

    //         //get the list of summary
    //         $result = array();
    //         for ($i = 1; $i <= 12; $i++) {
    //             $result[] = $this->_row_data_of_summary($i, $payments[$i], $expenses[$i]);
    //         }

    //         echo json_encode(array("data" => $result));
    //     }
    // }

    //get the row of summary
    private function _row_data_of_summary($month_index, $payments, $expenses) {
        //get the month name
        $month_array = array(" ", "january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december");

        $month = get_array_value($month_array, $month_index);

        $month_name = lang($month);
        $profit = $payments - $expenses;

        return array(
            $month_index,
            $month_name,
            to_currency($payments),
            to_currency($expenses),
            to_currency($profit)
        );
    }

}

/* End of file expenses.php */
/* Location: ./application/controllers/expenses.php */