<?php
class Homepage_Module_Settings extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "homepage_module_settings_v";
	}
    public function index(){
        $viewData = new stdClass();
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="update";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }



}
