<?php
class Api_Settings extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "api_settings_v";
        $this->load->model("api_settings_model");
	}
    public function index(){
        $viewData = new stdClass();
        $item = $this->api_settings_model->get(array("id" => 1));
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="update";
        $viewData->item=$item;       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function update(){
        $insert = $this->api_settings_model->update(
            array(
                "id" => 1
            ),
            array(
                "whatsapp" => $this->input->post("whatsapp"),
                "google_analytics" => $this->input->post("google_analytics"),
                "dogrulama_kodu" => $this->input->post("dogrulama_kodu"),
                "google_maps" => $this->input->post("google_maps"),
                "canli_destek" => $this->input->post("canli_destek"),
                "rcaptha" => $this->input->post("rcaptha")
            )
            );

        if ($insert){
            redirect(base_url("api_settings"));
        }
        else{
            echo "Kayit eklenemedi";
        }
    }

}
