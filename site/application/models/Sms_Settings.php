<?php
class Sms_Settings extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "sms_settings_v";
        $this->load->model("Sms_Settings_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Sms_Settings_model->get();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {
        $insert = $this->Sms_Settings_model->update(
            array("id" => 1),
            array(
                "postUrl" => $this->input->post("postUrl"),
                "KULLANICIADI" => $this->input->post("KULLANICIADI"),
                "SIFRE" => $this->input->post("SIFRE"),
                "ORGINATOR" => $this->input->post("ORGINATOR"),
                "m_kime" => $this->input->post("m_kime"),
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

        redirect(base_url("sms_settings"));


    }

} 