<?php
class Blog extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "blog_v";
        $this->load->model("blog_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();        
        $items = $this->blog_model->get_all();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save(){
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("adi", "adi", "required|trim");
        $this->form_validation->set_rules("videoid", "videoid", "required|trim");
        $this->form_validation->set_rules("sira", "sira", "required|trim");
        $this->form_validation->set_rules("durum", "durum", "required|trim");
        $this->form_validation->set_rules("tarih", "tarih", "required|trim");
        $this->form_validation->set_rules("tarihg", "tarihg", "required|trim");
        $this->form_validation->set_rules("spot", "spot", "required|trim");
        $this->form_validation->set_rules("description", "description", "required|trim");
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
        $blog_img_name = basename($_FILES["resim"]["name"]);
        $insert = $this->blog_model->add(
            array(
                "adi" => $this->input->post("adi"),
                "videoid" => $this->input->post("videoid"),
                "sira" => $this->input->post("sira"),
                "durum" => $this->input->post("durum"),
                "tarih" => $this->input->post("tarih"),
                "tarihg"=>$this->input->post("tarihg"),
                "spot" => $this->input->post("spot"),
                "description" => $this->input->post("description"),        
                "resim" => $blog_img_name,                    
            )
        );
        if($insert){
            redirect(base_url("blog"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }


    
    public function update($id){
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("adi", "adi", "required|trim");
        $this->form_validation->set_rules("videoid", "videoid", "required|trim");
        $this->form_validation->set_rules("sira", "sira", "required|trim");
        $this->form_validation->set_rules("durum", "durum", "required|trim");
        $this->form_validation->set_rules("tarih", "tarih", "required|trim");
        $this->form_validation->set_rules("tarihg", "tarihg", "required|trim");
        $this->form_validation->set_rules("spot", "spot", "required|trim");
        $this->form_validation->set_rules("description", "description", "required|trim");
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
        $blog_img_name = basename($_FILES["resim"]["name"]);
        $update = $this->blog_model->add(
            array(
                "adi" => $this->input->post("adi"),
                "videoid" => $this->input->post("videoid"),
                "sira" => $this->input->post("sira"),
                "durum" => $this->input->post("durum"),
                "tarih" => $this->input->post("tarih"),
                "tarihg"=>$this->input->post("tarihg"),
                "spot" => $this->input->post("spot"),
                "description" => $this->input->post("description"),        
                "resim" => $blog_img_name,                    
            )
        );
        if($update){
            redirect(base_url("blog"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function update_form($id){
        $viewData = new stdClass();        
        $item = $this->blog_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function add_form()
    {
        $viewData = new stdClass();        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update_status($id){

        if($id){
            $db_name = $this->input->post("db_name");
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->blog_model->update(
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
        $delete = $this->blog_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("blog"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
   
}