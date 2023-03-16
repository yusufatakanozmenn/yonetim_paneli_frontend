<?php
class Document extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "document_v";
        $this->load->model("document_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();        
        $items = $this->document_model->get_all();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
   
    public function save(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("adi", "Adı", "required|trim");
        $this->form_validation->set_rules("sira", "Sıra", "required|trim"); 
        $this->form_validation->set_rules("durum", "Durum", "required|trim");
        $this->form_validation->set_rules("seo", "seo", "required|trim");     
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır."
            )
        );
        $validate = $this->form_validation->run();
        $config["allowed_types"] = "jpg|jpeg|png|svg|webp";
        $config["upload_path"] = "uploads/$this->viewFolder/";
        $this->load->library("upload", $config);
        $upload_logo = $this->upload->do_upload("resim");
        $document_img_name = basename($_FILES["resim"]["name"]);       
        $insert = $this->document_model->add(
            array(
                "adi" => $this->input->post("adi"),
                "sira" => $this->input->post("sira"),                  
                "durum"=>"1" , 
                "seo" => $this->input->post("seo"),
                "tarih" => date("Y-m-d H:i:s"),   
                "resim" => $document_img_name,             
            )
        );
        if($insert){
            redirect(base_url("document"));
        }
        else{
            echo "Kayit eklenemedi";
        }
        
    }
    public function update_form($id){
        $viewData = new stdClass();
        $item = $this->document_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("adi", "Adı", "required|trim");
        $this->form_validation->set_rules("sira", "Sıra", "required|trim"); 
        $this->form_validation->set_rules("durum", "Durum", "required|trim");
        $this->form_validation->set_rules("seo", "seo", "required|trim");     
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır."
            )
        );
        $validate = $this->form_validation->run();


        $config["allowed_types"] = "jpg|jpeg|png|svg|webp";
        $config["upload_path"] = "uploads/$this->viewFolder/";

        $this->load->library("upload", $config);

        $upload_logo = $this->upload->do_upload("resim");

        $document_img_name = basename($_FILES["resim"]["name"]);

       
            $update = $this->document_model->update(
                array(
                    "id" => $id
                ),
                array(
                "adi" => $this->input->post("adi"),
                "sira" => $this->input->post("sira"),                  
                "durum"=>"1" , 
                "seo" => $this->input->post("seo"),
                "tarih" => date("Y-m-d H:i:s"),   
                "resim" => $document_img_name,     
                ) 
            );
            if ($update) {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarıyla güncellendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt güncellenemedi",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);  
            redirect(base_url("document"));         
       
    }
    public function update_status($id){

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->document_model->update(
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

    public function delete($id){
        $delete = $this->document_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("document"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
   
}