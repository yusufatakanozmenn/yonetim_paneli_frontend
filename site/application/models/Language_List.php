<?php
class Language_List extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "language_v";
        $this->load->model("language_model");
	}
    public function index(){
        $viewData = new stdClass();
        $items = $this->language_model->get_all();
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="list";
        $viewData->items = $items;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function delete($id){
        $delete = $this->language_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("language_list"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }

    public function update_status($id){
        if($id){
            $language_module_switch = $this->input->post("language_module_switch");
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->language_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "$language_module_switch" => $isActive            
                )
                );
        }else{
            echo 'Hatali islem';
        }
    }
    public function save()
    {
        $insert = $this->language_model->add(
            array(
                "adi" => $this->input->post("adi"),
                "bayrak" => $this->input->post("bayrak"),
                "sira" => $this->input->post("sira"),
            )
        );
        if($insert){
            redirect(base_url("language_list"));

        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function update($id)
    {
        $insert = $this->language_model->update(
            array(
                "id" => $id
            ),
            array(
                "adi" => $this->input->post("adi"),
                "bayrak" => $this->input->post("bayrak"),
                "sira" => $this->input->post("sira"),
            )
        );
        if($insert){
            redirect(base_url("language_list"));

        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }

    public function update_language_text($id){
        $BASEPATH = $_SERVER['DOCUMENT_ROOT'] . "/yonetim_paneli/panel/";
        $file = $BASEPATH . "languages/dil_$id.php";
        include($file);
        $key = $this->input->post("text_key");
        $value = $this->input->post("text_value");
        $changed_value = $this->input->post("changed_text_value");
        $searchfor = '$dil["'.$key.'"] = '.'"'.$value.'"';
        $replacefor = '$dil["'.$key.'"] = '.'"'.$changed_value.'"';
        // get the file contents, assuming the file to be readable (and exist)
        $contents = file_get_contents($file);
        $contents = str_replace($searchfor, $replacefor, $contents);
        file_put_contents($file, $contents);
    }
    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->language_model->get(
            array(
                "id"    => $id,
            )
        );
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
    public function add_form(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
}