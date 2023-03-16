<?php
class General_Settings extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "general_settings_v";
        $this->load->model("General_Settings_model");
    }
    public function index()
    {
        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->General_Settings_model->get(array("id" => 1));
        $viewData->subViewFolder = "update";
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->item = $item;


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $config["allowed_types"] = "jpg|jpeg|png|svg|webp";
        $config["upload_path"] = "uploads/$this->viewFolder/";
      
        $this->load->library("upload", $config);


        $upload_logo = $this->upload->do_upload("firma_logo");
        $upload_footerlogo = $this->upload->do_upload("firma_footerlogo");
        $upload_favicon = $this->upload->do_upload("favicon");

        $logo_name = basename($_FILES["firma_logo"]["name"]);
        $footerlogo_name= basename($_FILES["firma_footerlogo"]["name"]);
        $favicon_name = basename($_FILES["favicon"]["name"]);

        if ($upload_logo) {
            $this->General_Settings_model->update(
                array("id" => 1),
                array(
                    "firma_logo" => $logo_name,
                )
            );
        }
        if ($upload_footerlogo) {
            $this->General_Settings_model->update(
                array("id" => 1),
                array(
                    "firma_footerlogo" => $footerlogo_name,
                )
            );
        }
        if ($upload_favicon) {
            $this->General_Settings_model->update(
                array("id" => 1),
                array(
                    "favicon" => $favicon_name,
                )
            );
        }

        $insert = $this->General_Settings_model->update(
            array("id" => 1),
            array(
                "site_url" => $this->input->post("site_url"),
                "site_baslik" => $this->input->post("site_baslik"),
                "pbirim" => $this->input->post("pbirim"),
                "yonetim" => $this->input->post("yonetim"),
                "site_desc" => $this->input->post("site_desc"),
                "copyright" => $this->input->post("copyright"),
            )
        );


        // TODO Alert sistemi eklenecek...
        if ($insert) {

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde eklendi",
                "type" => "success"
            );
            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                "type" => "error"
            );
        }


        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("general_settings"));
    }



}