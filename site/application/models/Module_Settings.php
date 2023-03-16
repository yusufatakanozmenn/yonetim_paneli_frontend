<?php
class Module_Settings extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "module_settings_v";
        $this->load->model("module_settings_model");
	}
    public function index(){
        $viewData = new stdClass();
        $item = $this->module_settings_model->get(array("id"=>1));
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function update_status($id){
        if($id){
            $which_module = $this->input->post("which_module");
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->module_settings_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "$which_module" => $isActive            
                )
                );
        }else{
            echo 'Hatali islem';
        }
    }

}
