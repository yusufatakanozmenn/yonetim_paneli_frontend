<?php
class Slider extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "slider_v";
        $this->load->model("slider_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();        
        $items = $this->slider_model->get_all();
        $viewData->viewFolder = $this->viewFolder;
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
    public function save()
    {            
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("adi", "adi", "required|trim");
        $this->form_validation->set_rules("sira", " sira", "required|trim");
        $this->form_validation->set_rules("url", " Url", "required|trim");
        $this->form_validation->set_rules("aciklama", " Açıklama", "required|trim");
        $this->form_validation->set_rules("video", " Video", "required|trim");
        $this->form_validation->set_rules("sekme", " Sekme", "required|trim");
        $this->form_validation->set_rules("durum", " Durum", "required|trim");
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
        $slider_img_name = basename($_FILES["resim"]["name"]);

        $insert = $this->slider_model->add(
            array(
                "sira" => $this->input->post("sira"),
                "adi" => $this->input->post("adi"),
                "url" => $this->input->post("url"),
                "sekme"=> $this->input->post("sekme"),                
                "durum" => $this->input->post("durum"),
                "aciklama" => $this->input->post("aciklama"),
                "video" => $this->input->post("video"),    
                "resim" => $slider_img_name,               
            )  
        );
        if($insert){
            redirect(base_url("slider"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }

    public function update_form($id){
        $viewData = new stdClass();
        $item = $this->slider_model->get(
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
        //kurallar yazılır
        $this->form_validation->set_rules("adi", "adi", "required|trim");
        $this->form_validation->set_rules("sira", " sira", "required|trim");
        $this->form_validation->set_rules("url", " Url", "required|trim");
        $this->form_validation->set_rules("aciklama", " Açıklama", "required|trim");
        $this->form_validation->set_rules("video", " Video", "required|trim");
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

        $slider_img_name = basename($_FILES["resim"]["name"]);

       
            $update = $this->slider_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "sira" => $this->input->post("sira"),
                    "adi" => $this->input->post("adi"),
                    "url" => $this->input->post("url"),
                    "aciklama" => $this->input->post("aciklama"),
                    "video" => $this->input->post("video"),                
                    "resim" => $slider_img_name,
                    // deneme
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
            redirect(base_url("slider"));         
      
    }


    public function update_status($id){

        if($id){
            $db_name = $this->input->post("db_name");
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->slider_model->update(
                array(
                    "id" => $id
                ),
                array(
                    $db_name => $isActive            
                )
                );
        }else{
            echo 'Hatali islem';
        }
    }
    
    public function delete($id){
        $delete = $this->slider_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("slider"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }

}