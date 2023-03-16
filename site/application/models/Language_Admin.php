<?php
class Language_Admin extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "language_v";
	}
    public function index(){
        $viewData = new stdClass();
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="admin";

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function update_language_text(){
        $BASEPATH = $_SERVER['DOCUMENT_ROOT'] . "/yonetim_paneli/panel/";
        $file = $BASEPATH . "languages/admin_dil.php";
        include($file);
        $key = $this->input->post("text_key");
        $value = $this->input->post("text_value");
        $changed_value = $this->input->post("changed_text_value");
        $searchfor = '$admindil["'.$key.'"] = '.'"'.$value.'"';
        $replacefor = '$admindil["'.$key.'"] = '.'"'.$changed_value.'"';
        // get the file contents, assuming the file to be readable (and exist)
        $contents = file_get_contents($file);
        $contents = str_replace($searchfor, $replacefor, $contents);
        file_put_contents($file, $contents);
    }

}
