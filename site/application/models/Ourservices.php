<?php
class Ourservices extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "ourservices_v";
        $this->load->model("ourservices_model");
        $this->load->helper("tools_helper");
        
    }
    public function index()
    {
        $viewData = new stdClass();        
        $items = $this->ourservices_model->get_all(
            array()
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function add()
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
        $this->form_validation->set_rules("aciklama", " Açıklama", "required|trim");
        $this->form_validation->set_rules("seo", " seo", "required|trim");
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
        $ourservices_img_name = basename($_FILES["resim"]["name"]);

        $insert = $this->ourservices_model->add(
            array(
                "sira" => $this->input->post("sira"),
                "adi" => $this->input->post("adi"),
                "aciklama" => $this->input->post("aciklama"),
                "seo" => $this->input->post("seo"),    
                "resim" => $ourservices_img_name,               
            )  
        );
        if($insert){
            redirect(base_url("ourservices"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function update_form($id){
        $viewData = new stdClass();        
        $item = $this->ourservices_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    
    public function update_status($id){

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $db_name = $this->input->post("db_name");
            $insert = $this->ourservices_model->update(
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
    
   
     public function update($id)
     {
        $this->load->library("form_validation");
         //kurallar yazılır
        $this->form_validation->set_rules("adi", "adi", "required|trim");
        $this->form_validation->set_rules("sira", "sira", "required|trim");
        $this->form_validation->set_rules("aciklama", "aciklama", "required|trim");         
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

        $ourservices_img_name = basename($_FILES["resim"]["name"]);

        if ($validate) {
             $update = $this->ourservices_model->update(
                 array(
                     "id" => $id
                 ),
                 array(
                    "sira" => $this->input->post("sira"),
                    "adi" => $this->input->post("adi"),
                    "seo" => $this->input->post("seo"),
                    "aciklama" => $this->input->post("aciklama"),
                    "resim" => $ourservices_img_name,

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
             redirect(base_url("ourservices"));
         }
     }
    
    
    public function add_form()
    {
        $viewData = new stdClass();        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function delete($id){
        $delete = $this->ourservices_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("ourservices"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
}