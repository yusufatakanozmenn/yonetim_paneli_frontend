<?php
class E_catalog extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "e_catalog_v";
        $this->load->model("e_catalog_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();       
        $items = $this->e_catalog_model->get_all();           
        
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
        $insert = $this->e_catalog_model->add(
            array(
                "adi" => $this->input->post("adi"),               
                "sira" => $this->input->post("sira"),
                "durum" => $this->input->post("durum"),
                "seo" => $this->input->post("seo"),
            )
        );
        if($insert){
            redirect(base_url("e_catalog"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function update_form($id)
    {
        $viewData = new stdClass();        
        $item = $this->e_catalog_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {        
        //resim upload
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"]   = "uploads/$this->viewFolder/";
        $this->load->library("upload", $config);
        $upload = $this->upload->do_upload("resim");
        if($upload){
            $uploaded_file = $this->upload->data("file_name");
            $data = array(
                "adi" => $this->input->post("adi"),               
                "sira" => $this->input->post("sira"),
                "durum" => $this->input->post("durum"),
                "seo" => $this->input->post("seo"),
                "resim" => $uploaded_file,
            );
        }
    }
   

    public function update_status($id){

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->e_catalog_model->update(
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
        $delete = $this->e_catalog_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("e_catalog"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
   
}