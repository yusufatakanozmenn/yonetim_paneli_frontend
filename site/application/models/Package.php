<?php
class Package extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "package_v";
        $this->load->model("package_model");
        $this->load->helper("tools_helper");
       
	}
    public function index(){
        $viewData = new stdClass();
        /** Tablodaki tüm kayıtları getiriyoruz.. */ 
        $items = $this->package_model->get_all();      
        /** View'e gönderilecek değişkenler.. */
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="list";     
        $viewData->items=$items;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function new_form(){
        $viewData = new stdClass();
        /** View'e gönderilecek değişkenler.. */
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="add";     
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update_form($id){
        $viewData = new stdClass();
        /** View'e gönderilecek değişkenler.. */
        $item = $this->package_model->get(array("id"=>$id));
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="update";   
        $viewData->item =$item  ;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function add_new(){
        $insert = $this->package_model->add(
            array(
                "sira" => $this->input->post("sira"),
                "adi" => $this->input->post("adi"),
                "seo" => convertToSEO($this->input->post("adi")),
                "fiyat" => $this->input->post("fiyat"),
                "pbirim" => $this->input->post("pbirim"),
                "periyod" => $this->input->post("periyod"),
                "link" => $this->input->post("link"),
                "ozellikler" => $this->input->post("ozellikler"),
                "tarih" => date("Y-m-d H:i:s"),
                "durum" => 1
            )
        );
        if($insert){
            redirect(base_url("package"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
    public function update($id){
        $insert = $this->package_model->update(
            array("id"=>$id),
            array(
                "sira" => $this->input->post("sira"),
                "adi" => $this->input->post("adi"),
                "seo" => convertToSEO($this->input->post("adi")),
                "fiyat" => $this->input->post("fiyat"),
                "pbirim" => $this->input->post("pbirim"),
                "periyod" => $this->input->post("periyod"),
                "link" => $this->input->post("link"),
                "ozellikler" => $this->input->post("ozellikler"),
                "tarih" => date("Y-m-d H:i:s"),
            )
        );
        if($insert){
            redirect(base_url("package"));
        }
        else{
            echo "Guncelleme yapilamadi!";
        }
    }
    public function delete($id){
        $delete = $this->package_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("package"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
    public function update_status($id){

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->package_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "durum" => $isActive            
                )
                );
        }else{
            echo 'Hatali islem';
        }
    }

   


}