<?php
class Managers extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "managers_v";
        $this->load->model("managers_model");

        
    }
    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $items = $this->managers_model->get_all();
        $viewData->subViewFolder = "list";
        $viewData->items = $items;      
        
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function add_form()
    {
        $viewData = new stdClass();        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }    
    public function save(){
        $config["allowed_types"] = "jpg|jpeg|png|svg|webp";
        $config["upload_path"] = "uploads/$this->viewFolder/";

        $this->load->library("upload", $config);

        $upload_logo = $this->upload->do_upload("resim");

        $profile_image = basename($_FILES["resim"]["name"]);
        $kullanici_sifre=$this->input->post("sifre");
        $kullanici_sifre_hash = password_hash($kullanici_sifre, PASSWORD_DEFAULT);
        $insert=$this->managers_model->add(
            array(
                "isim" => $this->input->post("isim"),                
                "email" => $this->input->post("email"),
                "kadi" => $this->input->post("kadi"),
                "sifre" => $kullanici_sifre_hash, 
                "resim" => $profile_image,
                "ktarih" => date("d-m-Y"),
                "tarih"=> date("d-m-Y H:i:s"),
                "durum" => 1,
                "rutbe" => 1,
                         
            )
        );
        if($insert){
            redirect(base_url("managers"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function update_status($id)
    {

        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $insert = $this->managers_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "durum" => $isActive
                )
            );
        } else {
            echo 'Hatali islem';
        }
    }
 
    public function delete($id){
        $delete = $this->managers_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("managers"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
   
    

}
