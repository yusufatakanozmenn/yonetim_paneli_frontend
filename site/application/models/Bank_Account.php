<?php
class Bank_Account extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "bank_account_v";
        $this->load->model("bank_account_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();    
        $viewData->viewFolder = $this->viewFolder;
        $items = $this->bank_account_model->get_all();
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
    public function update_form($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $this->bank_account_model->get(
            array(
                "id" => $id
            )
        );
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        $this->load->library("form_validation");
        //kurallar yazılır
       $this->form_validation->set_rules("banka", "banka", "required|trim");
       $this->form_validation->set_rules("iban", "iban", "required|trim");
       $this->form_validation->set_rules("hesap", "hesap", "required|trim");         
       $this->form_validation->set_rules("sube", "sube", "required|trim");
       $this->form_validation->set_rules("hnumara", "hnumara", "required|trim");
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

       $bank_img_name = basename($_FILES["resim"]["name"]);

       if ($validate) {
            $update = $this->bank_account_model->update(
                array(
                    "id" => $id
                ),
                array(
                "banka" => $this->input->post("banka"),
                "iban" => $this->input->post("iban"),
                "hesap" => $this->input->post("hesap"),
                "sube" => $this->input->post("sube"),
                "hnumara" => $this->input->post("hnumara"),
                "resim" => $bank_img_name,

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
            redirect(base_url("bank_account"));
        }
    }
    public function save(){
        $this->load->library("form_validation");
        //kurallar yazılır
         $this->form_validation->set_rules("banka", "banka", "required|trim");
            $this->form_validation->set_rules("iban", "iban", "required|trim");
            $this->form_validation->set_rules("hesap", "hesap", "required|trim");
            $this->form_validation->set_rules("sube", "sube", "required|trim");
            $this->form_validation->set_rules("hnumara", "hnumara", "required|trim");
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
            $bank_img_name = basename($_FILES["resim"]["name"]);

        $insert = $this->bank_account_model->add(
            array(
                "banka" => $this->input->post("banka"),
                "iban" => $this->input->post("iban"),
                "hesap" => $this->input->post("hesap"),
                "sube" => $this->input->post("sube"),
                "hnumara" => $this->input->post("hnumara"),
                "resim" => $bank_img_name,                
                     
            )
        );
        if($insert){
            redirect(base_url("bank_account"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }


     public function delete($id){
        $delete = $this->bank_account_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("bank_account"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
    public function update_status($id){

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->bank_account_model->update(
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