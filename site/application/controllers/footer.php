<?php
class Footer extends CI_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->viewFolder = "includes";
        $this->load->model("general_settings_model");
        $viewData = new stdClass();        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->footer = $this->general_settings_model->get(
            array(
                "id" => 1
            )
        );
        $this->load->view("{$viewData->viewFolder}/footer", $viewData);
    }
 
}
