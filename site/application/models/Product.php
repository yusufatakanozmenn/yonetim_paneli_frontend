<?php
class Product extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "product_v";
        $this->load->model("product_model");
        $this->load->model("product_image_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        /** Tablodaki tüm kayıtları getiriyoruz.. */
        $items = $this->product_model->get_all();
        /** View'e gönderilecek değişkenler.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("adi", "adi", "required|trim");
        $this->form_validation->set_rules("sira", " sira", "required|trim");
        $this->form_validation->set_rules("aciklama", "aciklama", "required|trim");
        $this->form_validation->set_rules("description", "description", "required|trim");
        $this->form_validation->set_rules("keywords", "keywords", "required|trim");
        $this->form_validation->set_rules("seo", "seo", "required|trim");
        $this->form_validation->set_rules("kategori", "kategori", "required|trim");
        $this->form_validation->set_rules("videoid", "videoid", "required|trim");
        $this->form_validation->set_rules("spot", "spot", "required|trim");
        $this->form_validation->set_rules("tarih", "tarih", "required|trim");
        $this->form_validation->set_rules("tarihg", "tarihg", "required|trim");
        //hata mesajları
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
        $product_img_name = basename($_FILES["resim"]["name"]);                                              
        $insert = $this->product_model->add(                                              
            array(                                              
                "sira" => $this->input->post("sira"),
                "kategori" => $this->input->post("kategori"),
                "adi" => $this->input->post("adi"),
                "urun_kodu" => $this->input->post("urun_kodu"),
                "fiyat" => $this->input->post("fiyat"),
                "ifiyat" => $this->input->post("ifiyat"),
                "seo" => $this->input->post("seo"),
                "spot" => $this->input->post("spot"),
                "aciklama" => $this->input->post("aciklama"),
                "durum" => $this->input->post("durum"),
                "anasayfa" => $this->input->post("anasayfa"),
                "yeni" => $this->input->post("yeni"),
                "stok" => $this->input->post("kategori"),                
                "tarih" => date("Y-m-d H:i:s"),
                "dil" => 0,
                "resim" => $product_img_name,               
            )  
        );
        if($insert){
            redirect(base_url("product"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->product_model->get(
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

    public function update($id){
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("adi", "adi", "required|trim");
        $this->form_validation->set_rules("sira", " sira", "required|trim");
        $this->form_validation->set_rules("urun_kodu", "urun_kodu", "required|trim");
        $this->form_validation->set_rules("fiyat", "fiyat", "required|trim");
        $this->form_validation->set_rules("ifiyat", "ifiyat", "required|trim");
        $this->form_validation->set_rules("stok", "stok", "required|trim");
        $this->form_validation->set_rules("kategori", "kategori", "required|trim");
        $this->form_validation->set_rules("spot", "spot", "required|trim");
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
        $product_img_name = basename($_FILES["resim"]["name"]);       
        $update = $this->product_model->update(
            array(
                "id" => $id
            ),
            array(
            "adi" => $this->input->post("adi"),
            "sira" => $this->input->post("sira"),
            "urun_kodu" => $this->input->post("urun_kodu"),
            "fiyat" => $this->input->post("fiyat"),
            "ifiyat" => $this->input->post("ifiyat"),
            "stok" => $this->input->post("stok"),
            "kategori" => $this->input->post("kategori"),
            "spot" => $this->input->post("spot"),
            "aciklama" => $this->input->post("aciklama"),
            "seo" => $this->input->post("seo"),
            "resim" => $product_img_name,               
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
        redirect(base_url("product"));       
       
       
    }
    
    public function update_status($id){

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->product_model->update(
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
    public function image_form($id){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->product_model->get(
            array(
                "id"    => $id
            )
        );

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "pid"    => $id
            )
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function image_upload($id){

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png|webp";
        $config["upload_path"]   = "uploads/$this->viewFolder/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if($upload){

            $uploaded_file = $this->upload->data("file_name");

           $this->product_image_model->add(
                array(
                    "resim"  => $uploaded_file,
                    "pid"    => $id
                )
            );

        } else {
            echo "islem basarisiz";
        }
    }

    public function delete($id){
        $delete = $this->product_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("product"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }


}